<?php
$servername = "0.0.0.0";
$username = "gdsc";
$password = "gdsc";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$resultMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql_query = $_POST["sql_query"];

    // Run the SQL query
    $result = $conn->query($sql_query);

    $result = $conn->query($sql);

    // Check if the query was successful
    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "ID: " . $row["id"] . " - Username: " . $row["username"] . " - Email: " . $row["email"] . "<br>";
        }
    } else {
        echo "0 results";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL Query Executor</title>
</head>
<body>
    <h2>SQL Query Executor</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="sql_query">Enter your SQL query:</label>
        <br>
        <textarea name="sql_query" rows="4" cols="50"></textarea>
        <br>
        <input type="submit" value="Execute Query">
    </form>

    <?php
    if (!empty($resultMessage)) {
        echo "<p>$resultMessage</p>";
    }
    ?>
</body>
</html>