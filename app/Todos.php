<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Todos extends Model {

    protected $fillable = ['name', 'description', 'completed'];

    public function getCompletedAttribute($value)
    {
        return (boolean) $value;
    }

}
