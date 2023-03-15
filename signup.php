<?php
require('actions/users/signupAction.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include 'includes/head.php'; 
    ?>
</head>

<body>

    <?php include 'includes/navbar.php'; ?>

    <br>
    <form class="container" enctype="multipart/form-data" method="POST">

        <?php if (isset($ErrorMsg)) {
            echo '<p>' . $ErrorMsg . '</p>';
        } ?>

        <?php if (isset($ErrorMsg2)) {
            echo '<p>' . $ErrorMsg2 . '</p>';
        } ?>
        <div class="form-row">
            <label for="inputEmail4">Pseudo</label>
            <input type="text" class="form-control" id="inputPseudo" name="pseudo" placeholder="Pseudo">
        </div>
        <div class="form-row">
            <label for="inputEmail4">Nom</label>
            <input type="text" class="form-control" id="inputEmail4" name="nom" placeholder="Ba">
        </div>
        <div class="form-group">
            <label for="inputAddress">Prenom</label>
            <input type="text" class="form-control" id="inputAddress" name="prenom" placeholder="sby">
        </div>
        <div class="form-group">
            <label for="inputPassword4">Password</label>
            <input type="password" class="form-control" id="inputPassword4" name="password" placeholder="Password">
        </div>

        <div class="form-group">
            <input type="file" name="my_image">
        </div>

        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck">
                <label class="form-check-label" for="gridCheck">
                    Check me out
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary" name="validate">Sign in</button>
        <br><br>
        <a href="login.php" class="btn btn-primary">Deja inscrit, Se connecter</a> 
    </form>

</body>

</html>