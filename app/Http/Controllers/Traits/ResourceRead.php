<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Http\Request;

/**
 * Trait App\Http\Controllers\Traits
 * @author jswh
 *
 * @method \Illuminate\Database\Eloquent\Builder query
 * @method \Illuminate\Database\Eloquent\Model model
 */
trait ResourceRead
{
    public function index(Request $request)
    {
        $query = $this->query();

        return $query->simplePaginate($request->input('page_size'), ['*'], $request->input['page']);
    }

    public function show($id)
    {
        return $this->query()->find($id);
    }
}
