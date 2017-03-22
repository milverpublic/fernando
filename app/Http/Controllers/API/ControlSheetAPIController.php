<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateControlSheetAPIRequest;
use App\Http\Requests\API\UpdateControlSheetAPIRequest;
use App\Models\ControlSheet;
use App\Repositories\ControlSheetRepository;
use App\Repositories\HistoryClinicRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ControlSheetController
 * @package App\Http\Controllers\API
 */

class ControlSheetAPIController extends AppBaseController
{
    /** @var  ControlSheetRepository */
    private $controlSheetRepository;
    private $historyClinicRepository;

    public function __construct(ControlSheetRepository $controlSheetRepo,HistoryClinicRepository $historyClinicRepo)
    {
        $this->controlSheetRepository = $controlSheetRepo;
        $this->historyClinicRepository = $historyClinicRepo;
    }

    /**
     * Display a listing of the ControlSheet.
     * GET|HEAD /controlSheets
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->controlSheetRepository->pushCriteria(new RequestCriteria($request));
        $this->controlSheetRepository->pushCriteria(new LimitOffsetCriteria($request));
        $controlSheets = $this->controlSheetRepository->findWhere(['pacient_id'=>$request->get("pacient_id")]);

        return $this->sendResponse($controlSheets->toArray(), 'Control Sheets retrieved successfully');
    }

    /**
     * Store a newly created ControlSheet in storage.
     * POST /controlSheets
     *
     * @param CreateControlSheetAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateControlSheetAPIRequest $request)
    {
        $input = $request->all();
        $controlSheets = $this->controlSheetRepository->create($input);
        $historyClinic = $this->historyClinicRepository->findWhere(['pacient_id' => $input['pacient_id']])->first();

        return $this->sendResponse($controlSheets->toArray(), 'Control Sheet saved successfully');
    }

    /**
     * Display the specified ControlSheet.
     * GET|HEAD /controlSheets/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ControlSheet $controlSheet */
        $controlSheet = $this->controlSheetRepository->find($id);

        if (empty($controlSheet)) {
            return $this->sendError('Control Sheet not found');
        }

        return $this->sendResponse($controlSheet->toArray(), 'Control Sheet retrieved successfully');
    }

    /**
     * Update the specified ControlSheet in storage.
     * PUT/PATCH /controlSheets/{id}
     *
     * @param  int $id
     * @param UpdateControlSheetAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateControlSheetAPIRequest $request)
    {
        $input = $request->all();

        /** @var ControlSheet $controlSheet */
        $controlSheet = $this->controlSheetRepository->findWithoutFail($id);

        if (empty($controlSheet)) {
            return $this->sendError('Control Sheet not found');
        }

        $controlSheet = $this->controlSheetRepository->update($input, $id);

        return $this->sendResponse($controlSheet->toArray(), 'ControlSheet updated successfully');
    }

    /**
     * Remove the specified ControlSheet from storage.
     * DELETE /controlSheets/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ControlSheet $controlSheet */
        $controlSheet = $this->controlSheetRepository->findWithoutFail($id);

        if (empty($controlSheet)) {
            return $this->sendError('Control Sheet not found');
        }

        $controlSheet->delete();

        return $this->sendResponse($id, 'Control Sheet deleted successfully');
    }
}
