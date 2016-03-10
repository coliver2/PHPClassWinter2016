<?php

function isPostRequest() {
    return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST' );
}

function isGetRequest() {
    return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'GET' );
}

function getHtml($link) {

    // create curl resource 
    $curl = curl_init();

    // set url 
    curl_setopt($curl, CURLOPT_URL, $link);

    //return the transfer as a string 
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    // $output contains the output string 
    $output = curl_exec($curl);

    // close curl resource to free up system resources 
    curl_close($curl);

    return $output;
}

/*
 * returns array
 */

function getLinks($link) {

    $output = getHtml($link);
    $urlRegex = '/(https?:\/\/[\da-z\.-]+\.[a-z\.]{2,6}[\/\w \.-]+)/';
    preg_match_all($urlRegex, $output, $urlMatches);
    $removeDuplicates = array_unique($urlMatches[0]);

    return $removeDuplicates;
}

function saveSite($link, $output) {
    $db = dbconnect();


    $stmt = $db->prepare("INSERT INTO sites SET site = :site, date = now()");

    $binds = array(
        ":site" => $link,
    );

    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {

        $site_id = $db->lastInsertId();
        /* insterting to sitelinks table
         */

        $stmt = $db->prepare("INSERT INTO sitelinks SET link = :link, site_id = :site_id");

        foreach ($output as $link) {
            $binds = array(":link" => $link, ":site_id" => $site_id);
            $stmt->execute($binds);
        }
        return true;
    }
    return false;
}
