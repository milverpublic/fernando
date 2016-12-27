<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePacientAPIRequest;
use App\Http\Requests\API\UpdatePacientAPIRequest;
use App\Models\Pacient;
use App\Repositories\PacientRepository;
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

    public function __construct(PacientRepository $pacientRepo)
    {
        $this->pacientRepository = $pacientRepo;
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
        $pacients = $this->pacientRepository->all();

        return $this->sendResponse($pacients->toArray(), 'Pacients retrieved successfully');
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

        $pacients = $this->pacientRepository->create($input);

        return $this->sendResponse($pacients->toArray(), 'Pacient saved successfully');
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
        $pacient = $this->pacientRepository->findWithoutFail($id);

        if (empty($pacient)) {
            return $this->sendError('Pacient not found');
        }

        return $this->sendResponse($pacient->toArray(), 'Pacient retrieved successfully');
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

        /** @var Pacient $pacient */
        $pacient = $this->pacientRepository->findWithoutFail($id);

        if (empty($pacient)) {
            return $this->sendError('Pacient not found');
        }

        $pacient = $this->pacientRepository->update($input, $id);

        return $this->sendResponse($pacient->toArray(), 'Pacient updated successfully');
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
