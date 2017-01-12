<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAttachmentAPIRequest;
use App\Http\Requests\API\UpdateAttachmentAPIRequest;
use App\Models\Attachment;
use App\Repositories\AttachmentRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class AttachmentController
 * @package App\Http\Controllers\API
 */

class AttachmentAPIController extends AppBaseController
{
    /** @var  AttachmentRepository */
    private $attachmentRepository;

    public function __construct(AttachmentRepository $attachmentRepo)
    {
        $this->attachmentRepository = $attachmentRepo;
    }

    /**
     * Display a listing of the Attachment.
     * GET|HEAD /attachments
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->attachmentRepository->pushCriteria(new RequestCriteria($request));
        $this->attachmentRepository->pushCriteria(new LimitOffsetCriteria($request));
        $attachments = $this->attachmentRepository->all();

        return $this->sendResponse($attachments->toArray(), 'Attachments retrieved successfully');
    }

    /**
     * Store a newly created Attachment in storage.
     * POST /attachments
     *
     * @param CreateAttachmentAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAttachmentAPIRequest $request)
    {
        $input = $request->all();

        $attachments = $this->attachmentRepository->create($input);

        return $this->sendResponse($attachments->toArray(), 'Attachment saved successfully');
    }

    /**
     * Display the specified Attachment.
     * GET|HEAD /attachments/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Attachment $attachment */
        $attachment = $this->attachmentRepository->findWithoutFail($id);

        if (empty($attachment)) {
            return $this->sendError('Attachment not found');
        }

        return $this->sendResponse($attachment->toArray(), 'Attachment retrieved successfully');
    }

    /**
     * Update the specified Attachment in storage.
     * PUT/PATCH /attachments/{id}
     *
     * @param  int $id
     * @param UpdateAttachmentAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAttachmentAPIRequest $request)
    {
        $input = $request->all();

        /** @var Attachment $attachment */
        $attachment = $this->attachmentRepository->findWithoutFail($id);

        if (empty($attachment)) {
            return $this->sendError('Attachment not found');
        }

        $attachment = $this->attachmentRepository->update($input, $id);

        return $this->sendResponse($attachment->toArray(), 'Attachment updated successfully');
    }

    /**
     * Remove the specified Attachment from storage.
     * DELETE /attachments/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Attachment $attachment */
        $attachment = $this->attachmentRepository->findWithoutFail($id);

        if (empty($attachment)) {
            return $this->sendError('Attachment not found');
        }

        $attachment->delete();

        return $this->sendResponse($id, 'Attachment deleted successfully');
    }
}
