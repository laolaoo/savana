<?php
if(!isset($_SESSION['username']))
{
  session_start();
}


$errors =array();
$username="";
$_SESSION['success'] = "";

$server="localhost";
$pass="";
$user="root";
$dbname="savana";

// Creat connection
$connection=mysqli_connect($server,$user,$pass,$dbname);


// check of connection
if(!$connection){
	die("connection to database failed".mysqli_connect_error());
}


if(isset($_POST['register'])){

	$fname= mysqli_real_escape_string($connection, $_POST['fname']);
	$lname= mysqli_real_escape_string($connection, $_POST['lname']);
	$gender=$_POST['gender'];
	$dob= $_POST['dob'];
# _________________________________ new variable_________________
  $avatar1=$_POST['avatar'];

	  $username = mysqli_real_escape_string($connection, $_POST['username']);
  $email = mysqli_real_escape_string($connection, $_POST['email']);
  $password1 = mysqli_real_escape_string($connection, $_POST['password']);
  $cpassword = mysqli_real_escape_string($connection, $_POST['cpassword']);

$address= mysqli_real_escape_string($connection,$_POST['address']);

  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password1)) { array_push($errors, "Password is required"); }
  if (empty($cpassword)) { array_push($errors, "Confirm your password!"); }
  if (empty($fname) || empty($lname)) { array_push($errors, "please enter your full name");} 
  if($password1 != $cpassword){
	array_push($errors, "the two passwords do not match!");
}


if(count($errors) == 0){

	$password = md5($password1);

	$sql= "INSERT INTO customer (username, fname, lname, gender, address, dob, email, password, avatar) VALUES('$username', '$fname', '$lname', '$gender', '$address', '$dob', '$email', '$password', '$avatar1')";

	if(mysqli_query($connection,$sql)){
  echo "New record created successfully";
  header("location: welcome.php");
	}


     }
    else{
    echo "Error: no connection " .  mysqli_error($connection);
 	
    } 

}

// for login form ...
if(isset($_POST['login'])){

	$username= mysqli_real_escape_string($connection,$_POST['username']);
	$password= mysqli_real_escape_string($connection,$_POST['password']);


	  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }
  if(count($errors)== 0){
    $password=md5($password);
  	  	$sql="SELECT * FROM customer WHERE username='$username' AND password='$password'";
  	$result= mysqli_query($connection,$sql);
    
   
  	if (mysqli_num_rows($result) == 1) {

  		$_SESSION['username']=$username;
  		$_SESSION['success'] = "You are now logged in";
  		header('location: main.php');

  	}
  	else{
  		array_push($errors, "Your username/password is incorrect!");
  	}
  }
}




?>
