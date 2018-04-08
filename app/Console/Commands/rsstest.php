<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Tag;

class rsstest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rss:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'All Test methods';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        dd(count(Tag::where('name','First')->first()));
    }
}
