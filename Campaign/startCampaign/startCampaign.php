<?php
session_start();
include '../../includes/db/dbConnection.php';
$loggedIn = $_SESSION['loggedIn'];
$success = '';
$error = '';
// if($loggedIn){

// }

if ($_SERVER["REQUEST_METHOD"] == 'POST') {

    $cName = validate($_POST['cName']);
    $cEmail = validate($_POST['cEmail']);
    $tAmount = validate($_POST['tAmount']);
    $cDescription = validate($_POST['cDescription']);
    $cPhone = validate($_POST['cPhone']);
    // $cDepartment = validate($_POST['cDepartment']);
    $cID = validate($_POST['cID']);

    if (empty(isset($_POST['pdf'])) and empty(isset($_POST['image'])) ) {
        $error = 'Select file!';
    } else {
        $pdf = $_POST['pdf'];
        $img = $_POST['image'];

    }


    $photo_name = $_FILES["image"]["name"];
    $photo_tmp_name = $_FILES["image"]["tmp_name"];
    $photo_size = $_FILES["image"]["size"];
    $photo_new_name = rand() . $photo_name;

    $file_name = $_FILES["pdf"]["name"];
    $file_temp_name = $_FILES["pdf"]["tmp_name"];
    $file_size = $_FILES["pdf"]["size"];
    $file_new_name = rand() . $file_name;

    if ($photo_size > 5242880) {
        echo "<script>alert('Photo is very big. Maximum photo uploading size is 5MB.');</script>";
    } else {
        $sql = "INSERT INTO campaign(user_id,camp_name,campaigner_email,campaigner_phn,camp_desc,target_amount,camp_img,camp_file) 
        VALUES ('$cID','$cName','$cEmail','$cPhone','$cDescription','$tAmount','$photo_new_name','$file_new_name')";

        $result = mysqli_query($conn, $sql);
        if ($result) {
            move_uploaded_file($file_temp_name, "../../images/userFile/" . $file_new_name);
            move_uploaded_file($photo_tmp_name, "../../images/CampaignImages/" . $photo_new_name);

            $success = "You have successfully started a campaign!";
        } else {
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
    <link rel="stylesheet" href="../../includes/navBar/style.css">
    <link rel="stylesheet" href="./startCampaign.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/744d788fd4.js" crossorigin="anonymous"></script>


</head>
<style>
    body {
        /* background-color: #FEE7D1; */
    }
</style>

<body>

    <header class="container">
        <div class="navigation">
            <div class="leftLogo">
                <h1>UIUCF</h1>
            </div>
            <div class="rightInfo">
                <a href="#">View Profile</a>
                <a href="#">Logout</a>
            </div>
        </div>
    </header>

    <section class="container campaignPage">
        <div class="infoContainer">
            <h1>Share your story with others and let them help you!</h1>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consectetur, quibusdam!</p>
            <hr>
            <br>
            <h2>Start Your Campaign <button onclick="showForm();">Now <img src="../../images/others/right-arrow.png" width="30px" alt=""></button> </h2>
            <h2>Or</h2>
            <h3>Go back to <a href="../../index.php">Home Page <img src="../../images/others/right-arrow.png" width="30px" alt=""> </a></h3>
        </div>
        <div class="campaignFormContainer" id="campaignForm">
            <div class="campaignBox shadow">

                <form action="#" enctype="multipart/form-data" method="post">
                    <div class="row">
                        <div class="col">
                            <input type="text" id="cName" name="cName" placeholder="Campaign Name" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="email" id="cEmail" name="cEmail" placeholder="Email" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="number" id="tAmount" name="tAmount" placeholder="Targeted Amount" required>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <textarea id="cDescription" name="cDescription" placeholder="Please describe your case" required></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <input type="text" id="cPhone" name="cPhone" placeholder="Phone Number" required>
                        </div>
                    </div>
                    <!-- <div class="row mt-3">
                        <div class="col">
                            <select class="selectCustomStyle" name="cDepartment" id="cDepartment" required>
                                <option selected>Chose Your Department</option>
                                <option value="1">CSE</option>
                                <option value="2">BBA</option>
                                <option value="3">EEE</option>
                                <option value="4">CIVIL</option>
                                <option value="5">MJ</option>
                            </select>
                        </div>
                    </div> -->
                    <div class="row">
                        <div class="col">
                            <input type="text" id="cID" name="cID" placeholder="University ID" required>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col">
                            <div>
                                <div class="fileContainer">
                                    <p>Please Provide mentioned documents</p>

                                    <p>***Student certificate/ID card/NID/</p>

                                    <p>***Necessary documents regarding your campaign</p>

                                    <p>***All the documents in one single pdf file</p>

                                    <p for="pdf & img">Choose file to upload (pdf)</p>
                                </div>

                                <div class="files">
                                <input class="mt-2 " type="file" name="pdf" accept="application/pdf" required>
                                <input class="mt-2 " type="file" name="image" accept="image/*" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row mt-3">
                        <div class="col">
                            <input type="submit" value="Submit" id="submit" name="submit">
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </section>



    <script>
        const showForm = () => {
            const from = document.getElementById('campaignForm');
            from.style.display = 'block';
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>