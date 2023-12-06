<!DOCTYPE html>
<html>
<head>
 <?php
 echo "<link rel='stylesheet' type='text/css' href='style.css'>";
// define variables and set to empty values
$name = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name =  test_input($_POST["uname"]);
  $password = test_input($_POST["psw"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
</head>
<body>
<?php
$file = $name.'.txt';
$myfile = fopen($file , "r") or header('Location:  https://insunul.github.io/Registration_and_Login/index.html');
$email = fgets($myfile)."<br>";
$pas = fgets($myfile);
fclose($myfile);
$myfile = fopen($file , "r") or die("Unable to open file!");
$email = fgets($myfile)."<br>";
$pass = fgets($myfile)."<br>";
$institute = fgets($myfile)."<br>";
$degree = fgets($myfile)."<br>";
$session = fgets($myfile)."<br>";
fclose($myfile);
if ($pas == $password) {
echo "<div class='container'>";
echo "<img class='profile-pic' src='"."upload/".$name.".jpg"."' alt='Profile Picture'>";
echo "<h1>".$name."</h1>";
echo "<center>".$email."</center>";
echo "<h2>Web Developer</h2>";
echo "<div class='skills'>";
echo "<h3>Skills</h3>";
echo "<ul>";
echo "<li>HTML</li>";
echo "<li>CSS</li>";
echo "<li>JavaScript</li>";
echo "<li>php</li>";
echo "<li>python</li>";
echo "<li>c++</li>";
echo "<li>MongoDB</li>";
echo "</ul>";
echo "</div>";
echo "<div class='education'>";
echo "<h3>Education</h3>";
echo "<div class='degree'>".$degree."</div>";
echo "<div class='school'>".$institute."</div>";
echo "<div class='date'>Session ".$session."</div>";
echo "</div>";
echo "</div>";
} else {
  header('Location:  https://insunul.github.io/Registration_and_Login/index.html');
  exit();
}
?>
</body>
</html>
