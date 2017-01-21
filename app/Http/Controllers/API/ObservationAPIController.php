<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateObservationAPIRequest;
use App\Http\Requests\API\UpdateObservationAPIRequest;
use App\Models\Observation;
use App\Repositories\ObservationRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ObservationController
 * @package App\Http\Controllers\API
 */

class ObservationAPIController extends AppBaseController
{
    /** @var  ObservationRepository */
    private $observationRepository;

    public function __construct(ObservationRepository $observationRepo)
    {
        $this->observationRepository = $observationRepo;
    }

    /**
     * Display a listing of the Observation.
     * GET|HEAD /observations
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->observationRepository->pushCriteria(new RequestCriteria($request));
        $this->observationRepository->pushCriteria(new LimitOffsetCriteria($request));
        $observations = $this->observationRepository->findWhere(["control_sheet_id"=>$request->get("control_sheet_id")]);

        return $this->sendResponse($observations->toArray(), 'Observations retrieved successfully');
    }

    /**
     * Store a newly created Observation in storage.
     * POST /observations
     *
     * @param CreateObservationAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateObservationAPIRequest $request)
    {
        $input = $request->all();

        $observations = $this->observationRepository->create($input);

        return $this->sendResponse($observations->toArray(), 'Observation saved successfully');
    }

    /**
     * Display the specified Observation.
     * GET|HEAD /observations/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Observation $observation */
        $observation = $this->observationRepository->findWithoutFail($id);

        if (empty($observation)) {
            return $this->sendError('Observation not found');
        }

        return $this->sendResponse($observation->toArray(), 'Observation retrieved successfully');
    }

    /**
     * Update the specified Observation in storage.
     * PUT/PATCH /observations/{id}
     *
     * @param  int $id
     * @param UpdateObservationAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateObservationAPIRequest $request)
    {
        $input = $request->all();

        /** @var Observation $observation */
        $observation = $this->observationRepository->findWithoutFail($id);

        if (empty($observation)) {
            return $this->sendError('Observation not found');
        }

        $observation = $this->observationRepository->update($input, $id);

        return $this->sendResponse($observation->toArray(), 'Observation updated successfully');
    }

    /**
     * Remove the specified Observation from storage.
     * DELETE /observations/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Observation $observation */
        $observation = $this->observationRepository->findWithoutFail($id);

        if (empty($observation)) {
            return $this->sendError('Observation not found');
        }

        $observation->delete();

        return $this->sendResponse($id, 'Observation deleted successfully');
    }
}
