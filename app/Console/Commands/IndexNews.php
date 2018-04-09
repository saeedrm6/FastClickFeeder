<?php

namespace App\Console\Commands;

use App\Tag;
use Illuminate\Console\Command;
use App\Rss;
use App\Post;
use App\RssHistory;
use App\myfunctions\GetAllmeta;

class IndexNews extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rss:index';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Index news of Rss';

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
        $allRss = Rss::all();

        foreach ($allRss as $rss){

                $content = @file_get_contents($rss->url);
                if (strpos($content,'<channel')){
                    $x = @new \SimpleXmlElement($content);
                    foreach($x->channel->item as $entry) {
                        $query = "select `id` from posts where `post_type`='rss' AND `permalink` Like '{$entry->link}'";
                        if (count(\DB::select($query))==0){
                            $post = Post::create([
                                'user_id'   =>  1,
                                'rss_id'   =>  $rss->id,
                                'title'   =>  (string)$entry->title,
                                'content'   =>  null,
                                'excerpt'   =>  (string)$entry->description,
                                'status'   =>  'publish',
                                'comment_status'   =>  'open',
                                'post_type'   =>  'rss',
                                'permalink'   =>  (string)$entry->link,
                            ]);
                            $p_id=$post->id;
                            $get_all_meta = new GetAllmeta();
                            $ary = $get_all_meta->getMeta($post->permalink, array ('keywords','article:tag'), $timeout = 10);
//                            var_dump($ary);
                            if (isset($ary['keywords'])){
//                                echo 'yes';
                                $keywords = $ary['keywords'];
                                if (!is_array($keywords)){
                                    $keywords = explode("،",$keywords);
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
                                            global $p_id;
                                            $post = Post::find($p_id);
                                            $post->tags()->attach($tag);
                                        }else{
                                            global $p_id;
                                            $post = Post::find($p_id);
                                            $tag = Tag::where('name',$keyword)->first();
                                            $post->tags()->attach($tag);
                                        }
                                    }
                                }
                                unset($keywords);
                            }

                            if (isset($ary["article:tag"])){
                                $keywords = array();
                                foreach ($ary["article:tag"] as $keyword){
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
                                        $post->tags()->attach($tag);
                                    }else{
                                        $tag = Tag::where('name',$keyword)->first();
                                        $post->tags()->attach($tag);
                                    }
                                }
                                unset($keywords);
                            }
                        }else{
                            $history = RssHistory::where('rss_id',$rss->id)->first();
                            $history->latest_version = $history->version;
                            $history->update();
                            break;
                        }
                    }
                }
        }
    }
}
