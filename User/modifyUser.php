<!-- https://www.youtube.com/watch?v=x4Gd0sYBQzo&t=531s -->

<?php
    $user_id = $_GET['id'];
    if(isset($_POST['send'])){
        if(isset($_POST['username']) &&
        isset($_POST['email']) &&
        isset($_POST['username']) != "" &&
        isset($_POST['email']) != ""
        ){
            include_once "../connect_ddb.php";
            extract($_POST);

            $sql = "UPDATE users SET user_name = '$username', email ='$email'";
            if(mysqli_query($conn, $sql)) {
                header("location:showUser.php");
            } else {
                header("location:showUser.php?message=ModifyFail");
            }
        } else {
            header("location:showUser.php?message=EmptyFields");
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

    <?php
            include_once "../connect_ddb.php";



        //liste des utilisateurs
        $sql = "SELECT * FROM users WHERE user_id = $user_id ";
        $result = mysqli_query($conn, $sql);
            //output data of each row
            while($row = mysqli_fetch_assoc($result)) {
    ?>
    <form action="" method="post">
        <h1>Modifier un utilisateur</h1>
        <input type="text" name="username" value="<?=$row['user_name']?>">
        <input type="email" name="email" value="<?=$row['email']?>">
        <input type="submit" value="Modifier" name="send">
        <a class="link back" href="showUser.php">Annuler</a>
    </form>

    <?php
    }
    ?>

</body>
</html>