<?php
/**
 * Created by PhpStorm.
 * User: saeed
 * Date: 3/28/18
 * Time: 7:28 PM
 */
//function RenderRss($url){
//    try{
//        $content = file_get_contents($url);
//    }catch (Exception $e){
//        echo 'Error on Read';
//        die();
//    }
//    $x = new SimpleXmlElement($content);
//
//    $string ="<ul>";
//    foreach($x->channel->item as $entry) {
//        $string .= "<li><a href='$entry->link' title='$entry->title'>" . $entry->title . "</a></li>";
//    }
//    $string .= "</ul>";
//    return $string;
//}

//function RenderRss($url){
//    try{
//        $content = file_get_contents($url);
//    }catch (Exception $e){
//        echo 'Error on Read';
//        die();
//    }
//    $x = new SimpleXmlElement($content);
//
////    $string ="<ul>";
//    foreach($x->channel->item as $entry) {
//        $tags = get_meta_tags($entry->link);
//        echo "The Title :'$entry->title'<br>";
//        echo "Description : ".$tags['description'].'<br>';
//    }
////    $string .= "</ul>";
////    return $string;
//}
////$tags = get_meta_tags("http://tn.ai/fa/news/1397/01/09/1688874/%D8%B5%D9%86%D8%B9%D8%AA-%D8%AE%D9%88%D8%AF%D8%B1%D9%88-%D8%B3%D8%A7%D9%84-96-%D8%B1%D8%A7-%DA%86%DA%AF%D9%88%D9%86%D9%87-%D8%B3%D9%BE%D8%B1%DB%8C-%DA%A9%D8%B1%D8%AF-%D8%AE%D9%88%D8%AF%D8%B1%D9%88%D9%87%D8%A7%DB%8C%DB%8C-%DA%A9%D9%87-%DA%AF%D8%B1%D8%A7%D9%86-%D8%B4%D8%AF%D9%86%D8%AF-%D8%A7%D9%85%D8%A7-%D8%A8%D8%A7-%DA%A9%DB%8C%D9%81%DB%8C%D8%AA-%D9%86%D8%B4%D8%AF%D9%86%D8%AF?ref=shahrekhabar");
////dd($tags);
//
//RenderRss("https://www.eghtesadnews.com/fa/feeds/?p=Y2F0ZWdvcmllcz02MQ%2C%2C");





class Feed_Miro
{
    public $urls = array();
    public $data = array();

    public function addFeeds( array $feeds )
    {
        $this->urls = array_merge( $this->urls, array_values($feeds) );
    }

    public function grabRss()
    {
        foreach ( $this->urls as $feed )
        {
            $data = @new SimpleXMLElement( $feed, 0, true );
            if ( !$data )
                throw new Exception( 'Could not load: ' . $feed );
            $counter = 0;
            foreach ( $data->channel->item as $item )
            {
                if ($counter !=5 ){
                    $this->data[] = $item;
                }
                else{
                    break;
                }
                $counter++;
            }
        }
    }

    public function merge_feeds(){

        $temp = array();
        foreach ( $this->data as $item )
        {
            if ( !in_array($item->link, $this->links($temp)) )
            {
                $temp[] = $item;
            }
        }    $this->data = $temp;

    }

    private function links( array $items ){
        $links = array();
        foreach ( $items as $item )
        {
            $links[] = $item->link;
        }
        return $links;
    }
}

/*********
add urls
 *********/

$urls = array( 'https://click.ir/feed' );

try
{
    $feeds = new Feed_Miro;
    $feeds->addFeeds( $urls );
    $feeds->grabRss();
    $feeds->merge_feeds();
}
catch ( exception $e )
{
    die( $e->getMessage() );
}
// test from here
$data = array();
$data = $feeds -> data;

usort($data, function($a,$b){
    return strtotime($b->pubDate) -  strtotime($a->pubDate);
});

foreach ( $data as $item ) :
    extract( (array) $item );
    ?>
    <div class="span4 profile">
        <h3 class="profile-description"><a href="<?php echo $link; ?>" style="text-decoration:none;"><?php echo $title; ?></a></h3>
        <p class="profile-description"><?php echo $description; ?><br>
            published: <?php echo date("Y-m-d H:i:s",strtotime($pubDate)); ?> <a href="<?php echo $link ?>" target="_blank">more</a></p>
    </div>
<?php
endforeach;
//echo date("Y-m-d H:i:s",strtotime('April 24, 2018, 3:50 PM'));
//echo  date("H:i:s",strtotime('April 24, 2018, 3:50 PM'));
die();
?>
