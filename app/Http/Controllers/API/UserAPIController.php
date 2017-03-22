<?php

namespace App\Http\Controllers\API;

use App\User;
use App\Http\Controllers\AppBaseController;
use Auth;
/**
 * Class UserController
 * @package App\Http\Controllers\API
 */

class UserAPIController extends AppBaseController
{
    /**
     * Get user current context.
     *
     * @return JSON
     */
    public function getMe(){
        $user = Auth::user();
        //return response()->success($user);
        return $this->sendResponse($user->toArray(), 'User retrieved successfully');
    }
}
