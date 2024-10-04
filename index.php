
<?php

$host = "localhost";
$user = "root";
$password = ""; // Replace with your actual password (avoid storing it in plain text)
$db = "iap assgn ii"; // Ensure database name is correct

// Connect to database
$data = mysqli_connect($host, $user, $password, $db);

if ($data === false) {
    die("Connection error: " . mysqli_connect_error()); 
}


session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = mysqli_real_escape_string($data, $_POST["username"]); // Escape user input
    $password = mysqli_real_escape_string($data, $_POST["password"]); // Escape user input

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'"; // Use single quotes for string literals

    $result = mysqli_query($data, $sql);

    if ($result) {
        $row = mysqli_fetch_array($result);

        // Close the result set (optional, but good practice)
        mysqli_free_result($result);
    } else {
        echo "Database error: " . mysqli_error($data); // Provide more specific error message (consider logging for debugging)
    }
}if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($data, $_POST["username"]);
    $password = mysqli_real_escape_string($data, $_POST["password"]);

    $sql = "INSERT INTO users (Username, Password) VALUES ('$username', '$password')";

    if (mysqli_query($data, $sql)) {
        echo "New user registered successfully";
    } else {
        echo "Error: " . mysqli_error($data);
    }
}


// Close the connection (optional, but good practice to close when finished)
mysqli_close($data);
// index.php


?>

</body>
</html>

