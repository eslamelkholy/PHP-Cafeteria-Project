<?php

class User
{
    private $id;
    private $name;
    private $email;
    private $password;
    private $room_no;
    private $ext;
    private $profile_picture;
    
    public function setUserId($_id)
    {
        $this->id = Validation::validateNumber($_id);
    }
    public function setUserName($_name)
    {
        $this->name = Validation::validateText($_name);
    }
    public function getUserName(){return $this->name;}

    public function setUserEmail($_email)
    {
        $this->email = Validation::validateEmail($_email);
    }
    public function getUserEmail(){return $this->email;}
    
    public function setUserPassword($_password)
    {
        $this->password = Validation::validateText($_password);
    }
    public function getUserPassword(){return $this->password;}

    public function setUserRoom($_room_no)
    {
        $this->room_no = Validation::validateText($_room_no);
    }
    public function getUserRoom(){return $this->room_no;}

    public function setUserExt($_ext)
    {
        $this->ext = Validation::validateText($_ext);
    }
    public function getUserExt(){return $this->ext;}

    public function setUserPic($_pic)
    {
        $this->profile_picture = Validation::validateText($_pic);
    }
    public function getUserPic(){return $this->profile_picture;}

    public function listUsers(){
        global $db;
        $users = mysqli_query($db,"select * from users where admin=0");
        return $users;
    }
    public function selectUser($userid){
        global $db;
        $userData = mysqli_query($db,"select * from users where id ='$userid'");
        return $userData;
    }
    public function updateUser(){
        global $db;
        $userId = $this->id;
        $userName = $this->name;
        $userEmail = $this->email;
        $userPass = $this->password;
        $userRoom = $this->room_no;
        $userExt = $this->ext;
        $userImg = $this->profile_picture;


        $updateUser = mysqli_query($db,"update users set
        name = '$userName',
        email = '$userEmail',
        password = '$userPass',
        room_no = '$userRoom',
        ext = '$userExt',
        profile_picture = '$userImg'
        WHERE id = '$userId';");
        return ($updateUser) ? true : false;
    }

    public function deleteUser($deleteId){
        global $db;
        $result = mysqli_query($db,"delete from users where id ='$deleteId'");
        return $result;


    }

}

?>