<?php
    require_once '..' . DIRECTORY_SEPARATOR . 'config.php';
    $user = new User();
    //var_dump($_POST);
    //Edit user data
    if(isset($_POST['update'])){
        $user->setUserId($_POST['id']); 
        $user->setUserName($_POST['name']);
        $user->setUserEmail($_POST['email']);
        $user->setUserPassword($_POST['password']);
        $user->setUserRoom($_POST['room']);
        $user->setUserExt($_POST['ext']);

        //Image Editing
        $dir_to_upload = "public/Images/";
        $dir_tmp = $_FILES['image']['tmp_name'];
        if(!empty($_FILES['image']['name'])){
            $imageName = basename($_FILES['image']['name']);
            $imagePath =  $dir_to_upload.$imageName;
            $imageType = pathinfo($imagePath,PATHINFO_EXTENSION);
            $typeAllaw = array("jpg","jpeg","png","JPG","IPEG","PNG");
            if(in_array($imageType,$typeAllaw)){
            move_uploaded_file($dir_tmp,$imagePath);

        $user->setUserPic($_POST['profileImg']);

        if($user->updateUser()){
             header("Location: ../views/allusers.php");
        }

    }
    //Delete user
    else if(isset($_GET['DeleteId'])){
       $result = $user->deleteUser($_GET['DeleteId']);
       if($result){
           header("Location: ../Views/allusers.php");
       }
       else{
           echo "error";
       }
    }

?>