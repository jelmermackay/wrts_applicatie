<?php
// $conn = new mysqli('localhost', 'student4a8_534388', 'Q96fqy', 'student4a8_534388');
$conn = new mysqli('localhost', 'root', '', 'student4a8_534388');
global $conn;
session_start();

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

// // aanmaken voor de lijsten
// if (isset($_POST["sendList"])) {
//     $nameList = $_POST["listName"];
//     $user_id = $_SESSION["user_id"];
    
//     $stmt = $conn->prepare("INSERT INTO list (user_id, list_name) VALUES (?, ?)");
//     $stmt->bind_param("is", $user_id, $nameList);
//     $stmt->execute();
//     $stmt->close();
// }

// // voor het aanmaken van de woorden
// if (isset($_POST["saveWord"])) {
//     $dutchWord = $_POST["dutch"];
//     $englishWord = $_POST["english"];
//     $list_id = $_POST["list_id"];

//     $stmt = $conn->prepare("INSERT INTO word (dutch, english, list_id) VALUES (?, ?, ?)");
//     $stmt->bind_param("ssi", $dutchWord, $englishWord, $list_id);
//     $stmt->execute();
//     $stmt->close();
// }

?>