<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSectionAPIRequest;
use App\Http\Requests\API\UpdateSectionAPIRequest;
use App\Models\ResponseQuestion;
use App\Models\Section;
use App\Repositories\QuestionRepository;
use App\Repositories\SectionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class SectionController
 * @package App\Http\Controllers\API
 */

class SectionAPIController extends AppBaseController
{
    /** @var  SectionRepository */
    private $sectionRepository;
    /** @var QuestionRepository */
    private $questionRepository;
    public function __construct(SectionRepository $sectionRepo,QuestionRepository $questionRepo)
    {
        $this->sectionRepository = $sectionRepo;
        $this->questionRepository=$questionRepo;
    }

    /**
     * Display a listing of the Section.
     * GET|HEAD /sections
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->sectionRepository->pushCriteria(new RequestCriteria($request));
        $this->sectionRepository->pushCriteria(new LimitOffsetCriteria($request));
        $sections = $this->sectionRepository->all();

        return $this->sendResponse($sections->toArray(), 'Sections retrieved successfully');
    }

    public function sections(){
        $sections=$this->sectionRepository->orderBy('order','ASC')->findWhere(['section_id'=>null]);
        return $this->sendResponse($sections->toArray(),'Sections retrieved successfully');
    }

    public function questions($id){
        $subsections=$this->sectionRepository->findWhere(['section_id' => $id,'enable'=>true]);
        foreach ($subsections as $subsection){
            $q=$this->questionRepository->findWhere(['section_id' => $subsection->id]);
            $subsection->questions=$q;
        }
        return $this->sendResponse($subsections->toArray(),'Sections retrieved successfully');
    }
    /**
     * Store a newly created Section in storage.
     * POST /sections
     *
     * @param CreateSectionAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSectionAPIRequest $request)
    {
        $input = $request->all();

        $sections = $this->sectionRepository->create($input);

        return $this->sendResponse($sections->toArray(), 'Section saved successfully');
    }

    /**
     * Display the specified Section.
     * GET|HEAD /sections/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Section $section */
        $section = $this->sectionRepository->findWithoutFail($id);

        if (empty($section)) {
            return $this->sendError('Section not found');
        }

        return $this->sendResponse($section->toArray(), 'Section retrieved successfully');
    }

    /**
     * Update the specified Section in storage.
     * PUT/PATCH /sections/{id}
     *
     * @param  int $id
     * @param UpdateSectionAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSectionAPIRequest $request)
    {
        $input = $request->all();

        /** @var Section $section */
        $section = $this->sectionRepository->findWithoutFail($id);

        if (empty($section)) {
            return $this->sendError('Section not found');
        }

        $section = $this->sectionRepository->update($input, $id);

        return $this->sendResponse($section->toArray(), 'Section updated successfully');
    }

    /**
     * Remove the specified Section from storage.
     * DELETE /sections/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Section $section */
        $section = $this->sectionRepository->findWithoutFail($id);

        if (empty($section)) {
            return $this->sendError('Section not found');
        }

        $section->delete();

        return $this->sendResponse($id, 'Section deleted successfully');
    }
}
