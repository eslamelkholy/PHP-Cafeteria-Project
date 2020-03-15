<?php
require_once '..' . DIRECTORY_SEPARATOR . 'config.php';
$user = new User();
//var_dump($_POST);
//Edit user data
if (isset($_POST['update'])) {
    $user->setUserId($_POST['id']);
    $user->setUserName($_POST['name']);
    $user->setUserEmail($_POST['email']);
    $user->setUserPassword($_POST['password']);
    $user->setUserRoom($_POST['room']);
    $user->setUserExt($_POST['ext']);
    // $user->setUserPic($_POST['profileImg']);

    if ($user->updateUser()) {
        header("Location: ../views/allusers.php");
    }
}
//Delete user
else if (isset($_GET['DeleteId'])) {
    $result = $user->deleteUser($_GET['DeleteId']);
    if ($result) {
        header("Location: ../Views/allusers.php");
    } else {
        echo "error";
    }
}

?>