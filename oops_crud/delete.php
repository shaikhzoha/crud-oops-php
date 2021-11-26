<?php
include_once 'database.php';
$obj = new database();
// $resultconfirm =  
$message = "your record has been deleted ";
// if($resultconfirm){


    if(isset($_GET['d_id']))
    {
    $id = $_GET['d_id'];
    // $obj->delete($id);
    // if($obj->createConfirmationmbox($id)){
    if($obj->delete($id))
    {
    echo "<SCRIPT> //not showing me this 
         alert('$message')
               window.location.replace('http://localhost:8081/oops_crud/show.php/');
  </SCRIPT>";

   }
}
  

?>
