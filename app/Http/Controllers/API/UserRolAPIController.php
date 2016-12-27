<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateUserRolAPIRequest;
use App\Http\Requests\API\UpdateUserRolAPIRequest;
use App\Models\UserRol;
use App\Repositories\UserRolRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class UserRolController
 * @package App\Http\Controllers\API
 */

class UserRolAPIController extends AppBaseController
{
    /** @var  UserRolRepository */
    private $userRolRepository;

    public function __construct(UserRolRepository $userRolRepo)
    {
        $this->userRolRepository = $userRolRepo;
    }

    /**
     * Display a listing of the UserRol.
     * GET|HEAD /userRols
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->userRolRepository->pushCriteria(new RequestCriteria($request));
        $this->userRolRepository->pushCriteria(new LimitOffsetCriteria($request));
        $userRols = $this->userRolRepository->all();

        return $this->sendResponse($userRols->toArray(), 'User Rols retrieved successfully');
    }

    /**
     * Store a newly created UserRol in storage.
     * POST /userRols
     *
     * @param CreateUserRolAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateUserRolAPIRequest $request)
    {
        $input = $request->all();

        $userRols = $this->userRolRepository->create($input);

        return $this->sendResponse($userRols->toArray(), 'User Rol saved successfully');
    }

    /**
     * Display the specified UserRol.
     * GET|HEAD /userRols/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var UserRol $userRol */
        $userRol = $this->userRolRepository->findWithoutFail($id);

        if (empty($userRol)) {
            return $this->sendError('User Rol not found');
        }

        return $this->sendResponse($userRol->toArray(), 'User Rol retrieved successfully');
    }

    /**
     * Update the specified UserRol in storage.
     * PUT/PATCH /userRols/{id}
     *
     * @param  int $id
     * @param UpdateUserRolAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserRolAPIRequest $request)
    {
        $input = $request->all();

        /** @var UserRol $userRol */
        $userRol = $this->userRolRepository->findWithoutFail($id);

        if (empty($userRol)) {
            return $this->sendError('User Rol not found');
        }

        $userRol = $this->userRolRepository->update($input, $id);

        return $this->sendResponse($userRol->toArray(), 'UserRol updated successfully');
    }

    /**
     * Remove the specified UserRol from storage.
     * DELETE /userRols/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var UserRol $userRol */
        $userRol = $this->userRolRepository->findWithoutFail($id);

        if (empty($userRol)) {
            return $this->sendError('User Rol not found');
        }

        $userRol->delete();

        return $this->sendResponse($id, 'User Rol deleted successfully');
    }
}
