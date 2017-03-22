<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateControlAPIRequest;
use App\Http\Requests\API\UpdateControlAPIRequest;
use App\Models\Control;
use App\Repositories\ControlRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ControlController
 * @package App\Http\Controllers\API
 */

class ControlAPIController extends AppBaseController
{
    /** @var  ControlRepository */
    private $controlRepository;

    public function __construct(ControlRepository $controlRepo)
    {
        $this->controlRepository = $controlRepo;
    }

    /**
     * Display a listing of the Control.
     * GET|HEAD /controls
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->controlRepository->pushCriteria(new RequestCriteria($request));
        $this->controlRepository->pushCriteria(new LimitOffsetCriteria($request));
        $controls = $this->controlRepository->all();

        return $this->sendResponse($controls->toArray(), 'Controls retrieved successfully');
    }

    /**
     * Store a newly created Control in storage.
     * POST /controls
     *
     * @param CreateControlAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateControlAPIRequest $request)
    {
        $input = $request->all();

        $controls = $this->controlRepository->create($input);

        return $this->sendResponse($controls->toArray(), 'Control saved successfully');
    }

    /**
     * Display the specified Control.
     * GET|HEAD /controls/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Control $control */
        $control = $this->controlRepository->findWithoutFail($id);

        if (empty($control)) {
            return $this->sendError('Control not found');
        }

        return $this->sendResponse($control->toArray(), 'Control retrieved successfully');
    }

    /**
     * Update the specified Control in storage.
     * PUT/PATCH /controls/{id}
     *
     * @param  int $id
     * @param UpdateControlAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateControlAPIRequest $request)
    {
        $input = $request->all();

        /** @var Control $control */
        $control = $this->controlRepository->findWithoutFail($id);

        if (empty($control)) {
            return $this->sendError('Control not found');
        }

        $control = $this->controlRepository->update($input, $id);

        return $this->sendResponse($control->toArray(), 'Control updated successfully');
    }

    /**
     * Remove the specified Control from storage.
     * DELETE /controls/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Control $control */
        $control = $this->controlRepository->findWithoutFail($id);

        if (empty($control)) {
            return $this->sendError('Control not found');
        }

        $control->delete();

        return $this->sendResponse($id, 'Control deleted successfully');
    }
}
