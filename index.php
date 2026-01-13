<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "trip";
$port = 3307;

$con = mysqli_connect($server, $username, $password, $dbname, $port);
if (!$con) {
    die("connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {

    $name    = $_POST['name'];
    $age     = $_POST['age'];
    $gender  = $_POST['Gender'];
    $email   = $_POST['email'];
    $phone   = $_POST['phone'];
    $message = $_POST['message'];

    $sql = "INSERT INTO `trip` (`Name`, `age`, `gender`, `email`, `phone`, `other_info`, `Date`)
            VALUES
            ('$name', '$age', '$gender', '$email', '$phone', '$message', current_timestamp())";

    if ($con->query($sql) === TRUE) {
        echo "<script>alert('Data inserted successfully');</script>";
    } else {
        echo "Error: " . $con->error;
    }
}

$con->close();
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel form </title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container">
  <form action="index.php" method="POST">
    <h2>Contact Us</h2>
    
    <div class="input-group">
      <label for="name">Full Name</label>
      <input type="text" id="name" name="name"  required>
    </div>

    <div class="input-group">
      <label for="age">Age</label>
      <input type="number" id="age" name="age"  min="1" max="120">
    </div>

    <div class="input-group">
      <label for="Gender">Gender</label>
      <input type="text" id="Gender" name="Gender" >
    </div>

    <div class="input-group">
      <label for="email">Email Address</label>
      <input type="email" id="email" name="email"  required>
    </div>

    <div class="input-group">
      <label for="phone">Phone Number</label>
      <input type="tel" id="phone" name="phone" >
    </div>

    <div class="input-group">
      <label for="message">Message</label>
      <textarea id="message" name="message" rows="5" placeholder="How can we help you?"></textarea>
    </div>

    <button type="submit" name="submit" class="submit-btn">Send Message</button>
  </form>

  <!-- INSERT INTO `trip` (`Sr.No`, `Name`, `age`, `gender`, `email`, `phone`, `other_info`, `Date`) VALUES ('1', 'sagar jadhav', '21', 'male ', 'sagar@gmail.com', '9356248642', 'hello  ', current_timestamp()); -->

</div>
</body>
</html>