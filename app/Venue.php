<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Game;

/**
 * Class Team
 *
 * @package App
 * @property string $name
*/
class Venue extends Model
{
    use SoftDeletes;

    protected $fillable = ['name'];

    
 
}
