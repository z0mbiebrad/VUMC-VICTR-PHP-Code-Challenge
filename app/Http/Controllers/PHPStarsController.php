<?php

namespace App\Http\Controllers;

use App\Models\PHPStars;
use Illuminate\Http\Request;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class PHPStarsController extends Controller
{
    public function index(Request $request)
    {
        $repositories = DB::table('p_h_p_stars')->orderBy('number_of_stars', 'desc')->paginate(10);

        return view('phpstars', compact('repositories'));
    }

    public function update(Request $request)
    {
        Artisan::call('app:fetch-p-h-p-stars');

        $repositories = DB::table('p_h_p_stars')->orderBy('number_of_stars', 'desc')->paginate(10);

        return view('phpstars', compact('repositories'));
    }
}
