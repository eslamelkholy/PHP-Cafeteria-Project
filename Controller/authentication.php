<?php
require_once '..' . DIRECTORY_SEPARATOR . 'config.php';
$user = new User();

//--------- Register User -------------
if (isset($_POST['adduser'])) {
    $user->setUsername($_POST['username']);
    $user->setUserEmail($_POST['email']);
    $user->setUserPassword($_POST['password']);
    $user->setUserPassword($_POST['cfrmPassword']);
    $user->setUserRoom($_POST['roomNum']);
    $user->setUserExt($_POST['ext']);
    // $user->setUserPic($_POST['pic']);


    if ($user->registerValidation() == 0)
        $user->addUser();
    else
        header("Location:../Views/addUser.php");
}
//-------- Login User -------------
else if (isset($_POST["login"])) {
    $user->setUsername($_POST['username']);
    $user->setUserEmail($_POST['email']);
    $user->setUserPassword($_POST['password']);
    $loginUser = $user->loginValidation($_POST);
    if ($loginUser) {
        session_start();
        $_SESSION['username'] = $loginUser['name'];
        $_SESSION['isLogged'] = true;
        if ($loginUser['admin'] == 1) {
            header("Location:../Views/adminhome.php");
        } else {
            header("Location:../Views/userhome.php");
        }
    } else
        header("Location:../Views/login.php");
}
//-------- Logout User -------------
else if (isset($_GET)) {
    session_destroy();
    header("Location:../Views/login.php");
}
