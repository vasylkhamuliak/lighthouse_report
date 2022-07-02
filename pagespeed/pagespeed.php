<?php

function checkPageSpeed( $site, $strategy = 'mobile' )
{
    $url = "https://www.googleapis.com/pagespeedonline/v5/runPagespeed?";
    $url .= "url=".$site;
    $url .= "&screenshot=false";
    $url .= "&category=ACCESSIBILITY";
    $url .= "&category=BEST_PRACTICES";
    $url .= "&category=PERFORMANCE";
    $url .= "&category=SEO";
    $url .= "&key=".API_KEY;
    $url .= "&strategy=".$strategy;

    $ch = curl_init();
    curl_setopt( $ch, CURLOPT_URL, $url );
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
    curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1 );
    curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, 0 );
    curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, 0 );
    curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT, 60 );
    $result = curl_exec( $ch );
    curl_close( $ch );

    return $result;
}

function parseResults( $results )
{
    $result = json_decode( $results );

    $output['performance'] = ( $result->lighthouseResult->categories->performance->score * 100 );
    $output['accessibility'] = ( $result->lighthouseResult->categories->accessibility->score * 100 );
    $output['best-practices'] = ( $result->lighthouseResult->categories->{"best-practices"}->score * 100 );
    $output['seo'] = ( $result->lighthouseResult->categories->seo->score * 100 );

    return $output;
}

function generateCSV( $data )
{

}
