<!-- https://www.youtube.com/watch?v=x4Gd0sYBQzo&t=531s -->

<?php
    if(isset($_POST['send'])){
        if(isset($_POST['username']) &&
        isset($_POST['email']) &&
        isset($_POST['username']) != "" &&
        isset($_POST['email']) != ""
        ){
            include_once "../connect_ddb.php";
            extract($_POST);

            $sql = "INSERT INTO users (user_name, email) VALUES ('$username', '$email') ";
            if(mysqli_query($conn, $sql)) {
                header("location:showUser.php");
            } else {
                header("location:addUser.php?message=AddFail");
            }
        } else {
            header("location:addUser.php?message=EmptyFields");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <form action="" method="post">
        <h1>Ajouter un utilisateur</h1>
        <input type="text" name="username" id="Username" placeholder="Votre nom utilisateur">
        <input type="email" name="email" id="Email" placeholder="Email">
        <input type="submit" value="Ajouter" name="send">
        <a class="link back" href="showUser.php">Annuler</a>
    </form>
</body>
</html>