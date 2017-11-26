<?php

//haal stad uit url
$city = $_GET['city'];
$url = "http://www.bing.com/images/search?q=".str_replace(" ","+",$city)."&qs=n&form=QBLH&scope=images&sp=-1&ghc=1&pq=".str_replace(" ","+",$city)."&sc=8-9&sk=&cvid=6B77F9D5D2AA43D9BB9CFCAB9A195E4D";

//maak een nieuwe curl
$curl = curl_init();

//zet url en opties
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

//uitvoeren
$output = curl_exec($curl);

//sluiten
curl_close($curl);

//zoekt alle image href's.
preg_match_all('!<a class="thumb" target="_blank" href="(.*?)"!', $output,$url_matches);

//maakt pagina jpeg
header('Content-type: image/jpeg');

//laat foto zien
echo file_get_contents($url_matches[1][0]);


