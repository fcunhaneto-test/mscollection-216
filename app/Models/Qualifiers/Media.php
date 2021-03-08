<?php

namespace App\Models\Qualifiers;

use App\Models\Movie;
use App\Models\Series;
use App\Models\Season;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Media extends Model
{
    use SoftDeletes;

    protected $table = 'media';
    protected $dates = ['deleted_at'];
    public $timestamps = false;

    public function movies()
    {
        return $this->belongsToMany(Movie::class)->withPivot('active');
    }

    public function series()
    {
        return $this->belongsToMany(Series::class)->withPivot('active');
    }

    public function seasons()
    {
        return $this->belongsToMany(Season::class)->withPivot('active');
    }

    public function streams()
    {
        return $this->where('stream', '=', true)->select()->get();
    }

    public function actives()
    {
        return $this->where('active', '=', true)->get();
    }
}
