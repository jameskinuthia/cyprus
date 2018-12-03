<?php
session_start();
require 'config/db.php';
function generateRandomString($length = 4) {
    $characters = 'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

    function createRandomPassword() {
  $chars = "003232303232023232023456789";
  srand((double)microtime()*1000000);
  $i = 0;
  $pass = '' ;
  while ($i <= 7) {

    $num = rand() % 33;

    $tmp = substr($chars, $num, 1);

    $pass = $pass . $tmp;

    $i++;

  }
  return $pass;
}
    $code="KE".generateRandomString();
    $sales="sales";
    $wcode="cp".createRandomPassword();
    $cp=$wcode.$sales;
$firstname=mysqli_real_escape_string($conn,$_POST['firstname']);
$secondname=mysqli_real_escape_string($conn,$_POST['secondname']);
$email=mysqli_real_escape_string($conn,$_POST['email']);
$password=mysqli_real_escape_string($conn,$_POST['password']);
$company=mysqli_real_escape_string($conn,$_POST['company']);
$pin=mysqli_real_escape_string($conn,$_POST['pin']);
$stock="stock";
$branch="branch";
$warehouse="warehouse";
$company_branch=$code.$branch;
$cp_employees=$code."employees";


      $algo='6';
      $rounds='5000';
      $CryptSalt='$'.$algo.'$rounds='.$rounds.'$';      
      $hashedpassword=crypt($password,$CryptSalt);
      $admin='owner';

      $_SESSION['SESS_MEMBER_ID']=$company;
      $_SESSION['SESS_LAST_NAME']=$secondname;
      $_SESSION['COMPANY_BRANCHES']=$company_branch;
      $_SESSION['SESS_MEMBER_ROLE']=$admin;
      $_SESSION['DATA_BASE']=$cp;
      $_SESSION['BRANCHES']=$code;
      #create the sales database
      $crdb="CREATE DATABASE $cp";
      if (mysqli_query($conn,$crdb)) 
      {
        $col="CREATE TABLE `$cp`.`collection` (
  `transaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `balance` int(11) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
$col.="CREATE TABLE `$cp`.`customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `membership_number` varchar(100) NOT NULL,
  `prod_name` varchar(550) NOT NULL,
  `expected_date` varchar(500) NOT NULL,
  `note` varchar(500) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
$col.="CREATE TABLE `$cp`.`products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_code` varchar(200) NOT NULL,
  `gen_name` varchar(200) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `o_price` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `profit` varchar(100) NOT NULL,
  `supplier` varchar(100) NOT NULL,
  `qty` int(10) NOT NULL,
  `qty_sold` int(10) NOT NULL,
  `expiry_date` varchar(500) NOT NULL,
  `date_arrival` varchar(500) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
$col.="CREATE TABLE `$cp`.`purchases` (
  `transaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_number` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `suplier` varchar(100) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
$col.="CREATE TABLE `$cp`.`supliers` (
  `suplier_id` int(11) NOT NULL AUTO_INCREMENT,
  `suplier_name` varchar(100) NOT NULL,
  `suplier_address` varchar(100) NOT NULL,
  `suplier_contact` varchar(100) NOT NULL,
  `contact_person` varchar(100) NOT NULL,
  `note` varchar(500) NOT NULL,
  PRIMARY KEY (`suplier_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
$col.="CREATE TABLE `$cp`.`sales_order` (
  `transaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice` varchar(100) NOT NULL,
  `product` varchar(100) NOT NULL,
  `qty` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `profit` varchar(100) NOT NULL,
  `product_code` varchar(150) NOT NULL,
  `gen_name` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` varchar(100) NOT NULL,
  `discount` varchar(100) NOT NULL,
  `date` varchar(500) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
$col.="CREATE TABLE `$cp`.`sales` (
  `transaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_number` varchar(100) NOT NULL,
  `cashier` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `profit` varchar(100) NOT NULL,
  `due_date` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `balance` varchar(100) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
$col.="CREATE TABLE `$cp`.`purchases_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `cost` varchar(100) NOT NULL,
  `invoice` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
$col.="CREATE TABLE `$cp`.`user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `branch` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
mysqli_multi_query($conn,$col) or die(mysqli_error($conn));
      } 
      else
       {
        echo "database not created ";
      }
    mysqli_close($conn);
    $create=mysqli_connect("localhost","root","","cyprus") or die(mysqli_connect_error());
         
if (isset($company))
 {
   $query="CREATE TABLE $cp_employees(
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `first_name` varchar(200) NOT NULL,
              `second_name` varchar(200) NOT NULL,
              `pin` varchar(12) NOT NULL,
              `id_number` varchar(32) NOT NULL,
              `age` int(2) NOT NULL,
              `salary` int(12) NOT NULL,
              
              `branch` varchar(225) NOT NULL,
              `code` varchar(12) NOT NULL,
              `position` varchar(200) NOT NULL,
              `password` varchar(225) NOT NULL,
               PRIMARY KEY(`id`));"; 

        $query.="CREATE TABLE $company_branch(
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `branch_name` varchar(200) NOT NULL,
              `branch_code` varchar(200) NOT NULL,
              `location` varchar(200) NOT NULL,
              `no_staff` int(11) NOT NULL,
              PRIMARY KEY(`id`));";
        $query.="INSERT INTO members(firstname,secondname,email,password,company,code,position)
        VALUES ('$firstname','$secondname','$email','$hashedpassword','$company','$code','$admin');";

        $query.="INSERT INTO company(name,pin,code)
        VALUES ('$company','$pin','$code');";
        $query.="INSERT INTO $company_branch 
      (branch_name,branch_code, location,no_staff)
  VALUES('$warehouse','$wcode','warehouse','0');";
  $qrycol=mysqli_multi_query($create,$query) or die(mysqli_error($create)) ;
    header('location:pos/main/index.php?id=$company');
      
      
} 
else
 {
  echo("something went wrong");
}

  
mysqli_close($conn);
?>