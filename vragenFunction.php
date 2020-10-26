<?php
    include('functions.php');
    $selected = $_POST['list_id'];
    $sql = "SELECT * FROM word WHERE list_id = $selected";
    $result = $conn->query($sql);
    $data = array();
    while ($row=mysqli_fetch_assoc($result)) {
        array_push($data, [$row['word_id'], $row['dutch'], $row['english']]);
        shuffle($data);
        
    }

    echo json_encode($data);    
?>