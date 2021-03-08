<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Traits\TitlesController;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    use TitlesController;

    protected $table;

    public function __construct()
    {
        $this->table = new Movie();
    }
}
