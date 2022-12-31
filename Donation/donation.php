<?php
session_start();
include '../includes/db/dbConnection.php';
$loggedIn = $_SESSION['loggedIn'];
$userId = $_SESSION['userId'];
$uniId = $_SESSION['uniId'];
$cID = $_GET['cID'];
$tAmount = $_GET['tAmount'];


if (isset($_POST['submit'])) {

    $pMethod = $_POST['pMethod'];
    $amount = $_POST['amount'];
    $txId = $_POST['txId'];

    // here 10 in $sql10 and $result10 is randomly taken no worries!
    // getting txid of donation to check
    $sql9 = "SELECT * FROM donation WHERE transaction_id = '$txId'";
    $result9 = mysqli_query($conn, $sql9);
    if (mysqli_num_rows($result9) > 0) {

        echo "<script>alert('Sorry Transaction ID already Exist Try Again!.')</script>";
    } else {
        date_default_timezone_set("Asia/Dhaka");
        $campDate = date("Y/m/d,h:i:sa");
        // echo $campDate;
        // Dumping data in donation table
        $sql10 = "INSERT INTO donation  (doner_id,amount,target_amount, payment_method,transaction_id,campaign_id,date)
            VALUES('$uniId','$amount','$tAmount','$pMethod','$txId','$cID','$campDate')";
        $result10 = mysqli_query($conn, $sql10);

        if ($result10) {
            echo "<script>alert('Thanks for Being with us! Your one step toward help can push others one step closer to their dream!')</script>";
        } else {

            echo "<script>alert('Sorry Try Again!.')</script>";
        }
    }
}
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UCF</title>
    <link rel="stylesheet" href="./donation.css">
    <link rel="stylesheet" href="../css/nav.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/744d788fd4.js" crossorigin="anonymous"></script>



</head>


<body>

    <header class="">
        <div class="navigation">
            <div class="leftLogo mx-5">
                <a href="../index.php?loggedIn=true">
                    <h1>UIUCF</h1>
                </a>
            </div>
            <div class="rightInfo">
                <div class="profileContainer">
                    <button onclick="showNav();"><?php
                                        // echo $_SESSION['userProfile'];
                                        if ($_SESSION['userProfile'] == 'NULL') {
                                        ?>
                                          <img src="../images/others/man.png" width="70px" alt="">
                                        <?php } else { ?>
                                          <img class="prStyle" src="<?php echo '../images/userProfilePic/' . $_SESSION['userProfile'] ?> " width="40px" alt="">
                                        <?php } ?></button>
                    <div id="nav" class="linkContainer ">
                        <div class="triangle-up">
                        </div>
                        <div class="viewProfile d-flex align-items-center ">
                            <i class="fa-solid fa-user"></i>

                            <?php if ($loggedIn == 'true') { ?>
                                <a class="mx-3 " href="../userProfile/profile.php?loggedIn=true">View Profile</a>
                            <?php } else { ?>
                                <a class="mx-3 " href="../login.php">View Profile</a>
                            <?php } ?>

                        </div>
                        <hr>
                        <div class="viewProfile d-flex align-items-center ">
                            <i class="fa-sharp fa-solid fa-layer-group"></i>

                            <?php if ($loggedIn == 'true') { ?>
                                <a class="mx-3 " href="../userProfile/myCampaign.php?loggedIn=true">My campaign</a>
                            <?php } else { ?>
                                <a class="mx-3 " href="../login.php">My campaign</a>
                            <?php } ?>


                        </div>
                        <hr>
                        <div class="viewProfile d-flex align-items-center ">
                            <i class="fa-sharp fa-solid fa-circle-dollar-to-slot"></i>

                            <?php if ($loggedIn == 'true') { ?>
                                <a class="mx-3 " href="../Campaign/startCampaign/startCampaign.php?loggedIn=true">Start campaign</a>
                            <?php } else { ?>
                                <a class="mx-3 " href="../login.php">Start campaign</a>
                            <?php } ?>

                        </div>
                        <hr>
                        <div class="viewProfile d-flex align-items-center ">
                            <i class="fa-sharp fa-solid fa-right-from-bracket"></i>

                            <?php if ($loggedIn == 'true') { ?>
                                <a class="mx-3 " href="../logout.php">Logout</a>
                            <?php } else { ?>
                                <a class="mx-3 " href="../login.php">Login</a>
                            <?php } ?>


                        </div>
                        <hr>
                    </div>

                </div>
            </div>
        </div>
    </header>

    <?php

    $cID = $_GET['cID'];

    // getting campaign information from campaign table
    $conn = new mysqli('localhost', 'root', '', 'fund_future');
    // $sql = "SELECT * FROM campaign WHERE campaign_id = '$cID'";
    $sql = "SELECT * FROM user INNER JOIN campaign ON campaign.user_id = user.user_id WHERE campaign.campaign_id = '$cID';";
    $result = $conn->query($sql);

    if (mysqli_num_rows($result) > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "error can't get campaign data";
    }

    ?>

    <section class="container my-4">
        <div class="DonationContainer ">
            <div class="leftContainer my-4">
                <div class="imgContainer">
                    <img src="<?php echo '../images/CampaignImages/' . $row['camp_img']; ?>" alt="">
                </div>
                <div class="campaignInfo">
                    <div class="organizerName mt-4">
                        <h3><img src="../images/others/campaign.png" width="30px" alt=""> <?php echo $row['camp_name'] ?></h3>
                    </div>
                    <hr>
                    <!-- <div class="div">
                        <h4>Type</h4>
                    </div>
                    <hr> -->
                    <div class="campaignDescription">
                        <p><?php echo $row['camp_desc'] ?></p>
                    </div>
                    <hr>

                    <div class="mt-4 d-flex justify-content-center userProfile">
                        <img src="<?php echo "../images/userImages/" . $row['u_image']; ?>" width="60px" alt="">
                    </div>
                    <div class="organizerInfo mt-4">

                        <div class="mt-4 mb-5 text-center orgDetails">
                            <h4>Organizer : <?php echo ($row['f_name'] . ' ' . $row['l_name']); ?></h4>
                            <h5>Designation : <?php echo $row['u_designation']; ?></h5>

                            <br>
                            <h5>Contact Information</h5>
                            <br>
                            <p>Phone : <?php echo $row['u_phone'] ?></p>
                            <p>Email : <?php echo $row['u_email'] ?></p>

                        </div>
                    </div>
                </div>


            </div>




            <div class="rightContainer my-4 ">
                <div class="progressBar mt-5">


                    <div class="d-flex">
                        <h6 id="progressAmount"><?php
                                                $sql2 = "SELECT SUM(amount) FROM donation WHERE campaign_id = '$cID';";
                                                $result2 = $conn->query($sql2);
                                                while ($row2 = mysqli_fetch_array($result2)) {
                                                    echo $row2['SUM(amount)'];
                                                }
                                                ?>
                        </h6>
                        <h6 class="px-2">raised of</h6>
                        <h6 id="tAmount"><?php echo $row['target_amount'] ?></h6>
                        <h6 class="px-2">goal</h6>
                    </div>


                    <div class="progressParent mt-4">
                        <div id="progress" class="progressChild">
                        </div>
                    </div>
                    <p><?php
                        $sql3 = "SELECT COUNT(donation_id) FROM donation WHERE campaign_id = '$cID';";
                        $result3 = $conn->query($sql3);
                        while ($row3 = mysqli_fetch_array($result3)) {
                            echo $row3['COUNT(donation_id)'];
                        } ?>
                    </p>




                    <div id="formContainer" class="formContainer">
                        <form action="" method="post">
                            <div class="row formHeader">
                                <div class="col d-flex justify-content-between">
                                    <h2>DONATE</h2>
                                    <img id="closeBtn" src="../images/others/close.png" width="45px" alt="">
                                </div>
                                <div class="row mt-4">
                                    <div class="pMethod1 d-flex justify-content-between">
                                        <img src="../images/others/bkash_payment_logo.png" width="70%" alt="">
                                        <input type="radio" id="pMethod1" name="pMethod" value="Bkash">
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="pMethod2 d-flex justify-content-between">
                                        <img src="../images/others/Rocket_payment_logo.jpg" width="70%" alt="">
                                        <input type="radio" id="pMethod2" name="pMethod" value="Rocket">
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="inputField">
                                        <input id="amount" type="number" name="amount" placeholder="Donated Amount" required>
                                        <input type="text" name="txId" placeholder="Transaction ID" required>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col d-flex justify-content-center mt-4">
                                        <button id="donateBtn" name="submit" disabled>Donate</button>
                                    </div>
                                </div>
                            </div>
                            <div class="inputField">

                            </div>
                        </form>
                    </div>
                    <div class="donateBtn ">
                        <button onclick="showForm();" id="donateNowBtn">Donate Now</button>
                    </div>
                </div>

            </div>
        </div>
    </section>



    <footer class=" mt-5">
        
        <?php include '../includes/footer.php' ?>
    </footer>


    <script>
        const showNav = () => {
            var nav = document.getElementById('nav');
            // nav.style.display = "none";

            if (nav.style.display === "none") {
                nav.style.display = "block";

            } else {
                nav.style.display = "none";
            }

        }

        const showForm = () => {
            const donateNowBtn = document.getElementById('donateNowBtn');
            const form = document.getElementById('formContainer');
            donateNowBtn.style.display = 'none';
            form.style.display = 'block';
        }


        document.getElementById('amount').addEventListener('input', (e) => {
            const amount = parseInt(e.target.value);
            if (amount > 0) {
                document.getElementById('donateBtn').disabled = false;
            } else {
                document.getElementById('donateBtn').disabled = true;

            }
        })

        const progressAmount = parseInt(document.getElementById('progressAmount').innerHTML);
        const tAmount = parseInt(document.getElementById('tAmount').innerHTML);
        
        if(progressAmount>=tAmount){
        document.getElementById('progress').style.width = '100%';
        document.getElementById('progressAmount').innerHTML = tAmount;
        document.getElementById('donateNowBtn').disabled = true;
      }
      else{
        const progressPercentage = (progressAmount / tAmount) * 100;
        console.log(progressPercentage);
        document.getElementById('progress').style.width = progressPercentage + "%";
      }

    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>