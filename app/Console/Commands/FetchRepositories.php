<?php

namespace App\Console\Commands;

use App\Models\Repositories;
use Illuminate\Console\Command;
use \Illuminate\Support\Facades\Http;


class FetchRepositories extends Command
{
    protected $signature = 'fetch:repositories';

    protected $description = 'fetches most starred php repositories on GitHub';

    public function handle()
    {
        Repositories::truncate();

        $githubResponse = HTTP::get("https://api.github.com/search/repositories?q=language:php&sort=stars");
        $githubResults = $githubResponse->body();
        $githubData = json_decode($githubResults);

        foreach ($githubData->items as $item) {
            try {
                Repositories::create([
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
