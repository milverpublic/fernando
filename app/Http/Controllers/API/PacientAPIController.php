<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePacientAPIRequest;
use App\Http\Requests\API\UpdatePacientAPIRequest;
use App\Models\Pacient;
use Auth;
use App\Repositories\HistoryClinicRepository;
use App\Repositories\PacientRepository;
use App\Repositories\PersonRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class PacientController
 * @package App\Http\Controllers\API
 */

class PacientAPIController extends AppBaseController
{
    /** @var  PacientRepository */
    private $pacientRepository;

    /** @var PersonRepository */
    private $personRepository;

    /** @var HistoryClinicRepository
     */
    private $historyClinicRepository;

    public function __construct(PacientRepository $pacientRepo,PersonRepository $personRepo, HistoryClinicRepository $historyClinicRepo){
        $this->pacientRepository = $pacientRepo;
        $this->personRepository=$personRepo;
        $this->historyClinicRepository=$historyClinicRepo;
    }

    /**
     * Display a listing of the Pacient.
     * GET|HEAD /pacients
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->pacientRepository->pushCriteria(new RequestCriteria($request));
        $this->pacientRepository->pushCriteria(new LimitOffsetCriteria($request));
        $persons = $this->personRepository->paginate(5);
        foreach ($persons as $person){
            $pacient = $this->pacientRepository->findWhere(['people_id' => $person->id])->first();
            $history_clinic=$this->historyClinicRepository->findWhere(['pacient_id' => $person->id])->first();
            $pacient->history_clinic=$history_clinic;
            $person->pacient=$pacient;
        }
        return $this->sendResponse($persons->toArray(), 'Pacients retrieved successfully');
    }

    /**
     * Store a newly created Pacient in storage.
     * POST /pacients
     *
     * @param CreatePacientAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePacientAPIRequest $request)
    {
        $input = $request->all();
        $person = $this->personRepository->create($input);
        $pacient = $person->pacient()->create($input['pacient']);
        $user = Auth::user();
        $historyClinic=$pacient->historyClinic()->create(['actualizado_por' => $user->name]);
        $pacient->history_clinic=$historyClinic;
        $person->pacient=$pacient;
        return $this->sendResponse($person->toArray(), 'Pacient saved successfully');
    }

    /**
     * Display the specified Pacient.
     * GET|HEAD /pacients/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Pacient $pacient */
        $person = $this->personRepository->findWithoutFail($id);

        if (empty($person)) {
            return $this->sendError('Pacient not found');
        }
        $pacient=$this->pacientRepository->findWhere(['people_id' => $person->id])->first();

        $person->pacient=$pacient;

        return $this->sendResponse($person->toArray(), 'Pacient retrieved successfully');
    }

    /**
     * Update the specified Pacient in storage.
     * PUT/PATCH /pacients/{id}
     *
     * @param  int $id
     * @param UpdatePacientAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePacientAPIRequest $request)
    {
        $input = $request->all();

        $person = $this->personRepository->update($input,$id);
        /** @var Pacient $pacient */
        $pacient = $this->pacientRepository->update(json_decode($input['pacient'], true),$input['id']);

        $person->pacient=$pacient;

        return $this->sendResponse($person->toArray(), 'Pacient updated successfully');
    }

    /**
     * Remove the specified Pacient from storage.
     * DELETE /pacients/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Pacient $pacient */
        $pacient = $this->pacientRepository->findWithoutFail($id);

        if (empty($pacient)) {
            return $this->sendError('Pacient not found');
        }

        $pacient->delete();

        return $this->sendResponse($id, 'Pacient deleted successfully');
    }
}
