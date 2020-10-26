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
    <title>Overhoren</title>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="home.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Overhoren</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
        </li>
    </ul>
</nav>
   
<div class="row">
    <div class="col"></div>
    <div class="col-md-8">
        <h3>Klik op 1 van de lijsten en je begint met overhoren!</h3>
            <div class="form-group">
                    <?php
                        $result = $conn->query("SELECT * FROM list WHERE user_id = ".$_SESSION['user_id']);
                        while ($row=mysqli_fetch_assoc($result)) {
                            echo '<a href="vragen.php?listId='.$row['list_id'].'">'.$row['list_name'].'</a><br>';
                        }
                    ?>
            </div>
    </div>
    <div class="col"></div>
</div>
<?php
    } else {
        header("Location: index.php");
    }
?>
</body>
</html>