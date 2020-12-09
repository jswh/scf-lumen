<?php


namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;

abstract class ResourceController extends Controller
{
    abstract function model() : Model;

    protected function query() {
        return $this->model()->query();
    }
}
