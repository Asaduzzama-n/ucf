<?php
// session_start();
// include '../../includes/db/dbConnection.php';
// $loggedIn = $_SESSION['loggedIn'];
// $success = '';
// $error = '';
// if($loggedIn){

// }

// if ($_SERVER["REQUEST_METHOD"] == 'POST'){

//     $cName = validate($_POST['cName']);
//     $cEmail = validate($_POST['cEmail']);
//     $tAmount = validate($_POST['tAmount']);
//     $cDescription = validate($_POST['cDescription']);
//     $cPhone = validate($_POST['cPhone']);
//     $cDepartment = validate($_POST['cDepartment']);
//     $cID = validate($_POST['cID']);

//     if (empty(isset($_POST['pdf']))) {
//        $error = 'Select file!';
//     } else {
//         $pdf = $_POST['pdf'];
//     }


//     $photo_name = $_FILES["pdf"]["name"];
//     $photo_tmp_name = $_FILES["pdf"]["tmp_name"];
//     $photo_size = $_FILES["pdf"]["size"];
//     $photo_new_name = rand().$photo_name;
//     if ($photo_size > 5242880) {
//         echo "<script>alert('Photo is very big. Maximum photo uploading size is 5MB.');</script>";
//     }else{
//         $sql = "INSERT INTO campaign(user_id,camp_name,campaigner_email,campaigner_phn,camp_desc,target_amount,camp_file) 
//         VALUES ('$cID','$cName','$cEmail','$cPhone','$cDescription','$tAmount','$photo_new_name')";

//         $result = mysqli_query($conn, $sql);
// 		if($result){
//             move_uploaded_file($photo_tmp_name, "../../images/CampaignImages/" . $photo_new_name);
//             $success = "You have successfully started a campaign!";
//         }else{
//             $error = "Please try again";
//         }

//     }
// }

// function validate($data)
// {
//     $data = trim($data);
//     $data = stripslashes($data);
//     $data = htmlspecialchars($data);
//     return $data;
// }

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UCF</title>
    <link rel="stylesheet" href="./fundriser.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/744d788fd4.js" crossorigin="anonymous"></script>


</head>
<style>
    body {
        /* background-color: #F9EDE9; */
    }
</style>

<body>

    <header class="container">
        <div class="navigation">
                <div class="leftLogo">
                    <a href="../../index.php"><h1>UIUCF</h1></a>
                </div>
                <div class="rightInfo">
                    <a href="#">View Profile</a>
                    <a href="#">Logout</a>
                </div>
        </div>
    </header>

    <section class="container">
        <div class="row">
            <div class="col-md-4 mt-2">
                <div class="d-flex">
                    <img   src="../../images/others/quality.png" width="35px" alt="">
                    <h5 class="mx-2">Verified</h5>
                </div>
                <p>Every fundraiser on this page has been verified by our Trust & Safety experts.</p>
            </div>
            <div class="col-md-4 mt-2">
            <div class="d-flex">
                    <img   src="../../images/others/punch.png" width="30px" alt="">
                    <h5 class="mx-2">Powerful</h5>
                </div>
                <p>Your donation helps the people and communities affected by this event.</p>
            </div>
            <div class="col-md-4 mt-2">
            <div class="d-flex">
                    <img   src="../../images/others/trust.png" width="30px" alt="">
                    <h5 class="mx-2">Trusted</h5>
                </div>
                <p>You’re covered by the UIUCF Giving Guarantee—our money-back donor protection guarantee.</p>
            </div>
        </div>
        
        <div class="startFund mt-5">
            <h1>Share your story and start your own fundraising <br> journey with<span style="color:#F78924; font-style:italic; font-weight:bold;"> UIUCF!</span></h1>
            <br>
            <a href="../startCampaign/startCampaign.php">Start Now <img src="../../images/others/right-arrow.png" width="30px" alt=""> </a>
        </div>
        <br>
        <br>
        <hr>
    </section>
    

    <?php
    $conn = new mysqli('localhost', 'root', '', 'fund_future');
    $sql = "SELECT * FROM campaign";
    $result = $conn->query($sql);
    ?>

    <section class="container mt-5">
      <div class="allFundraiser">

        <?php
        if (mysqli_num_rows($result) > 0) {
          while ($row = $result->fetch_assoc()) {

            $path = 'images/userImages/';
        ?>
            <div class="cardBox">
              <div class="cardImg">
                <img src="<?php echo '../../images/CampaignImages/' . $row['camp_img']; ?>"alt="">
              </div>
              <div class="textGroup mt-3">
                <h4><?php echo $row['camp_name'] ?></h4>
                <p><?php echo $row['camp_desc'] ?></p>
                <p>$ <?php echo $row['target_amount'] ?></p>
                <a href="../../Donation/donation.php?cID=<?php echo $row['campaign_id']?>&tAmount=<?php echo $row['target_amount'] ?>">Help Now <img src="../../images/others/right-arrow (1).png" width="18px" alt=""></a>
              </div>
            </div>
          <?php } ?>

        <?php
        } else {
          echo "0 results";
        }
        $conn->close();
        ?>

      </div>
    </section>

    <footer class="container mt-5">
      <hr>
        <?php include '../../includes/footer.php' ?>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>