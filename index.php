<?php
if(isset($_POST['login'])){
include('functions.php');
    // kijkt of de username en password correct zijn
    $user = $conn->real_escape_string($_POST['user']);
    $stmt = $conn->prepare("SELECT `username`, `password`, `user_id` FROM crud WHERE username = ?");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->bind_result($username, $password, $user_id);

    if ($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $hashed_password = $row['password'];
            $id = $row['user_id'];
        }
        if (password_verify($_POST['pass'], $hashed_password)){
            $_SESSION['loggedin'] = session_id();
            $_SESSION['user_id'] = $id;
            header('Location: home.php');
        } else {
            echo "Uw gegevens zijn onjuist";
        }
    } else {
        echo "Uw gegevens zijn onjuist";
    }

    $stmt->close();
    $conn->close();
}
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
    <title>Inloggen</title>
</head>
<body>
<div class="row">
    <div class="col"></div>
    <div class="col-md-8">
        <h1>Inloggen</h1>
        <form action="" method="post">
            <div class="form-group">
                <p>Uw username</p>
                <input class="form-control" type="text" name="user" required>
            </div>
            <div class="form-group">
                <p>Uw wachtwoord</p>
                <input class="form-control" type="password" name="pass" required>
            </div>
            <div class="form-gropu">
                <input class="form-control" type="submit" name="login">
            </div>
        </form>
        <a href="aanmelden.php">Klik hier om aan te melden!</a>
    </div>
<div class="col"></div>
</div>
</body>
</html>