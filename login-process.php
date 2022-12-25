<?php
session_start();
include './includes/db/dbConnection.php';


if (isset($_POST['uniId'])&& isset($_POST['password'])){
    $uniId = validate($_POST['uniId']);
    $password = validate($_POST['password']);

    $userData = '&uniId=' . $uniId ;

    if (empty($uniId)) {
		header("Location: login.php?error=University ID is required&$userData");
	    exit();
	}else if(empty($password)){
        header("Location: login.php?error=Password is required");
	    exit();
	}else{
        $password = md5($password);
        $password = substr($password,0,-2) ;

        $sql = "SELECT * FROM `user` WHERE user_id = '$uniId' AND password = '$password';";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            
            if ($row['user_id'] === $uniId && $row['password'] === $password) {
                $_SESSION['userId'] = $row['id'];
                $_SESSION['fName'] = $row['f_name'];
                $_SESSION['lName'] = $row['l_name'];
                $_SESSION['password'] = $row['password'];
                $_SESSION['userDepartment'] = $row['u_department'];
                $_SESSION['userDesignation'] = $row['u_designation'];
                $_SESSION['email'] = $row['u_email'];
                $_SESSION['phone'] = $row['u_phone'];
                $_SESSION['uniId'] = $row['user_id'];
                $_SESSION['userImage'] = $row['u_image'];
                $_SESSION['userProfile'] = $row['u_profile'];
                $_SESSION['userStatus'] = $row['u_status'];
                $_SESSION['loggedIn'] = true;

                header("Location: index.php?loggedIn=true");
		        exit();
            } else {
                header("Location: login.php?error=Incorrect University ID or password");
		        exit();
            }
        } else {
            header("Location: login.php?error=Incorrect University ID or password");
            exit();
        }
    }
}else {
    header("Location: login.php");
        exit();
}


function validate($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
