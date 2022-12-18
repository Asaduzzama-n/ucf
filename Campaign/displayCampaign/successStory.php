<?php
session_start();
include '../../includes/db/dbConnection.php';
$loggedIn = $_SESSION['loggedIn'];
$success = '';
$error = '';
// if($loggedIn){

// }

if ($_SERVER["REQUEST_METHOD"] == 'POST'){

    $cName = validate($_POST['cName']);
    $cEmail = validate($_POST['cEmail']);
    $tAmount = validate($_POST['tAmount']);
    $cDescription = validate($_POST['cDescription']);
    $cPhone = validate($_POST['cPhone']);
    $cDepartment = validate($_POST['cDepartment']);
    $cID = validate($_POST['cID']);

    if (empty(isset($_POST['pdf']))) {
       $error = 'Select file!';
    } else {
        $pdf = $_POST['pdf'];
    }


    $photo_name = $_FILES["pdf"]["name"];
    $photo_tmp_name = $_FILES["pdf"]["tmp_name"];
    $photo_size = $_FILES["pdf"]["size"];
    $photo_new_name = rand().$photo_name;
    if ($photo_size > 5242880) {
        echo "<script>alert('Photo is very big. Maximum photo uploading size is 5MB.');</script>";
    }else{
        $sql = "INSERT INTO campaign(user_id,camp_name,campaigner_email,campaigner_phn,camp_desc,target_amount,camp_file) 
        VALUES ('$cID','$cName','$cEmail','$cPhone','$cDescription','$tAmount','$photo_new_name')";
        
        $result = mysqli_query($conn, $sql);
		if($result){
            move_uploaded_file($photo_tmp_name, "../../images/CampaignImages/" . $photo_new_name);
            $success = "You have successfully started a campaign!";
        }else{
            $error = "Please try again";
        }

    }
}

function validate($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UCF</title>
    <link rel="stylesheet" href="./displayCampaign.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/744d788fd4.js" crossorigin="anonymous"></script>


</head>
<style>
    body {
        background-color: #FEE7D1;
    }
</style>

<body>
    <div class="cardBox">
        <div class="cardImg">
        <img src="../../images/others/scober.jpeg" alt="">
        </div>
        <div class="textGroup">
            <p>Lorem ipsum dolor sit amet.!</p>
            <a href="#">Help Now ></a>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>