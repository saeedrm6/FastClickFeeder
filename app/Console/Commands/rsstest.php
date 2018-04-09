<?php

namespace App\Console\Commands;

use App\Post;
use Illuminate\Console\Command;
use App\Tag;
use App\myfunctions\GetAllmeta;

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
        $get_all_meta = new GetAllmeta();
        $ary = $get_all_meta->getMeta('https://click.ir/1397/01/20/telegram-filtering-imminent/', array ('keywords','article:tag'), $timeout = 10);
        if (isset($ary["article:tag"])){
            $keywords = array();
            foreach ($ary['article:tag'] as $keyword){
                $keywords[] = $keyword;
            }
            $keywords = array_unique($keywords);
            foreach ($keywords as $keyword){
//                                        dd(count(Tag::where('name',$keyword)->first()));
                $query = "select `id` from `tags` where `name` = '{$keyword}'";
                $tags = \DB::table('tags')
                    ->where('name', $keyword)
                    ->get();
                if (count($tags) == 0){
                    $tag = Tag::create([
                        'name'  =>  $keyword
                    ]);
                    $post = Post::find(25);
                    $post->tags()->attach($tag);
                }else{
                    $post = Post::find(25);
                    $tag = Tag::where('name',$keyword)->first();
                    $post->tags()->attach($tag);
                }
            }
            unset($keywords);
        }
    }
}
