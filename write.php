<?php require_once 'functions.php'; ?>
<?php require_once 'db.php' ?>
<?php require_once 'header.php'; ?>

<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-2 border-end ">
                <ul>

                    <?php  if($_SESSION['isAdmin'] == 2) :  ?>
                        <li><?=$_SESSION['user']?> (Admin)</li>
                        <li><a  class="fs-4 " href="message.php">Mes articles</a></li>
                        <li><a class="fs-4" href="write.php">Rédiger un article</a></li>
                        <li><a class="fs-4" href="user.php">Tout les utilisateurs</a></li>
                        <ul>
                            <h4>Espace Modération :</h4>
                            <li><a href="allarticles.php">Tout les articles</a></li>
                        </ul>
                        
                        

                        <?php elseif ($_SESSION['isAdmin'] == 1) : ?>
                            <li><?=$_SESSION['user']?> (Modo)</li>
                        <li><a  class="fs-4 " href="message.php">Articles</a></li>
                        
                        
                        
                        <?php elseif ($_SESSION['isAdmin'] == 0) : ?>
                            <li><?=$_SESSION['user']?> (User)</li>
                        <li><a  class="fs-4 " href="message.php">Articles</a></li>
                        <li><a class="fs-4" href="write.php">Rédiger un article</a></li>

                            <?php endif ?>
                </ul>
            </div>
            <div class="col-10">
                <div class="input text-center">
                    <label class="bg-primary p-3" for="">Rechercher</label>
                    <input class="w-50 p-2" placeholder="Rechercher" type="search">
                </div>
               <form id="create" action="check.php" method="post" enctype="multipart/form-data" class="text-center">
                            <div>
                                <input name="sujet" class="mb-3 pe-3" placeholder="Sujet de l'article" type="text">
                            </div>
                            <div>
                                <textarea placeholder="Message" class=" textarea w-75 mx-auto" name="message" id="" cols="30" rows="10"></textarea>
                            </div>
                            <div class="container-fluid">
    
           
                <div>
                    <input name="upload" class="d-block" type="file">
                
                    
                </div> 
                 <input name="create" class="btn btn-primary" type="submit">
            </form> 
</div>
                          
               
                
            </div>
        </div>
    </div>
</section>



<?php require_once 'footer.php'; ?>
