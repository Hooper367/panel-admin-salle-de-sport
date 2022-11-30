<?php require_once 'db.php' ;

session_start();

$id = $_GET['id'];

?>

               <form id='modif' action="check.php" method="post" enctype="multipart/form-data" class="text-center">
                            <div>
                                <input name="sujet" class="mb-3 pe-3" placeholder="Sujet de l'article" type="text">
                            </div>
                            <div>
                                <textarea placeholder="Message" class=" textarea w-75 mx-auto" name="message" id="" cols="30" rows="10"></textarea>
                            </div>
                            <div>
                                <input name="upload" class="d-block" type="file">
                            </div>
                         <input name="modif" type="submit">
               </form>
                
            </div>