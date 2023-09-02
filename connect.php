
<?php
// Database configuration
$host = "localhost";
$user = "root";
$password = ''; // Leave blank if there's no password set for MySQL
$db_name = "alphawebsite";

// Create a connection
$con = mysqli_connect($host, $user, $password, $db_name);
if (mysqli_connect_errno()) {
    die("Failed to connect with MySQL: " . mysqli_connect_error());
}

// Form data submission and insertion into the database
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $message = mysqli_real_escape_string($con, $_POST['message']);

    $sql = "INSERT INTO datatable (name, email, message) VALUES ('$name', '$email', '$message')";

    if (mysqli_query($con, $sql)) {
        // Data inserted successfully
        echo '<script></script>';
    } else {
        echo "<h3>Error: " . $sql . "<br>" . mysqli_error($con) . "</h3>";
    }
}

// Close the connection
mysqli_close($con);
?>
