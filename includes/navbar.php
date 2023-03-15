<?php include 'includes/head.php';  ?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">Forum</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" 
   data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
   aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Les Questions</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="addQuestion.php">Publier une question</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="mesquestions.php">Mes Questions</a>
      </li>

      <?php
        if (isset($_SESSION['auth'])){
         ?>
         <li class="nav-item">
          <a class="nav-link" href="actions/users/logoutAction.php">Deconnexion</a>
         </li>
         <?php  
         }else {
          ?>
          <li class="nav-item">
           <a class="nav-link" href="login.php">Connexion</a>
          </li>
          <?php  
         }
      ?> 
     
    </ul>
    
  </div>
</nav>