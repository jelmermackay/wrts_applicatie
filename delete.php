<?php
include('functions.php');
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] = session_id()) {
    if (isset($_POST["word_id"])) {
        $word_id = $_POST["word_id"];
        $sql="DELETE FROM word where word_id='$word_id'";
        $conn->query($sql);
    }
    else if (isset($_POST["list_id"])) {
        $list_id = $_POST["list_id"];
        $sqlList = "DELETE FROM list where list_id = '$list_id'";
        $conn->query($sqlList);
    }
} else {
    header("Location: index.php");
}
?>