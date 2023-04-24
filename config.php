<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sia";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
// else{
//     echo("successful");
// }
?>
<?php
$host = 'localhost';
$dbname = 'sia';
$user = 'root';
$pass = '';

// Create a PDO instance as db connection
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
