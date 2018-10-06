<?php session_start(); ?>
<?php 
include('conn.php');
$email=$_SESSION['email'];
$errors = array();

if (isset($_POST['add'])) {
  // receive all input values from the form
  $tech_array = $_POST['tech'];
  $domain_array = $_POST['domain'];
  $source_array = $_POST['source'];
  
  for($i=0;$i<count($tech_array);$i++){
    $tech = mysqli_real_escape_string($conn,$tech_array[$i]);
    $domain = mysqli_real_escape_string($conn,$domain_array[$i]);
    $source = mysqli_real_escape_string($conn,$source_array[$i]);
    $rate=0.5;
  if($source == 'coursera' or $source == 'udemy' or $source == 'udacity'){
    $rate=0.9;
  }
      $q = "INSERT INTO applicant_certification VALUES ('$email','$tech','$domain','$rate')";
      mysqli_query($conn,$q);
  }
 }
header('location: applicant-form.php#internships-form');
?>