<!DOCTYPE html>
<html>
<body>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <input type="submit" Value="Connect to MySQL Server & Insert data in a table">
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "movie_names";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
else{
echo "Connected successfully<br>";
}
$sql =  "CREATE TABLE favourite_movies(moviename varchar(200), leadactor varchar(200), leadactress varchar(200), yearofrelease int, director varchar(200))";
$result = mysqli_query($conn, $sql);
if($result){
  echo "The table is created successfully<br>";
}
else{
  echo "The table was not created because of this error" .mysqli_error
  ($conn);
}
$sql = "INSERT INTO favourite_movies VALUES ('Shershah', 'Siddhart Malhotra', 'Kiara Advani', 2021, 'Vishnuvardhan');";
$sql .= "INSERT INTO favourite_movies VALUES ('Tanhaji', 'Ajay Devgan', 'Kajol', 2020, 'Om Raut');";
$sql .= "INSERT INTO favourite_movies VALUES ('War', 'Hritik Roshan', 'Vani Kapoor', 2019, 'Siddharth Anand');";
$sql .= "INSERT INTO favourite_movies VALUES ('Bajirao Mastani', 'Ranveer Singh', 'Deepika Padukone', 2015, 'Sanjay Leela Bhansali');";
$sql .= "INSERT INTO favourite_movies VALUES ('Raazi', 'Vicky Kaushal', 'Alia Bhatt', 2018, 'Meghna Gulzar');";


if ($conn->multi_query($sql) === TRUE) {
    echo "New records created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

}
?>

</body>
</html>