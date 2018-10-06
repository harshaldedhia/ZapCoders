<?php session_start(); ?>
<?php 
include('conn.php');
$ssc = "";
$hsc = "";
$bcd = "";
$bcn = "";
$bcc = "";
$mcd = "";
$mcn = "";
$mcc = "";
$codechef_url = "";
$codeforces_url = "";
$errors = array();
if (isset($_GET['ed'])) {
  // receive all input values from the form
  $ssc = mysqli_real_escape_string($conn, $_GET['ssc']);
  $hsc = mysqli_real_escape_string($conn, $_GET['hsc']);
  $bcd = mysqli_real_escape_string($conn, $_GET['bcd']);
  $bcn = mysqli_real_escape_string($conn, $_GET['bcn']);
  $bcc = mysqli_real_escape_string($conn, $_GET['bcc']);
  $mcd = mysqli_real_escape_string($conn, $_GET['mcd']);
  $mcn = mysqli_real_escape_string($conn, $_GET['mcn']);
  $mcc = mysqli_real_escape_string($conn, $_GET['mcc']);
  $codechef_url = mysqli_real_escape_string($conn, $_GET['codechef']);
  $codeforces_url = mysqli_real_escape_string($conn, $_GET['codeforces']);
  $codechef=0;
  $codeforces = 0;
  if(isset($_GET['codechef'])){
  	$command1 = escapeshellcmd("python scrape_codechef.py $codechef_url");
  	$codechef = shell_exec($command1);
  }
  if(isset($_GET['codeforces'])){
  	$command2 = escapeshellcmd("python scrape_codeforces.py $codeforces_url");
  	$codeforces = shell_exec($command2);
  }
  $btier1 = array("iitkharagpur", "iitkgp",  "iitbombay", "iitmumbai", "iitb", "iitkanpur", "iitk", "iitmadras", "iitm", "iitdelhi", "iitd", "iitguwahati", "iitguvahati", "iitg", "iitroorkee", "iitroorki", "iitr", "iitvaranasi", "iitbhu", "iitbhubaneshwar", "iitgandhinagar", "iithyderabad", "iitjodhpur", "iitpatna", "iitropar", "iitroper", "iitindore", "iitmandi", "iitpalakkad", "iitpalakad", "iittirupati", "iitdhanbad", "iitbhilai", "iitgoa", "iitjammu", "iitjammuandkashmir", "iitdharwad", "iitdharvad", "indianinstituteoftechnologykharagpur", "indianinstituteoftechnologybombay", "indianinstituteoftechnologymumbai", "iitb", "indianinstituteoftechnologykanpur", "iitk", "indianinstituteoftechnologymadras", "iitm", "indianinstituteoftechnologydelhi", "iitd", "indianinstituteoftechnologyguwahati", "indianinstituteoftechnologyguvahati", "iitg", "indianinstituteoftechnologyroorkee", "indianinstituteoftechnologyroorki", "iitr", "indianinstituteoftechnologyvaranasi", "iitbhu", "indianinstituteoftechnologybhubaneshwar", "indianinstituteoftechnologygandhinagar", "indianinstituteoftechnologyhyderabad", "indianinstituteoftechnologyjodhpur", "indianinstituteoftechnologypatna", "indianinstituteoftechnologyropar", "indianinstituteoftechnologyroper", "indianinstituteoftechnologyindore", "indianinstituteoftechnologymandi", "indianinstituteoftechnologypalakkad", "indianinstituteoftechnologypalakad", "indianinstituteoftechnologytirupati", "indianinstituteoftechnologydhanbad", "indianinstituteoftechnologybhilai", "indianinstituteoftechnologygoa", "indianinstituteoftechnologyjammu", "indianinstituteoftechnologyjammuandkashmir", "indianinstituteoftechnologydharwad", "indianinstituteoftechnologydharvad", "nitwarangal", "nitvarangal", "nittrichy", "nitsurathkal", "nitsuratkal", "nitallahbad", "nitallahabad", "nitbhopal", "nitcalicut", "nitjaipur", "nitnagpur", "vnit", "nitsurat", "nationalinstituteoftechnologywarangal", "nationalinstituteoftechnologyvarangal", "nationalinstituteoftechnologytrichy", "nationalinstituteoftechnologysurathkal", "nationalinstituteoftechnologysuratkal", "nationalinstituteoftechnologyallahbad", "nationalinstituteoftechnologyallahabad", "nationalinstituteoftechnologybhopal", "nationalinstituteoftechnologycalicut", "nationalinstituteoftechnologyjaipur", "nationalinstituteoftechnologynagpur", "nationalinstituteoftechnologysurat");

  $mtier1 = array("iitkharagpur", "iitkgp",  "iitbombay", "iitmumbai", "iitb", "iitkanpur", "iitk", "iitmadras", "iitm", "iitdelhi", "iitd", "iitguwahati", "iitguvahati", "iitg", "iitroorkee", "iitroorki", "iitr", "iitvaranasi", "iitbhu", "iitbhubaneshwar", "iitgandhinagar", "iithyderabad", "iitjodhpur", "iitpatna", "iitropar", "iitroper", "iitindore", "iitmandi", "iitpalakkad", "iitpalakad", "iittirupati", "iitdhanbad", "iitbhilai", "iitgoa", "iitjammu", "iitjammuandkashmir", "iitdharwad", "iitdharvad", "indianinstituteoftechnologykharagpur", "indianinstituteoftechnologybombay", "indianinstituteoftechnologymumbai", "iitb", "indianinstituteoftechnologykanpur", "iitk", "indianinstituteoftechnologymadras", "iitm", "indianinstituteoftechnologydelhi", "iitd", "indianinstituteoftechnologyguwahati", "indianinstituteoftechnologyguvahati", "iitg", "indianinstituteoftechnologyroorkee", "indianinstituteoftechnologyroorki", "iitr", "indianinstituteoftechnologyvaranasi", "iitbhu", "indianinstituteoftechnologybhubaneshwar", "indianinstituteoftechnologygandhinagar", "indianinstituteoftechnologyhyderabad", "indianinstituteoftechnologyjodhpur", "indianinstituteoftechnologypatna", "indianinstituteoftechnologyropar", "indianinstituteoftechnologyroper", "indianinstituteoftechnologyindore", "indianinstituteoftechnologymandi", "indianinstituteoftechnologypalakkad", "indianinstituteoftechnologypalakad", "indianinstituteoftechnologytirupati", "indianinstituteoftechnologydhanbad", "indianinstituteoftechnologybhilai", "indianinstituteoftechnologygoa", "indianinstituteoftechnologyjammu", "indianinstituteoftechnologyjammuandkashmir", "indianinstituteoftechnologydharwad", "indianinstituteoftechnologydharvad");
  $bcn = strtolower($bcn);
  $bcn = str_replace(" ","",$bcn);
  if (in_array($bcn, $btier1)){
  	$bcn = 1.0;
  }
  else{
  	$bcn = 0.6;
  }
  if (in_array($mcn, $mtier1)){
  	$mcn = 1.0;
  }
  else{
  	$mcn = 0.6;
  }
  $email = $_SESSION['email'];
  $query = "INSERT INTO `applicant_details`(`email`, `ssc_perc`, `hsc_diploma_perc`, `bachelor_degree`, `bachelor_cgpa`, `bachelor_college`, `masters_degree`, `masters_cgpa`, `masters_college`, `codechef_rating`, `codeforces_rating`) VALUES ('$email','$ssc', '$hsc','$bcd','$bcc','$bcn','$mcd','$mcc','$mcn','$codechef','$codeforces');";
  mysqli_query($conn, $query);
}
header('location: applicant-form.php#projects-form');
?>