<?php

namespace App\Models;

use App\Models\Qualifiers\Media;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Season extends Model
{
    use SoftDeletes, CascadeSoftDeletes;

    protected $table = 'seasons';
    protected $dates = ['deleted_at'];
    protected $cascadeDeletes = ['episodes'];
    public $timestamps = false;

    public function media()
    {
        return $this->belongsToMany(Media::class)->withPivot('active', 'slug');
    }

    public function series()
    {
        return $this->belongsTo(Series::class);
    }

    public function episodes()
    {
        return $this->hasMany(Episode::class);
    }
}
