<?php
require('actions/question/articleAction.php');
require('actions/question/AddreponseAction.php');
require('actions/question/AfficherReponseAction.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'includes/head.php'; ?>
</head>
<body>
    
    <?php include 'includes/navbar.php'; ?>
    </br></br>

    <div class="container">
        <?php 
        
            if (isset($errrMsg)) { echo $errrMsg; };

            //si il existe des questions 
            if (isset($questions_date)) {
                ?>
                <section class="show-article">
                    <h3><?php echo $questions_title ?> </h3>
                    <hr>
                    <p><?php echo $questions_content ?></p>
                    <hr>
                    <small><?php echo $questions_date . ' ' . $questions_pseudo?></small>      
                </section>
                <br>

                <section class="show-reponse">

                    <form method="post" class="form-group">

                        <div class="mb-3">
                            <label for="example" class="form-label">Reponse :</label>
                            <textarea name="contenu" class="form-control"></textarea>
                        </div>                      
                        <button type="submit" class="btn btn-primary" name="validate">Repondre</button>
                    </form> 
                    <br>
                </section>

                <?php 
                    while ($reponseInfos = $getAllreponses->fetch()) {
                        ?>
                        <div class="card">
                            <div class="card-header"><?= $reponseInfos['pseudo_user']; ?></div>
                            <div class="card-body"><?= $reponseInfos['contenu']; ?></div>
                        </div>
                        <br><br>
                        <?php
                    }
                ?>

               

                <?php 
            }

        ?>
    </div>
    
    

</body>
</html>