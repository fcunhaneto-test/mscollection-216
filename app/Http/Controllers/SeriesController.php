<?php

namespace App\Http\Controllers;

use App\Models\Series;
use App\Traits\TitlesController;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    use TitlesController;

    protected $table;

    public function __construct()
    {
        $this->table = new Series();
    }
}
