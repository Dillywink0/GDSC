<?php
$servername = "your_database_server";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql_query = $_POST["sql_query"];

    // Run the SQL query
    $result = $conn->query($sql_query);

    if ($result === TRUE) {
        echo "Query executed successfully";
    } else {
        echo "Error executing query: " . $conn->error;
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
</body>
</html>