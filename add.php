<?php 
include('functions.php');
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] = session_id()) {
    $dutch = $_POST["dutch"];
    $english = $_POST["english"];
    $list_id = $_POST["list_id"];
    $sql3 = "INSERT INTO word (`dutch`, `english`, `list_id`) VALUES ('$dutch', '$english', '$list_id')";
    if($conn->query($sql3)===TRUE){
        echo "DATA updated";
    }
}
else {
    header("Location: index.php");
}
?>