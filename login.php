<?php
require('actions/users/loginAction.php')
?>
<!DOCTYPE html>
<html lang="en">

    <?php
    include 'includes/head.php'; 
    ?>


<body>

    <?php
       include 'includes/navbar.php'; 
    ?>
    <br>
    <form class="container" method="POST">

        <?php if (isset($ErrorMsg)) {
            echo '<p>' . $ErrorMsg . '</p>';
        } ?>

        <div class="form-row">
            <label for="inputEmail4">Pseudo</label>
            <input type="text" class="form-control" id="inputPseudo" name="pseudo" placeholder="Pseudo">
        </div>
        <div class="form-group">
            <label for="inputPassword4">Password</label>
            <input type="password" class="form-control" id="inputPassword4" name="password" placeholder="Password">
        </div>
        <br>
        <button type="submit" class="btn btn-primary" name="validate">Connexion </button>
        <br><br>
        <a href="signup.php" class="btn btn-primary">Creer un compte </a> 
    </form>

</body>
</html>