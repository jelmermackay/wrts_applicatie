<?php 
include('functions.php');
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] = session_id()) {
    $list_name = $_POST["list_name"];
    $user_id = $_SESSION["user_id"];
    $sql = "INSERT INTO `list` (`list_name`, `user_id`) VALUES ('$list_name', '$user_id')";
    if($conn->query($sql)===TRUE){
        echo "DATA updated";
    }
}
else {
    header("Location: index.php");
}
?>