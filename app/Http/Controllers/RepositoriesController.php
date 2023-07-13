<?php

namespace App\Http\Controllers;

use App\Models\Repositories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class RepositoriesController extends Controller
{
    public function __invoke(Request $request)
    {
        Artisan::call('fetch:repositories');

        $repositories = Repositories::orderBy('number_of_stars', 'desc')->paginate(10);

        return view('repositories', compact('repositories'));
    }
}
