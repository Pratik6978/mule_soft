<!DOCTYPE html>
<html>
<body>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <input type="submit" Value="Connect to MySQL Server & Create New DB">
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

$conn = new mysqli("localhost", "root", "");

$conn->query("CREATE DATABASE movie_names");

$conn->close();

}
?>
</body>
</html>