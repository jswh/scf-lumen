<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model {
    public $fillable = [
        'uuid',
        'company',
        'city',
        'category',
        'title',
        'summary',
        'detail',
        'updateDate',
        'origin',
    ];
    public static function fetchByUUID($uuid) {
        return Job::where('uuid', $uuid)->first();
    }
}
