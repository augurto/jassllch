<?Php
$host_name = "localhost";
$database = "u394588994_jass"; // Change your database nae
$username = "u394588994_jass";          // Your database user id 
$password = "Jass*#1720";          // Your password

//////// Do not Edit below /////////
//error_reporting(0);// With this no error reporting will be there
///// Do not Edit below //////
$connection=mysqli_connect($host_name,$username,$password,$database);
if (!$connection) {
    echo "Error: Unable to connect to MySQL.<br>";
    echo "<br>Debugging errno: " . mysqli_connect_errno();
    echo "<br>Debugging error: " . mysqli_connect_error();
    exit;
}
?>