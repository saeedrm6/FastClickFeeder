<?php

namespace App\Console\Commands;

use App\PostMeta;
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
                    $getposts = Post::where('post_type','=','rss')->where('permalink','=',$entry->link)->get();
//                    $query = "select `id` from posts where `post_type`='rss' AND `permalink` Like '{$entry->link}'";
                    if (count($getposts)==0){
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
                        $meta = new PostMeta();
                        $meta->meta_key = 'views';
                        $meta->meta_value = 0;
                        $post->postmetas()->save($meta);
                        $p_id=$post->id;
                        $get_all_meta = new GetAllmeta();
                        $ary = $get_all_meta->getMeta($post->permalink, array ("keywords","article:tag"), $timeout = 30);
                        if (isset($ary["keywords"])){
                            $keywords = $ary["keywords"];
                            if (!is_array($keywords)){
                                if (strpos($keywords,",")){
                                    $keywords = explode(",",$keywords);
                                }else{
                                    $keywords = explode("،",$keywords);
                                }
                                $keywords = array_unique($keywords);
                                foreach ($keywords as $keyword){
                                    $tags = Tag::where('name',$keyword)->get();
                                    if (count($tags) == 0){
                                        $tag = Tag::create([
                                            'name'  =>  $keyword
                                        ]);
                                        $post->tags()->attach($tag);
                                    }else{
                                        $tag = Tag::where('name',$keyword)->get();
                                        foreach ($tag as $t){
                                            $post->tags()->attach($t);
                                        }
                                    }
                                }
                                unset($keywords);
                            }
                        }

                        if (isset($ary["article:tag"])){
                            $keywords = array();
                            foreach ($ary["article:tag"] as $keyword){
                                $keywords[] = $keyword;
                            }
                            $keywords = array_unique($keywords);
                            $articletag = $keywords;
                            foreach ($keywords as $keyword){
                                $tags = Tag::where('name',$keyword)->get();
                                if (count($tags) == 0){
                                    $tag = Tag::create([
                                        'name'  =>  $keyword
                                    ]);
                                    $post->tags()->attach($tag);
                                }else{
                                    $tag = Tag::where('name',$keyword)->get();
                                    foreach ($tag as $t){
                                        $post->tags()->attach($t);
                                    }
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
