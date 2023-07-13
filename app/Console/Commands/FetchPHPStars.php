<?php

namespace App\Console\Commands;

use App\Models\PHPStars;
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
        $githubData = json_decode($githubResults);

        foreach ($githubData->items as $item) {
            try {
                PHPStars::create([
                    'repository_ID' => $item->id,
                    'name' => $item->name,
                    'url' => $item->html_url,
                    'created_date' =>  $item->created_at,
                    'last_push_date' => $item->pushed_at,
                    'description' => $item->description,
                    'number_of_stars' => $item->stargazers_count
                ]);
            } catch (\Throwable $th) {
                //throw $th;
            }
        }
        $this->info('Succesfully fetched most starred PHP repositories');
    }
}
