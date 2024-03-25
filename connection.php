<?php
$host='localhost';
$uname='root';
$pwd='';
$db='ums1';

$conn=mysqli_connect($host, $uname, $pwd, $db);

if(!$conn){
    die('Error is'.mysqli_connect_error());
}
?>