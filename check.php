<?php
include 'curl.php';
include 'base_url.php';
 
if (isset($_GET['m'])&&isset($_GET['y'])) {
    $year = $_GET['y'];
    $month = $_GET['m'];
 
    $curl = new cURL();
    $url = 'https://travel.state.gov/content/travel/en/legal/visa-law0/visa-bulletin.html';
    $visaButtetinPage = $curl->get($base_url.'scrap.php?id='.$url);
     
    $re = '/\/content\/travel\/en\/legal\/visa-law0\/visa-bulletin\/(.*?)\/visa-bulletin-for-'.$month.'-'.$year.'.html/mx';
    preg_match_all($re, $visaButtetinPage, $matches, PREG_SET_ORDER, 0);
    $fiscalYear = $matches[0][1];
    echo $fiscalYear;
}


?>