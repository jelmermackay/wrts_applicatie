<?php
if(isset($_POST['submit'])){
    $conn = new mysqli('localhost', 'root', '', 'wrts');
    
    // pakt de gegevens uit de form
    $username = htmlspecialchars($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("SELECT * FROM crud WHERE username = ?");
    $stmt->bind_param("s", $username);
    
    if($stmt->execute()) {
        $result = $stmt->get_result() or die($conn->error);
        if ($result == $username) {
            echo "Uw gebruikersnaam is al in gebruik. Probeer een andere gebruikersnaam.";
        } else {
            $stmt = $conn->prepare("INSERT INTO crud (username, password) VALUES (?, ?)");
            $stmt->bind_param("ss", $username, $password);
            $stmt->execute();
            header("Location: index.php");
        }
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
    <title>Aanmelden</title>
</head>
<body>
<div class="row">
    <div class="col"></div>
    <div class="col-md-8">
        <h1>Aanmelden</h1>
        <form action="" method="post">
            <div class="form-group">
                <p>Uw username</p>
                <input class="form-control" type="text" name="username" required>
            </div>
            <div class="form-group">
                <p>Uw wachtwoord</p>
                <input class="form-control" type="password" name="password" required>
            </div>
            <div class="form-group">
                <button class="form-control" type="submit" name="submit">Aanmelden</button>
            </div>
        </form>
    </div>
<div class="col"></div>
</div>
</body>
</html>