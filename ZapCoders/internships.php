<?php 
include('conn.php');
include('domain_tech-dict.php');
$errors = array();
$email = $_SESSION['email'];
if (isset($_POST['internships'])) {
  // receive all input values from the form
  $company_array = $_POST['company'];
  $tech_array = $_POST['technologies'];
  $domain_array = $_POST['domain'];
  $duration_array = $_POST['duration'];
  for($i=0;$i<count($company_array);$i++){
    $company = mysqli_real_escape_string($conn, $company_array[$i]);
    $tech = mysqli_real_escape_string($conn,$tech_array[$i]);
    $domain = mysqli_real_escape_string($conn,$domain_array[$i]);
    $duration = mysqli_real_escape_string($conn,$duration_array[$i]);

    $techArray = explode(',', $tech.str_replace(' ','',$tech));
    $rating = 0;
    $company = strtolower($company);
    if ($company == 'google' or $company == 'microsoft' or $company == 'apple' or $company == 'amazon' or $company == 'facebook'){
      $rating = 1.0;
    }
    else if ($company == 'twitter' or $company == 'tcs' or $company == 'oracle' or $company='infosys' or $company = 'ivp' or $company == 'morgan-stalney'){
      $rating = 0.8;
    }
    else{
      $rating = 0.5;
    }
    $q = "INSERT INTO applicant_internships VALUES ('$email', '$company', '$duration', '$domain', '$rating')";
    mysqli_query($conn,$q);

    for($j=0;$j<count($techArray);$j++){
      $techArray[$j] = strtolower($techArray[$j]);
      if($techArray[$j]=='cpp'){
        $tech_Array[$j]='c++';
      }
      if($techArray[$j]=='javascript'){
        $techArray[$j]='js';
      }
      $email = $_SESSION['email'];
      $q1 = "INSERT INTO internship_tech values ('$email','$company','$techArray[$j]') ";
      mysqli_query($conn,$q1);
    }
  }
}
header('location: applicant-form.php#courses-form');
?>