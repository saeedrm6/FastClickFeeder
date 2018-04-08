<?php

namespace App\Console\Commands;

use App\RssHistory;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Rss;

class CheckRss extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rss:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check All Rss for Changes';

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

    public function getcontent($url)
    {
        try{
            return file_get_contents($url);
        }catch (\Exception $e){
            return "";
        }
    }

    public function handle()
    {
        $allRss = Rss::all();
        foreach ($allRss as $rss){
            if ($rss->history != null){
                if ($rss->history->body != $this->getcontent($rss->url)){
                    $rss->history->body = $this->getcontent($rss->url);
                    $rss->history->version = $rss->history->version+1;
                    $rss->history->save();
                }
            }else{
                $history = new RssHistory();
                $history->body=$this->getcontent($rss->url);
                $rss->history()->save($history);
            }
        }
    }
}
