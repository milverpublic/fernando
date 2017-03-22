<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateHistoryClinicAPIRequest;
use App\Http\Requests\API\UpdateHistoryClinicAPIRequest;
use App\Models\HistoryClinic;
use App\Repositories\HistoryClinicRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class HistoryClinicController
 * @package App\Http\Controllers\API
 */

class HistoryClinicAPIController extends AppBaseController
{
    /** @var  HistoryClinicRepository */
    private $historyClinicRepository;

    public function __construct(HistoryClinicRepository $historyClinicRepo)
    {
        $this->historyClinicRepository = $historyClinicRepo;
    }

    /**
     * Display a listing of the HistoryClinic.
     * GET|HEAD /historyClinics
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->historyClinicRepository->pushCriteria(new RequestCriteria($request));
        $this->historyClinicRepository->pushCriteria(new LimitOffsetCriteria($request));
        $historyClinics = $this->historyClinicRepository->all();

        return $this->sendResponse($historyClinics->toArray(), 'History Clinics retrieved successfully');
    }

    /**
     * Store a newly created HistoryClinic in storage.
     * POST /historyClinics
     *
     * @param CreateHistoryClinicAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateHistoryClinicAPIRequest $request)
    {
        $input = $request->all();

        $historyClinics = $this->historyClinicRepository->create($input);

        return $this->sendResponse($historyClinics->toArray(), 'History Clinic saved successfully');
    }

    /**
     * Display the specified HistoryClinic.
     * GET|HEAD /historyClinics/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var HistoryClinic $historyClinic */
        $historyClinic = $this->historyClinicRepository->findWithoutFail($id);

        if (empty($historyClinic)) {
            return $this->sendError('History Clinic not found');
        }

        return $this->sendResponse($historyClinic->toArray(), 'History Clinic retrieved successfully');
    }

    /**
     * Update the specified HistoryClinic in storage.
     * PUT/PATCH /historyClinics/{id}
     *
     * @param  int $id
     * @param UpdateHistoryClinicAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateHistoryClinicAPIRequest $request)
    {
        $input = $request->all();

        /** @var HistoryClinic $historyClinic */
        $historyClinic = $this->historyClinicRepository->findWithoutFail($id);

        if (empty($historyClinic)) {
            return $this->sendError('History Clinic not found');
        }

        $historyClinic = $this->historyClinicRepository->update($input, $id);

        return $this->sendResponse($historyClinic->toArray(), 'HistoryClinic updated successfully');
    }

    /**
     * Remove the specified HistoryClinic from storage.
     * DELETE /historyClinics/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var HistoryClinic $historyClinic */
        $historyClinic = $this->historyClinicRepository->findWithoutFail($id);

        if (empty($historyClinic)) {
            return $this->sendError('History Clinic not found');
        }

        $historyClinic->delete();

        return $this->sendResponse($id, 'History Clinic deleted successfully');
    }
}
