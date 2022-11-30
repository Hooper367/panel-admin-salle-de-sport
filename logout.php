<?php
$action = filter_input(INPUT_POST,'action');
if($action == 'disconnect'){
    
    session_start();
    session_destroy();
    
    $reponse = 'deconnexion effectué';
    

    echo json_encode(['reponse' => $reponse]);
}
// header('location: index.php');
?>