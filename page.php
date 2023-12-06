<!DOCTYPE HTML>  
<html>
<head>
</head>
<body>
<?php
// define variables and set to empty values
$name = $email = $password = $repassword = $institute = $degree = $session = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name =  test_input($_POST["uname"]);
  $email = test_input($_POST["email"]);
  $password = test_input($_POST["psw"]);
  $repassword = test_input($_POST["psw-repeat"]);
  $institute = test_input($_POST["ins"]);
  $degree = test_input($_POST["deg"]);
  $session = test_input($_POST["ses"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<?php
$filename = $_FILES['fileToUpload']['name'];
$location = $_FILES['fileToUpload']['tmp_name'];
$file_ext =pathinfo($filename,PATHINFO_EXTENSION);
$filename =pathinfo($filename,PATHINFO_FILENAME);
$filename =$name.".".$file_ext;
$location1 ='upload/';
move_uploaded_file($location, $location1.$filename);
?>

<?php
if ($password==$repassword) {
  // code...
  $file = $name . '.txt';
  $myfile = fopen($file , "w") or die("Unable to open file!");
  $txt = "\n";
  fwrite($myfile, $email);
  fwrite($myfile, $txt);
  fwrite($myfile, $password);
  fwrite($myfile, $txt);
  fwrite($myfile, $institute);
  fwrite($myfile, $txt);
  fwrite($myfile, $degree);
  fwrite($myfile, $txt);
  fwrite($myfile, $session);
  fclose($myfile);
  header('Location: http://index.html');
  exit();
} else {
  header('Location: http://account.html');
  exit();
}
?>
</body>
</html>
