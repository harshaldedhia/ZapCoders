<?php session_start(); ?>
<?php 
include('conn.php');
$errors = array();

$email = $_SESSION['email'];

if (isset($_POST['projects'])) {
  // receive all input values from the form
  $description_array = $_POST['desc'];
  $tech_array = $_POST['tech'];
  $domain_array = $_POST['domain'];
  $github_link_array = $_POST['github_link'];
  for($i=0;$i<count($description_array);$i++){
    $desc = mysqli_real_escape_string($conn, $description_array[$i]);
    $tech = mysqli_real_escape_string($conn,$tech_array[$i]);
    $domain = mysqli_real_escape_string($conn,$domain_array[$i]);
    $github_link = mysqli_real_escape_string($conn,$github_link_array[$i]);

    $techArray = explode(',', $tech);

    $github_link = mysqli_real_escape_string($conn, $github_link_array[$i]);
    $stars = 0;
    if(isset($_POST['github_link'])){
      $command1 = escapeshellcmd("python scrape_github.py $github_link");
      $stars = shell_exec($command1);
    }
    $q = "INSERT INTO applicant_projects VALUES ('$email','$desc','$gitub_link','$domain','$stars')";
    mysqli_query($conn,$q);

    for($j=0;$j<count(techArray);$j++){
      $techArray = strtolower($techArray[$j]);
      if($techArray[$j] == 'cpp'){
        $techArray[$j] = 'c++';
      }
      if($techArray[$j] == 'javascript'){
        $techArray[$j] = 'js';
      }
      $email = $_SESSION['email'];
      $q1 = "INSERT INTO project_tech values ('$email','$desc','$techArray[$j]') ";
      mysqli_query($conn,$q1);
    }
  }
}
header('location: applicant-form.php#skills-form');
?>