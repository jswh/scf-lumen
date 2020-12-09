<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\ResourceController;
use App\Models\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class JobController
 * @author jswh
 */
class CollectionController extends ResourceController
{
    public function model(): Model
    {
        return new Collection;
    }
}
