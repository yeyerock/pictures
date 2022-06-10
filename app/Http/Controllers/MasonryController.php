<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Picture;

class MasonryController extends Controller
{
    public function index()
    {
        $pictures = Picture::paginate(20);
        return view ('masonry.index', compact('pictures'));
    }
}
