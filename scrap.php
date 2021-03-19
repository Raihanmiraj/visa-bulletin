 
<?PHP
header('Access-Control-Allow-Origin: *');
?>
<?php
if(isset($_GET['id'])){
  $u = $_GET['id'];
    $ch = curl_init($u);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
    $newquery = curl_exec($ch);
      $newquery_get = htmlentities($newquery);
   
     echo $newquery_get;

}else{
    echo "<h1>No Link Has Added</h1>";
}


?>
 