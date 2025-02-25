<?php
$servername = "localhost"; // Change if using a different host
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "csp"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $age = htmlspecialchars($_POST["age"]);
    $phno = htmlspecialchars($_POST["phno"]);
    $food = htmlspecialchars($_POST["food"]);
    $factors = htmlspecialchars($_POST["factors"]);
    $improvements = htmlspecialchars($_POST["improvements"]);

    // Prepare and bind SQL statement
    $stmt = $conn->prepare("INSERT INTO csp (name, age, phno, food, factors, improvements) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sissss", $name, $age, $phno, $food, $factors, $improvements);

    // Execute and check success
    if ($stmt->execute()) {
        echo "Thank you for submitting the survey!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
