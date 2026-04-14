<?php

namespace App\Http\Controllers\Api;

use App\Models\Appointment;
use App\Http\Resources\AppointmentResource;
use App\Http\Requests\AppointmentStoreRequest;
use App\Http\Requests\AppointmentUpdateRequest;
use Harryes\CrudPackage\Http\Controllers\CrudBaseController;

class AppointmentController extends CrudBaseController
{
    /**
     * Constructor to bind the model and resource class to the BaseController.
     */
    public function __construct()
    {
        parent::__construct(
            Appointment::class,
            AppointmentResource::class,
            AppointmentStoreRequest::class,
            AppointmentUpdateRequest::class
        );
    }
}