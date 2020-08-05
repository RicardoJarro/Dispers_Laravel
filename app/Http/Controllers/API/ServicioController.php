<?php

namespace App\Http\Controllers\API;

use App\Category;
use App\GeneralCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    public function index()
    {
        return GeneralCategory::with('categories.products.images')->get();
    }
}
