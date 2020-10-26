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
<div class="row">
    <div class="col"></div>
    <div class="col-md-8">
        <form action="" method="">
            <div class="form-group">
                <label id="dutchWord" class="center"></label>
                <input class="form-control" type="text" id="translatedWord">
                <button class="form-control" type="submit" id="sendWord" onclick="checkWord(event)">controleren</button>
            </div>
        </form>
    </div>
    <div class="col"></div>
<?php
    } else {
        header("Location: index.php");
    }
?>
<script src="script/overhoren.js"></script>
</div>
</body>
</html>