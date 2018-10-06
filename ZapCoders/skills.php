<?php session_start(); ?>
<?php 
include('conn.php');
$email=$_SESSION['email'];
$errors = array();

if (isset($_POST['skills'])) {
  // receive all input values from the form
  $tech_array = $_POST['tech'];
  $domain_array = $_POST['domain'];
  $rating_array = $_POST['rating'];
  
  for($i=0;$i<count($tech_array);$i++){
    $tech = mysqli_real_escape_string($conn,$tech_array[$i]);
    $domain = mysqli_real_escape_string($conn,$domain_array[$i]);
    $rating = mysqli_real_escape_string($conn,$rating_array[$i]);
    $rate=0.4;
  if($rating == 'master'){
    $rate=1.0;
  }
  if($rating == 'intermediate'){
    $rate=0.8;
  }
    	$q = "INSERT INTO applicant_skills VALUES ('$email','$tech','$domain','$rate')";
    	mysqli_query($conn,$q);
  }
 }
header('location: applicant-form.php#internships-form');
?>