<?php 
include('conn.php');
$errors = array();

if (isset($_POST['certificate'])) {
  // receive all input values from the form
  $domain_array = $_POST['domain'];
  $tech_array = $_POST['tech'];
  $source_array = $_POST['source'];

  for($j=0;$j<count(tech_array);$j++){
    $tech_array[$j] = strtolower($tech_array[$j])
    if($tech_array[$j]=='cpp'){
      $tech_array[$j]='c++';
    }
    if($tech_array[$j]=='javascript'){
      $tech_array[$j]='JS';
  }
  $email = $_SESSION["email"];

  for($i=0;$i<count($domain_array);$i++){
    $domain = mysqli_real_escape_string($conn, $domain_array[$i]);
    $tech = mysqli_real_escape_string($conn,$tech_array[$i]);
    $source = mysqli_real_escape_string($conn,$source_array[$i]);

    $q = "INSERT INTO applicant_certification VALUES ('$email', '$tech', '$domain', '$source')";
    mysqli_query($conn,$q);
    }
  }

?>