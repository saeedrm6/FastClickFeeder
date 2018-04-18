<?php
namespace App\myfunctions;
use Illuminate\Database\Eloquent\Model;
use App\Rss;
function getcontent($url)
{
    try{
        return file_get_contents($url);
    }catch (Exception $e){
        return "";
    }
}

function is_indexed($post_type,$permalink){

}

function strip_tag($tag){
    return str_replace(' ','-',$tag);
}

//$tags = get_meta_tags("https://click.ir/1397/01/09/samsung-galaxy-note-9/");
//dd($tags);

class GetAllmeta {
    /**
     * Curl the document
     * @param string $url
     * @param int $timeout
     * @return string $data
     */
    private function curl($url, $timeout) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }

    /**
     *
     * @param string $url
     * @param array $tags array ('description', 'keywords')
     * @param int $timeout seconds
     * @return mixed false| array
     */
    public function getMeta($url, $tags = array ('description', 'keywords'), $timeout = 10) {

        $html = $this->curl($url, $timeout);
        if (!$html) {
            return false;
        }
        $doc = new \DOMDocument();
        @$doc->loadHTML($html);
        $nodes = $doc->getElementsByTagName('title');
        // Get and display what you need:

        $ary = [];

//        $ary['title'] = $nodes->item(0)->nodeValue;
        $metas = $doc->getElementsByTagName('meta');

        for ($i = 0; $i < $metas->length; $i++) {
            $meta = $metas->item($i);
            foreach($tags as $tag) {
                if ($meta->getAttribute('name') == $tag) {
                    $ary[$tag] = $meta->getAttribute('content');
                }
            }
            foreach($tags as $tag) {
                if ($meta->getAttribute('property') == $tag) {
                    $ary[$tag][] = $meta->getAttribute('content');
                }
            }
        }
        return $ary;
    }
}
//$get_all_meta = new GetAllmeta();
//$test = array(1,2,3,4,5,6,1,1,2,4);
//dd(array_unique($test));


//$content = file_get_contents('https://www.zoomit.ir/feed/');
//$x = @new \SimpleXmlElement($content);
//foreach($x->channel->item as $entry) {
//    echo $entry->title;
//}




// With more params
//$ary = $m->getMeta('https://click.ir/1397/01/20/iranian-messengers-app-store-deleted/', array ('keywords','article:tag'), $timeout = 10);
//$ary = $get_all_meta->getMeta('https://click.ir/1397/01/20/iranian-messengers-app-store-deleted/', array ('keywords','article:tag'), $timeout = 10);
//$ary = $m->getMeta('https://www.isna.ir/news/97011403001/%D8%A7%D8%B3%D8%AA%D8%B9%D9%81%D8%A7%DB%8C-%D9%86%D8%AC%D9%81%DB%8C-%D8%A8%D9%87-%D8%B1%D8%A7%D8%AD%D8%AA%DB%8C-%D9%BE%D8%B0%DB%8C%D8%B1%D9%81%D8%AA%D9%87-%D9%86%D9%85%DB%8C-%D8%B4%D9%88%D8%AF-%D8%A7%D9%86%D8%AA%D8%AE%D8%A7%D8%A8-%D8%B3%D8%B1%D9%BE%D8%B1%D8%B3%D8%AA-%D8%A8%D8%B1%D8%A7%DB%8C-%D8%B4%D9%87%D8%B1%D8%AF%D8%A7%D8%B1%DB%8C', array ('keywords','article:tag'), $timeout = 10);
//$ary = $get_all_meta->getMeta('https://www.nytimes.com/2018/04/02/us/politics/trump-immigration-mexico-daca.html?hp&action=click&pgtype=Homepage&clickSource=story-heading&module=first-column-region&region=top-news&WT.nav=top-news', array ('keywords','article:tag'), $timeout = 10);
//if (isset($ary['keywords'])){
//    $keywords =$ary['keywords'];
//    print_r(explode(",",$keywords));
//}
//print_r($ary);
//die();


//dd(DB::table('users')->get());





//foreach ($allRss as $rss){
//    try{
//        $content = file_get_contents($rss->url);
//        $x = new SimpleXmlElement($content);
//        foreach($x->channel->item as $entry) {
//            $query = "select * `id` from posts where `post_type`='rss' AND `permalink`='{$entry->link}'";
//            echo $query;
//            global $myexclusive;
////            $myexclusive->select($query);
//        }
//
//    }catch (Exception $e){
//        echo 'Error on read rss';
//    }
//}


//die();
