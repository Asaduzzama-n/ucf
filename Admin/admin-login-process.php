<?php
session_start();
include '../includes/db/dbConnection.php';


if (isset($_POST['adminId'])&& isset($_POST['adminPass'])){
    $adminId = validate($_POST['adminId']);
    $password = validate($_POST['adminPass']);

    $userData = '&uniId=' . $adminId ;

    if (empty($adminId)) {
		header("Location: login.php?error=University ID is required&$userData");
	    exit();
	}else if(empty($password)){
        header("Location: login.php?error=Password is required");
	    exit();
	}else{
        // $password = md5($password);
        // $password = substr($password,0,-2) ;

        $sql = "SELECT * FROM `admin` WHERE adminId = '$adminId' AND password = '$password'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            
            if ($row['adminId'] === $adminId && $row['password'] === $password) {
                $_SESSION['adminId'] = $row['adminId'];
                $_SESSION['name'] = $row['adminName'];

                $_SESSION['loggedIn'] = true;

                header("Location: dashboard.php?loggedIn=true");
		        exit();
            } else {
                header("Location: login.php?error=Incorrect Admin ID or password");
		        exit();
            }
        } else {
            header("Location: login.php?error=Incorrect Admin ID or password");
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
