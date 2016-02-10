<?php

require __DIR__ . '/vendor/autoload.php';

$api_json = file_get_contents(__DIR__ . "/.youtube");
$api_key = json_decode($api_json, true)['api_key'];

$client = new Google_Client();
$client->setApplicationName("Demo YouTube API");
$client->setDeveloperKey($api_key);
// $client->setUseBatch(true);

$service = new Google_Service_YouTube($client);
$batch = new Google_Http_Batch($client);

$videos = array(
  "E9pDjBOwtYw",
  "DRctMWOOBJY",
  "_N5zf68ynP0"
);
$part = array("snippet", "contentDetails", "status", "statistics");

$videoData = $service->videos->listVideos("snippet,contentDetails,status,statistics", array(
  'id' => "E9pDjBOwtYw,DRctMWOOBJY"
));
// $batch->add($req, "first");

// $videoData = $batch->execute();

echo var_dump($videoData);
