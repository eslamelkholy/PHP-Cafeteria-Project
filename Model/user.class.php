<?php

class User
{
    private $id;
    private $username;
    private $email;
    private $password;
    private $room_no;
    private $ext;
    private $profile_picture;
    // --------- Set ID -----------
    public function setUserId($_id)
    {
        $this->id = Validation::validateNumber($_id);
    }
    public function getUserId()
    {
        return $this->id;
    }
    // --------- Username ----------
    public function setUserName($_name)
    {
        $this->username = Validation::validateText($_name);
    }
    public function getUserName()
    {
        return $this->username;
    }
    // --------- Email ----------
    public function setUserEmail($_email)
    {
        $this->email = Validation::validateEmail($_email);
    }
    public function getUserEmail()
    {
        return $this->email;
    }
    // --------- Password ----------
    public function setUserPassword($_password)
    {
        $this->password = Validation::validateText($_password);
    }
    public function getUserPassword()
    {
        return $this->password;
    }
    // ---------- User Room -----------
    public function setUserRoom($_room_no)
    {
        $this->room_no = Validation::validateText($_room_no);
    }
    public function getUserRoom()
    {
        return $this->room_no;
    }
    // --------- User Ext ----------
    public function setUserExt($_ext)
    {
        $this->ext = Validation::validateText($_ext);
    }
    public function getUserExt()
    {
        return $this->ext;
    }
    // --------- User Picture ----------
    // public function setUserPic($_pic)
    // {
    //     $this->profile_picture = Validation::validateText($_pic);
    // }
    // public function getUserPic()
    // {
    //     return $this->profile_picture;
    // }

    //----------- Register Validation -------------
    public function registerValidation()
    {
        $errorArray = [];
        if (!isset($this->username) || empty($this->username))
            $errorArray[] = "username";
        if (!isset($this->password) || empty($this->password))
            $errorArray[] = "password";
        if (!isset($this->email) || empty($this->email) || !filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL))
            $errorArray[] = "email";
        if (!isset($this->room_no) || empty($this->room_no))
            $errorArray[] = "roomNo";
        if (!isset($this->ext) || empty($this->ext))
            $errorArray[] = "ext";
        //Picture Validation
        // $pic_name = $this->FILE["pic"]["name"];
        // $allowed_ext = array('gif', 'png', 'jpg');
        // $extension = pathinfo($pic_name, PATHINFO_EXTENSION);
        // if (!in_array($extension, $allowed_ext))
        //     $errorArray[] = "error_extension";

        return count($errorArray);
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
        return ($result) ? true : false;


    }

}

    //--------- Add User >> Register User -------------
    public function addUser()
    {
        $db = mysqli_connect("localhost", "root", "", "cafeteria");
        $username = mysqli_escape_string($db, $this->username);
        $email = mysqli_escape_string($db, $this->email);
        $password = mysqli_escape_string($db, $this->password);
        $roomNo = mysqli_escape_string($db, $this->room_no);
        $ext = mysqli_escape_string($db, $this->ext);
        //Picture Section
        // $dir_to_upload = "../public/images";
        // $temp_file_name = $this->FILE["pic"]["tmp_name"];
        // $pic_name = $this->FILE["pic"]["name"];
        // if (move_uploaded_file($temp_file_name, $dir_to_upload . "/" . basename($pic_name))) {
        $result = mysqli_query($db, "insert INTO users SET name = '$username',
            email = '$email',
            password = '$password',
            room_no = '$roomNo',
            ext = '$ext',
            profile_picture = 'admin.png'
            ");
        if ($result) {
            header("Location:../Views/login.php");
        }
        // }
    }
    //--------- Login Validation --------------
    public function loginValidation($loginData)
    {
        // global $db;

        $db = mysqli_connect("localhost", "root", "", "cafeteria");
        $errorArray = [];
        // ------ If Conn Failed ----------
        if ($db->connect_errno) {
            echo "Failed to connect to MySQL: " . $db->connect_error;
            exit();
        }
        if (!isset($this->username) || empty($this->username))
            $errorArray[] = "username";
        if (!isset($this->email) || empty($this->email))
            $errorArray[] = "email";
        if (!isset($this->password) || empty($this->password))
            $errorArray[] = "password";
        $username = mysqli_escape_string($db, $this->username);
        // $username = mysqli_escape_string($db,$_POST['username']);
        $email = mysqli_escape_string($db, $this->email);
        // $email = mysqli_escape_string($db,$_POST['email']);
        $password = mysqli_escape_string($db, $this->password);
        // $password = mysqli_escape_string($db,$_POST['password']);
        if (count($errorArray) > 0)
            return false;
        else {
            $result = mysqli_query($db, "select * FROM users WHERE name = '$username' AND email = '$email' AND password = '$password' ");
            if (mysqli_num_rows($result) > 0) {
                return mysqli_fetch_assoc($result);
            } else {
                return false;
            }
            // return mysqli_fetch_assoc($result); 
        }
    }
}
