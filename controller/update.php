<?php


include_once '../config/config.php';
include_once '../helpers/Database.php';
include_once '../models/User.php';

try {
    $conn = Database::connectDatabase($config);
    $user = new User($this->db);

    if (!empty($_POST)) {
        $user->id = strip_tags($_POST['id_user']);
        $user->full_name = strip_tags($_POST['name']);
        $user->email = strip_tags($_POST['email']);
        $user->phone = strip_tags($_POST['form_tel']);

        if ($user->update()) {
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