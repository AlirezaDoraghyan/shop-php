<?php
session_start();
if (isset($_POST['data']) && $_POST['data'] != '' && preg_match('/^[0-9]$/', $_POST['data'])) {
    include_once '../../database/database.php';
    $num = (int)$_POST['data'];
    $con = database::connection('shop', '', 'localhost', 'root');

    $sql = $con->prepare("
SELECT annousces_visit.user_id,annousces_visit.annousces_id
FROM annousces_visit 
WHERE 	annousces_id=:annousces_id 
AND user_id=:user_id"
    );
    $user = $_SESSION['id'];
    $sql->bindParam(':annousces_id', $num);
    $sql->bindParam(':user_id', $user);
    $sql->execute();


    if ($sql->rowCount() == 0) {

        $sql = $con->prepare("  INSERT INTO annousces_visit (	user_id , annousces_id) VALUES (:user_id , :annousces_id)");
        $user = $_SESSION['id'];
        $sql->bindParam(':annousces_id', $num);
        $sql->bindParam(':user_id', $user);
        $sql->execute();

    };
}