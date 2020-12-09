<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Area
 *
 * @property int $id
 * @property int|null $parent_id
 * @property string $code
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Area newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Area newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Area query()
 * @method static \Illuminate\Database\Eloquent\Builder|Area whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Area whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Area whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Area whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Area whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Area whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Area extends Model {
    public $table = 'china_area';
}
