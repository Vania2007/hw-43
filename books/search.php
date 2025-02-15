<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "books";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Помилка підключення до бази даних: " . $conn->connect_error);
}

$request = $_GET['request'];
if (!empty($request)) {
$sql = "SELECT * FROM books WHERE LOWER(name) LIKE LOWER('%$request%')";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<details>
        <summary>".$row['name']."</summary>
        <p>".$row['info']."</p>
      </details>";
    }
} else {
    echo "Нічого не знайдено";
}
}
$conn->close();