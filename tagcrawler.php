<?php
echo '<h1>tag crawler</h1>';

include_once('simple_html_dom.php');

function crawl_url(
    $target_url = 'https://www.theguardian.com',
    $include = array('theguardian', 'https://www.theguardian.com'),
    $file = 'guardian9jun.csv'
    ) {
    $meta_data_compiled = '';
    $temp_url = '';
    $html = new simple_html_dom();
    $html->load_file($target_url);
    foreach($html->find('a') as $a)
    {
        if (    strpos($a->href, $include[0]) !== false &&
            strpos($a->href, $include[1]) !== false &&
            $a->href !== $target_url
        ) {
            echo $a->href."<br />";
            $meta_data_compiled .= get_meta_data( $a->href );
        }
    }

    $meta_data_compiled = str_replace(' ', '', $meta_data_compiled);

    $meta_data_compiled_array = array_count_values(str_word_count($meta_data_compiled, 1));

    $meta_data_output = "name,count\n";
    foreach ( $meta_data_compiled_array as $key => $value ) {

        if ($value > 5) {
            $meta_data_output .= $key.",".$value."\n";
        }
    }

    echo $meta_data_output;

    file_put_contents('data/'.$file, $meta_data_output);

}


function get_meta_data( $url ) {
    $meta_tags = '';
    $content_html = file_get_contents($url);
    $html = new DOMDocument();
    @$html->loadHTML($content_html);

    foreach( $html->getElementsByTagName('meta') as $meta ) {

        if( $meta->getAttribute('property')=='article:tag') {
            $meta_tags .= $meta->getAttribute('content').',';
        }
    }

    return $meta_tags;
}

// crawl_url();

crawl_url('https://www.thesun.co.uk/',array('news','thesun','https://www.thesun.co.uk'),'sun9jun.csv');

// crawl_url('http://www.mirror.co.uk/news/politics/',array('news','politics','http://www.mirror.co.uk'),'mirror9jun.csv');
