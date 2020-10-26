<?php
include('functions.php');

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] = session_id()) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Home</title>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="#">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="overhoren.php">Overhoren</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
        </li>
    </ul>
</nav>
   
<div class="row">
    <div class="col"></div>
    <div class="col-md-8" id="tableData">
        <table class="table">
            <tbody>
                <?php
                    $uId = $_SESSION['user_id'];
                    $sql = "SELECT * FROM list WHERE user_id = $uId";
                    $result = $conn->query($sql);
                    while ($row=mysqli_fetch_assoc($result)) {
                        echo '<thead><th>Naam lijst</th></thead>';
                        echo '<tr><td>'.$row['list_name'].'</td>';
                        echo '<td><button type="submit" class="deleteList" id="deleteList'.$row['list_id'].'">Lijst verwijderen</button></td></tr>';
                        
                        echo '<thead><th>Nederlands</th><th>Engels</th></thead>';  
                        $sql2 = "SELECT * FROM word WHERE list_id = ".$row['list_id'];
                        $result2 = $conn->query($sql2);
                        while ($row2=mysqli_fetch_assoc($result2)) {     
                            echo '<div id="'.$row2['word_id'].'"><tr class="row'.$row2['word_id'].'"><td><input type="text" id="mod'.$row2['word_id'].'" value="'.$row2['dutch'].'"></td>';         
                            echo '<td><input type="text" id="ctgr'.$row2['word_id'].'" value="'.$row2['english'].'"></td>';
                            echo '<td><input type="hidden" id="gegevens_id'.$row2['word_id'].'" value="'.$row2['word_id'].'"></td>';
                            echo '<td><button type="submit" class="updateBtn" id="update'.$row2['word_id'].'">Woord updaten</button></td>';
                            echo '<td><button type="submit" class="deleteBtn" id="delete'.$row2['word_id'].'">Woord verwijderen</button></td></tr></div>';
                        }
                        echo '<form action="" method="post">
                            <tr><td><h6 class="center">Nieuw woord toevoegen</h6></td></tr>
                            <tr>
                                <td><input type="text" name="dutch" id="dutch'.$row['list_id'].'"></td>
                                <td><input type="text" name="english" id="english'.$row['list_id'].'"></td>
                                <input type="hidden" name="list_id" value="'.$row['list_id'].'" id="list_id'.$row['list_id'].'">
                                <td></td>
                                <td><button type="submit" name="saveWord" id="addWord'.$row['list_id'].'" class="addWord">Woord opslaan</button></td>
                            </tr>
                        </form>';
                    }
                ?>
                <tr><td><h6 class="center">Nieuwe lijst toevoegen</h6></td></tr>
                <td><input name="listName" type="text" id="listName"></td>
                <td><button name="sendList" type="submit" id="addList">Lijst opslaan</button></td>
            </tbody>
        </table>
    </div>
    <div class="col"></div>
</div>
<?php
    } else {
        header("Location: index.php");
    }
?>
<script src="script/add.js"></script>
<script src="script/update.js"></script>
<script src="script/delete.js"></script>
</body>
</html>