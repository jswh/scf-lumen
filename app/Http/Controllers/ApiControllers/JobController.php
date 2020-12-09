<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\ResourceController;
use App\Http\Controllers\Traits\ResourceRead;
use App\Models\Job;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

/**
 * Class JobController
 * @author jswh
 */
class JobController extends ResourceController
{
    use ResourceRead;

    public function model(): Model
    {
        return new Job;
    }

    public function import(Request $request)
    {
        $data = $request->input();
        $exist = Job::fetchByUUID($data['uuid']) ?: new Job;
        $exist->
    }
}
