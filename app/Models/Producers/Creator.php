<?php

namespace App\Models\Producers;

use App\Models\Series;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Creator extends Model
{
    use SoftDeletes, CascadeSoftDeletes;

    protected $table = 'creators';
    protected $dates = ['deleted_at'];
    protected $cascadeDeletes = ['creator_series'];
    public $timestamps = false;


    public function series()
    {
        return $this->belongsToMany(Series::class)->withPivot('order');
    }
}
