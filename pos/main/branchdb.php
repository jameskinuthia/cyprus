<?php
require_once('auth.php');
  $sales='sales';
  $_SESSION['DATA_BASE']=$_POST['branch'].$sales;
  $data=$_SESSION['DATA_BASE'];
  if (isset($data)){
    # code...
 header('location:index.php?id=$data');
  } 
  else {
  # code...
  echo "ooops refresh the browser";
  }
        ?>