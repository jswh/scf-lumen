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
trait ResourceWrite
{
    public function create(Request $request)
    {
        $data = $request->input();
        $model = $this->model();
        $model->fill($data);
        $model->save();

        return $model;
    }

    public function update($id, Request $request)
    {
        $model = $this->query()->findOrFail($id);
        $model->fill($request->input());
        $model->save();

        return $model;
    }

    public function delete($id)
    {
        $model = $this->query()->findOrFail($id);
        $model->delete();

        return $model;
    }
}
