<?php
echo '<h1>webcrawler</h1>';

include_once('simple_html_dom.php');

function crawl_url($target_url, $include = array('politics', 'https://www.theguardian.com', '2017')) {
    $array = array();
    $html = new simple_html_dom();
    $html->load_file($target_url);
    foreach($html->find('a') as $a)
    {
        if (    strpos($a->href, $include[0]) !== false &&
            strpos($a->href, $include[1]) !== false &&
            strpos($a->href, $include[2]) !== false &&
            $a->href !== $target_url
        ) {
            echo $a->href."<br />";
            array_push($array, $a->href);
        }
    }

    $meta_data_compiled = array();

    foreach ($array as $i) {

        $data = get_meta_data( $i );

        array_push($meta_data_compiled, $data);
        echo '-';
    }

    foreach ($meta_data_compiled as $item) {
        echo '<h3>'.$item[0].'</h3>';
        echo '<p>'.$item[1].'</p>';
        echo '<ul>';
        foreach ($item[2] as $tag) {
            echo '<li>'.$tag.'</li>';
        }
        echo '</ul>';
    }
}


function get_meta_data( $url ) {

    $meta_data_array = array();
    $meta_tag_data_array = array();

    $content_html = file_get_contents($url);
    $html = new DOMDocument();
    @$html->loadHTML($content_html);

    foreach( $html->getElementsByTagName('meta') as $meta ) {
        if( $meta->getAttribute('property')=='og:title') {
            $meta_title = $meta->getAttribute('content');
        }
        if( $meta->getAttribute('property')=='article:tag') {
            $meta_tags_str = $meta->getAttribute('content');
        }
    }
    if ($meta_tags_str !== '') {
        $meta_tags = explode(',', $meta_tags_str);

        foreach ($meta_tags as $tag) {
            if ($tag) {
                array_push($meta_tag_data_array, $tag);
            }
        }

        array_push($meta_data_array, $meta_title);
        array_push($meta_data_array, $url);
        array_push($meta_data_array, $meta_tag_data_array);

        return $meta_data_array;
    }
}

crawl_url("https://www.theguardian.com/politics/general-election-2017");
