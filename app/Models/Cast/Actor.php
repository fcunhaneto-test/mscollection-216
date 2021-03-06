<?php

namespace App\Models\Cast;

use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Actor extends Model
{
    use SoftDeletes, CascadeSoftDeletes;

    protected $table = 'actors';
    protected $dates = ['deleted_at'];
    protected $cascadeDeletes = ['cast'];
    public $timestamps = false;

}
