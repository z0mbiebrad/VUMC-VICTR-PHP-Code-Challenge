<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use \Illuminate\Support\Facades\Http;


class FetchPHPStars extends Command
{
    protected $signature = 'app:fetch-p-h-p-stars';

    protected $description = 'fetches most starred php repositories on GitHub';

    public function handle()
    {
        $githubResponse = HTTP::get("https://api.github.com/search/repositories?q=language:php&sort=stars");
        $githubResults = $githubResponse->body();
        $githubData = json_decode($githubResults, true);
        dd($githubData);
    }
}
