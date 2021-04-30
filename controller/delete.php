<?php

include_once '../config/config.php';
include_once '../helpers/Database.php';
include_once '../models/User.php';

try {
    $conn = Database::connectDatabase($config);
    $user = new User($conn);

    if (!empty($_GET)) {
        $user->id = strip_tags($_GET['id']);
        if ($user->delete()) {
            header("Location: ../index.php");
            exit();
        } else {
            throw new Exception ('Something is wrong, please contact your webmaster');
        }
    }else{
        throw new \Exception('The user can\'t be empty.');
    }
} catch (Exception $e) {
    $responseArray = array('type' => 'danger', 'message' => $e->getMessage());
    var_dump($responseArray);
    die;
}