 
<?PHP
header('Access-Control-Allow-Origin: *');
?>

<?php
include 'curl.php';
include 'base_url.php';
$curl = new cURL();
if (isset($_GET['m'])&&isset($_GET['y'])) {
    if (isset($_GET['c'])&& $_GET['c']=="f4") {

 $year = $_GET['y'];
 $month = $_GET['m'];
 $fiscalYear = $curl->get($base_url.'check.php?m='.$month.'&y='.$year);
  $url = 'https://travel.state.gov/content/travel/en/legal/visa-law0/visa-bulletin/'.$fiscalYear.'/visa-bulletin-for-'.$_GET['m'].'-'.$_GET['y'].'.html';
     $getFile = $curl->get($base_url.'scrap.php?id='.$url);
        $re = '/&lt;\/tr&gt;&lt;tr&gt;&lt;td&gt;F4&lt;\/td&gt;(.*?)&lt;\/tr&gt;&lt;\/tbody&gt;&lt;\/table&gt;/ms';
        preg_match_all($re, $getFile, $matches, PREG_SET_ORDER, 0);
 $f4first =  $matches[0][1];
 $re = '/&lt;td&gt;(.*?)&lt;\/td&gt;/ms';
 preg_match_all($re, $f4first, $matches, PREG_SET_ORDER, 0);
   $dateF4Visa = $matches[0][1];
   preg_match_all('/([0-9][0-9])(.*?)([0-9][0-9])/ms', $dateF4Visa, $matches, PREG_SET_ORDER, 0);
    $date = $matches[0][1];
   $month = $matches[0][2];
        $year = $matches[0][3];
        $returnDate =array(
    "date"=>$date,
    "month"=>$month,
    "year"=>$year,
    "fiscalYear"=>$fiscalYear
 );
        $returnDate = json_encode($returnDate);
        echo $returnDate;
       
    }else{
        echo "SELECT A VALID CAT";
    }
}
?>
