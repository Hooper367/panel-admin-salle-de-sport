<?php
 require_once 'db.php';


// on check si l'utilisateur existe ou pas et redirection si admin sur la page admin et uti sur l'index

if($_SERVER['HTTP_REFERER'] == 'http://localhost/login.php'){
    if( !empty($_POST['username']) && !empty($_POST['password'])){
        $username = $_POST['username'];
        $psw = $_POST['password'];
        
        $sql = "SELECT * FROM users WHERE username = '$username' AND `password`= '$psw'";
        $query = mysqli_query($connect, $sql);
        $result = mysqli_fetch_assoc($query);
        
        if ($result != null) {
            session_start();
            $_SESSION['user'] = $result['username'];
            $_SESSION['isAdmin'] = $result['isAdmin'];
            $_SESSION['id_users'] = $result['id_user'];
           
            if($result['isAdmin'] == 0){
                // header("location: index.php");
                $reponse = 'ok user';
            }else{
                // header('location: panel.php');
                $reponse = 'ok admin';
            }     
        }else{
            // header('location: login.php?con=1');
            $reponse = 'Utilisateur ou mot de passe incorrect !';
         } 
    }else{
        // header('location: login.php?error=0');
        $reponse = 'Des valeurs sont vides';
    }
        echo json_encode(['reponse' => $reponse]);
}


   
$title = filter_input(INPUT_POST,'title');
$content = filter_input(INPUT_POST,'content');
$image = filter_input(INPUT_POST,'image');
$slug = filter_input(INPUT_POST,'slug');
$idusers = filter_input(INPUT_POST,'id_users');
    
    // CREATE
    if($_SERVER['HTTP_REFERER'] == 'http://localhost/write.php'){
        if(isset($_POST['sujet'])&& isset($_POST['message']) &&!empty($_POST['sujet'])&& !empty($_POST['message']) && isset($_FILES['upload'])){
            session_start();
            $iduser = intVal($_SESSION['id_users']);
            $title = $_POST['sujet'];
            $msg = $_POST['message'];
            $slug = implode('-',explode(' ',$title));
            
            $tmpname = $_FILES['upload']['tmp_name'];
            $name = $_FILES['upload']['name'];
            $size = $_FILES['upload']['size'];
            $error = $_FILES['upload']['error'];
            
            move_uploaded_file($tmpname, './image_bdd/'.$name);

            $sql = "INSERT INTO articles (title, content, image, slug, id_users) VALUES ('$title', '$msg','$name','$slug', $iduser)";
            if(mysqli_query($connect, $sql) && $action === 'create'){
                //  header('location: message.php');
                $reponse = "article crée";
            }else{
                $reponse =  "Veuillez réessayer l'article na pas pu etre créer" ;
            }
        }
        echo json_encode(['reponse' => $reponse]);
    }
    

    //HIDE supp et apparaitre user_hide, user_private, user_supp
    if($_SERVER['HTTP_REFERER'] == 'http://localhost/message.php' || $_SERVER['HTTP_REFERER'] == 'http://localhost/allarticles.php' || strpos($_SERVER['HTTP_REFERER'], 'user.php') && isset($_GET['action'])&&isset($_GET['id'])){

        require_once 'db.php';
                $action = $_GET['action'];
                $id = $_GET['id'];
               
                if($action == 'hide'){
                    $sql = ["UPDATE articles SET `state`=3 WHERE id= $id"];
                }
                elseif($action == 'supp'){
                    $sql = ["DELETE FROM articles WHERE id = $id"];
                }elseif($action == 'show'){
                    $sql = ["UPDATE articles SET `state`=1 WHERE id= $id"];
                }
                elseif($action == 'private'){
                    $sql = ["UPDATE articles SET `state`=2 WHERE id= $id"];
                }
                elseif($action == 'user_hide'){
                    $sql = ["UPDATE users SET user_state = 2 WHERE id_user = $id",
                     "UPDATE articles SET `state` = 3 WHERE id_users = $id"]   ;
                }
                elseif($action == 'user_show'){
                    $sql = ["UPDATE users SET user_state = 1 WHERE id_user = $id",
                     "UPDATE articles SET `state` = 1 WHERE id_users = $id"]   ;
                }
                elseif($action == 'user_supp'){
                    $sql = ["UPDATE users SET user_state = 3 WHERE id_user = $id",
                    "UPDATE articles SET `state` = 2 WHERE id_users = $id"]   ;
                }
               
                
                foreach ($sql as $query) {
                    $req = mysqli_query($connect, $query);
                    if($req){
                        header('location: panel.php');
                    }
                    else{
                        $reponse = 'ERROR try again';
                    }
                }
    }
    
    
    

           // MODIF
    if(strpos($_SERVER['HTTP_REFERER'] , 'modif.php')){
        if(isset($_POST['sujet'])&& isset($_POST['message']) &&!empty($_POST['sujet'])&& !empty($_POST['message']) && isset($_FILES['upload'])){
            
            
            // $id = intVal($_GET['id']);
            $title = $_POST['sujet'];
            $msg = $_POST['message'];
            
            $tmpname = $_FILES['upload']['tmp_name'];
            $name = $_FILES['upload']['name'];
            $size = $_FILES['upload']['size'];
            $error = $_FILES['upload']['error'];
            
            move_uploaded_file($tmpname, './image_bdd/'.$name);

            $sql = "UPDATE articles SET title='$title',content='$msg',image='$name' WHERE id= $id";
            if(mysqli_query($connect, $sql)){
                //  header('location: message.php');
                $reponse = "modification bien effectuée";
                
            }else{
                $reponse = "Veuillez réessayer l'article na pas pu etre modifier" ;
            }
        }else{
            $reponse = 'BAD WAY';
        }
        echo json_encode(['reponse' => $reponse]);
    }
    
 
    



