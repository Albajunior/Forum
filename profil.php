<?php
require('actions/users/profilActions.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include 'includes/head.php'; 
    ?>

    <style>
		
		.alb {
			width: 200px;
			height: 200px;
			padding: 5px;
		}
		.alb img {
			width: 100%;
			height: 100%;
		}
	</style>
</head>

<body>
    <?php include 'includes/navbar.php';  ?> 

    </br></br>
    <div class="container">
        
        <?php 
            if (isset($errrMsg)) { echo $errrMsg; };

            if (isset($checkIfQuestionUser)) {
                
                ?>
                <div class="card">

                    <div class="alb">
                      <img src="actions/users/img/<?=$user_images?>">
                    </div>
                    <div class="card-body">
                        <h4>Pseudo : <?= $user_pseudo; ?></h4>
                        <hr>
                        <p>Nom Complet : <?= $user_nom. ' ' . $user_prenom ?></p> 
                    </div> 

                </div>
                <br>    

                <?php
                while($questionsuser = $checkIfQuestionUser->fetch()){
                    ?>
                    <div class="card">
                        <h3>Mes publications </h3>
                        <div class="card-header">
                            <?= $questionsuser['title']; ?>
                        </div>
                        <div class="card-body"> 
                            <?= $questionsuser['description']; ?>
                        </div>
                        <div class="card-footer>
                            <?= $questionsuser['contenu'];?>
                        </div>
                    </div>
                    <br>
                    <?php
                }  
            }

        ?>

    </div>
    
</body>

</html>