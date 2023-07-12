<?php

namespace App\Http\Controllers;

use App\Models\PHPStars;
use Illuminate\Http\Request;

class PHPStarsController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = PHPStars::all();

        return view('phpstars', [
            'data' => $data
        ]);
    }
}
