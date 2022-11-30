<?php require_once 'header.php'; ?>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <form action="check.php" method="POST" enctype="multipart/form-data">
                <div>
                    <input name="upload" class="d-block" type="file">
                
                    <input class="mt-2" name="imageup" type="submit" placeholder="Envoyer">
                </div>
            </form>
        </div>
    </div>
</div>


<?php require_once 'footer.php'; ?>