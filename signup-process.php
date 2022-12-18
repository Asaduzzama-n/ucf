<?php
session_start();
include "./includes/db/dbConnection.php";


if ($_SERVER["REQUEST_METHOD"] == 'POST') {

    $fName = validate($_POST['fName']);
    $lName = validate($_POST['lName']);
    $email = validate($_POST['email']);
    $phone = validate($_POST['phone']);
    $uniId = validate($_POST['uniId']);
    $userDepartment = validate($_POST['userDepartment']);
    $userDesignation = validate($_POST['userDesignation']);
    $image = $_POST['image'];
    $password = validate($_POST['password']);
    $rePassword = validate($_POST['rePassword']);

    $user_data = '&fName=' . $fName . '&lName=' . $lName . '&email=' . $email . '&phone=' . $phone . '&uniId=' . $uniId . '&userDepartment=' . $userDepartment
    . '&userDesignation=' . $userDesignation . '&image=' . $image;

    if (empty($_POST['fName'])) {
        header("Location: signup.php?error=First Name is required&$user_data");
        
    } else {
        $fName = validate($_POST['fName']);
    }if (empty($_POST['lName'])) {
        header("Location: signup.php?error=Last Name required&$user_data");
    }else{
        $lName = validate($_POST['lName']);
    } if (empty($_POST['email'])) {
        header("Location: signup.php?error=Email is required&$user_data");
    }else{
        $email = validate($_POST['email']);

    }
    if (empty($_POST['phone'])) {
        header("Location: signup.php?error=Phone is required&$user_data");
       
    }else{
        $phone = validate($_POST['phone']);
    } 
    if (empty($_POST['uniId'])) {
        header("Location: signup.php?error=University ID is required&$user_data");
    }else{
        $uniId = validate($_POST['uniId']);
    }
    if ($_POST['userDepartment'] == '0') {
        header("Location: signup.php?error=Department is required&$user_data");
   
    }else{
        $userDepartment = validate($_POST['userDepartment']);
    }
    if ($_POST['userDesignation'] == '0') {
        header("Location: signup.php?error=Designation is required&$user_data");

    }else{
        $userDesignation = validate($_POST['userDesignation']);
    }
    if (empty($_POST['password'])) {
        header("Location: signup.php?error=Password is required&$user_data");
        
    }else{
        $password = validate($_POST['password']);

    }
    if (empty($_POST['rePassword'])) {
        header("Location: signup.php?error= Confirmation password is required&$user_data");
        
    }else{
        $rePassword = validate($_POST['rePassword']);

    }
    if ($password !== $rePassword) {
        header("Location: signup.php?error=The confirmation password  does not match&$user_data");
        
    } else {
        $password = md5($password);


        // image validation part
        $photo_name = $_FILES["image"]["name"];
        $photo_tmp_name = $_FILES["image"]["tmp_name"];
        $photo_size = $_FILES["image"]["size"];
        $photo_new_name = rand() . $photo_name;

        if ($photo_size > 5242880) {
            echo "<script>alert('Photo is very big. Maximum photo uploading size is 5MB.');</script>";
        } else {

            $sql = "SELECT * FROM user WHERE user_id = '$uniId'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                header("Location: signup.php?error=University ID already Exist&$user_data");
                exit();
            } else {
                $sql2 = "INSERT INTO user(user_id,password,f_name,l_name,u_department,u_phone,u_email,u_image,u_designation) VALUES ('$uniId','$password','$fname','$lName','$userDepartment','$phone','$email','$photo_new_name','$userDesignation')";

                $result2 = mysqli_query($conn, $sql2);
                if ($result2) {

                    move_uploaded_file($photo_tmp_name, "./images/userImages/" . $photo_new_name);
                    $fName = $lName  = $email = $phone = $uniId =  $userDepartment = $userDesignation = $userFile = $password = $rePassword = $photo_tmp_name = $photo_new_name = '';
                    header("Location: signup.php?success=Your account has been created successfully");
                    
                } else {
                    header("Location: signup.php?error=unknown error occurred&$user_data");
                   
                }
            }
        }
    }
} else {
    header("Location: signup.php");
    
}


function validate($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
