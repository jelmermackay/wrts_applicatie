<?php 
include('functions.php');
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] = session_id()) {
    $id = $_POST["word_id"];
    $dutch = $_POST["dutch"];
    $english = $_POST["english"];
    $sql = "UPDATE word set dutch='$dutch', english='$english' where word_id='$id'";
    if($conn->query($sql)===TRUE){
        echo "DATA updated";
    }
}
else {
    header("Location: index.php");
}
?>