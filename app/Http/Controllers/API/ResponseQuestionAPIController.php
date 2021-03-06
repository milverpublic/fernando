<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateResponseQuestionAPIRequest;
use App\Http\Requests\API\UpdateResponseQuestionAPIRequest;
use App\Models\ResponseQuestion;
use App\Repositories\HistoryClinicRepository;
use App\Repositories\QuestionRepository;
use App\Repositories\ResponseQuestionRepository;
use App\Repositories\SectionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ResponseQuestionController
 * @package App\Http\Controllers\API
 */
class ResponseQuestionAPIController extends AppBaseController
{
    /** @var  ResponseQuestionRepository */
    private $responseQuestionRepository;
    /** @var QuestionRepository */
    private $questionRepository;
    /** @var SectionRepository */
    private $sectionRepository;
    /** @var HistoryClinicRepository */
    private $historyClinicRepository;

    public function __construct(ResponseQuestionRepository $responseQuestionRepo,
                                HistoryClinicRepository $historyClinicRepo,
                                QuestionRepository $questionRepo,
                                SectionRepository $sectionRepo)
    {
        $this->responseQuestionRepository = $responseQuestionRepo;
        $this->historyClinicRepository = $historyClinicRepo;
        $this->questionRepository = $questionRepo;
        $this->sectionRepository = $sectionRepo;
    }

    /**
     * Display a listing of the ResponseQuestion.
     * GET|HEAD /responseQuestions
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->responseQuestionRepository->pushCriteria(new RequestCriteria($request));
        $this->responseQuestionRepository->pushCriteria(new LimitOffsetCriteria($request));
        $responseQuestions = $this->responseQuestionRepository->all();

        return $this->sendResponse($responseQuestions->toArray(), 'Response Questions retrieved successfully');
    }

    /**
     * Store a newly created ResponseQuestion in storage.
     * POST /responseQuestions
     *
     * @param CreateResponseQuestionAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateResponseQuestionAPIRequest $request)
    {
        $input = $request->all();
        foreach ($input['question'] as $questionKey => $value) {
            $question = $this->questionRepository->findWhere(['model' => $questionKey])->first();
            if ($question->input_type != 'checkbox') {
                $this->responseQuestionRepository->create([
                    'history_clinic_id' => $input['history_clinic_id'],
                    'question_id' => $question->id,
                    'reponse_value' => $value
                ]);
            } else {
                $this->responseQuestionRepository->create([
                    'history_clinic_id' => $input['history_clinic_id'],
                    'question_id' => $question->id,
                    'reponse_value' => $question->model,
                    'multiple' => $value
                ]);
            }
        }
        return $this->sendResponse($input, 'Response Question saved successfully');
    }

    /**
     * Display the specified ResponseQuestion.
     * GET|HEAD /responseQuestions/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ResponseQuestion $responseQuestion */
        $responseQuestion = $this->responseQuestionRepository->findWithoutFail($id);

        if (empty($responseQuestion)) {
            return $this->sendError('Response Question not found');
        }

        return $this->sendResponse($responseQuestion->toArray(), 'Response Question retrieved successfully');
    }

    /**
     * @param $section
     * @param $history
     * @return mixed
     */
    public function showResponsesQuestions($section, $history)
    {
        $subsections = $this->getSubsections($section);
        $questionall = $this->questionRepository->findWhereIn('section_id', $subsections);
        $questions = null;
        $response = null;
        foreach ($questionall as $question) {
            $responseValue = $this->responseQuestionRepository->findWhere(['history_clinic_id' => $history, 'question_id' => $question->id])->first();
            if (!empty($responseValue)) {
                if ($question->input_type != 'checkbox') {
                    $questions[$question->model] = $responseValue->reponse_value;
                } else {
                    $questions[$question->model] = $responseValue->multiple;
                }
            }
        }
        if (!empty($questions)) {
            $hc=$this->historyClinicRepository->find($history);
            $response = [
                'history_clinic_id' => $history,
                'completed' => $hc->completed,
                'question' => $questions];
        }
        return $this->sendResponse($response, 'Response Question retrieved successfully');
    }

    /**
     * Update the specified ResponseQuestion in storage.
     * PUT/PATCH /responseQuestions/{id}
     *
     * @param  int $id
     * @param UpdateResponseQuestionAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateResponseQuestionAPIRequest $request)
    {
        $input = $request->all();
        foreach (json_decode($input['question'], true) as $questionKey => $value) {
            $question = $this->questionRepository->findWhere(['model' => $questionKey])->first();
            $responseQuestion = $this->responseQuestionRepository->findWhere(['question_id' => $question->id, 'history_clinic_id' => $id])->first();
            if ($question->input_type != 'checkbox') {
                $data = ['history_clinic_id' => $input['history_clinic_id'], 'question_id' => $question->id, 'reponse_value' => $value];
                if (empty($responseQuestion)) {
                    $this->responseQuestionRepository->create($data);
                } else {
                    $this->responseQuestionRepository->update($data, $responseQuestion->id);
                }
            } else {
                $dataJson=['history_clinic_id' => $input['history_clinic_id'], 'question_id' => $question->id, 'reponse_value' => $question->model, 'multiple' => $value];
                if (empty($responseQuestion)) {
                    $this->responseQuestionRepository->create($dataJson);
                }else{
                    $this->responseQuestionRepository->update($dataJson,$responseQuestion->id);
                }
            }
        }
        return $this->sendResponse($input, 'ResponseQuestion updated successfully');
    }

    /**
     * Remove the specified ResponseQuestion from storage.
     * DELETE /responseQuestions/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ResponseQuestion $responseQuestion */
        $responseQuestion = $this->responseQuestionRepository->findWithoutFail($id);

        if (empty($responseQuestion)) {
            return $this->sendError('Response Question not found');
        }

        $responseQuestion->delete();

        return $this->sendResponse($id, 'Response Question deleted successfully');
    }

    /**
     * @param $section
     * @return array|null
     */
    private function getSubsections($section)
    {
        $subsections = null;
        $sections = $this->sectionRepository->findWhere(['section_id' => $section]);
        foreach ($sections as $section) {
            $subsections[] = $section->id;
        }
        return $subsections;
    }
}
