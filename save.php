<?php
$server="localhost";
$name="root";
$age="";
$phno="";
$favoriteApp="";
$satisfaction="";

$connection = mysqli_connect($server,$name,$age,$phno,$favoriteApp,$satisfaction,$improvements);

#$connection= new mysqli($server,$name,$age,$phno,$favoriteApp,$satisfaction);
if(!$connection)
{
  echo "not connected";

}
else
{
  echo "connected";
}
$name=$_POST['name'];

$age=$_POST['age'];
$phno=$_POST['phno'];
$food=$_POST['favoriteApp'];
$factors=$_POST['satisfaction'];
$improvements=$_POST['improvements'];

$sql="INSERT INTO `csp`(`name`, `age`, `phno`, `food`, `factors`, `improvements`) VALUES ('$name','$age','$phno','$food','$factors','$improvements')";
$result=mysqli_query($connection,$sql);
if($result)
{
  echo "data submitted successfully";
}
else
{
  echo "data not submitted";
}


?>