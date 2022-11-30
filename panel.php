<?php require_once 'functions.php'; ?>
<?php require_once 'db.php' ?>
<?php require_once 'header.php'; ?>

<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-2 border-end ">
                <ul>
                    <?php if ($_SESSION['isAdmin'] == 2) {
                        
                    }
                        
                      ?>

                    <?php  if($_SESSION['isAdmin'] == 2) :  ?>
                        <li><?=$_SESSION['user']?> (Admin)</li>
                        <li><a  class="fs-4 " href="message.php">Mes Articles</a></li>
                        <li><a class="fs-4" href="write.php">Rédiger un article</a></li>
                        <li><a class="fs-4" href="user.php">Tout les utilisateurs</a></li>
                        <ul>
                            <h4>Espace Modération :</h4>
                            <li><a href="allarticles.php">Tout les articles</a></li>
                            
                        </ul>
                        

                        <?php elseif ($_SESSION['isAdmin'] == 1) : ?>
                            <li><?=$_SESSION['user']?> (Modo)</li>
                        <li><a  class="fs-4 " href="allarticles.php">Articles</a></li>
                        
                        
                        
                        <?php elseif ($_SESSION['isAdmin'] == 0) : ?>
                            <li><?=$_SESSION['user']?> (User)</li>
                        <li><a  class="fs-4 " href="message.php">Mes Articles</a></li>
                        <li><a class="fs-4" href="write.php">Rédiger un article</a></li>
                       
                            <?php endif ?>
                </ul>
            </div>
            <div class="col-10">
                <div>
                    <p class="fs-4 fw-bold text-center">Ravie de te revoir <?= ucFirst($_SESSION['user']) ?></p>
                </div>
                <div class="input text-center">
                  
                    <input class="w-50 p-2" placeholder="Rechercher" type="search">
                    <input class="btn btn-primary " type="submit" name="btn-search">
                </div>
                
            </div>
        </div>
    </div>
</section>



<?php require_once 'footer.php'; ?>

