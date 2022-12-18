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
    if (mysqli_num_rows($result9)>0) {

            echo "<script>alert('Sorry Transaction ID already Exist Try Again!.')</script>";    

        }else{
            date_default_timezone_set("Asia/Dhaka");
            $campDate = date("Y/m/d,h:i:sa");
            // echo $campDate;
            // Dumping data in donation table
            $sql10 = "INSERT INTO donation  (doner_id,amount,target_amount, payment_method,transaction_id,campaign_id,date)
            VALUES('$uniId','$amount','$tAmount','$pMethod','$txId','$cID','$campDate')";
            $result10 = mysqli_query($conn, $sql10);

            if ($result10) {

                echo "<script>alert('Updated.')</script>";

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
                <a href="../../index.php">
                    <h1>UIUCF</h1>
                </a>
            </div>
            <div class="rightInfo">
                <a href="#">View Profile</a>
                <a href="#">Logout</a>
            </div>
        </div>
    </header>

    <?php

    $cID = $_GET['cID'];

    // getting campaign information from campaign table
    $conn = new mysqli('localhost', 'root', '', 'fund_future');
    $sql = "SELECT * FROM campaign WHERE campaign_id = '$cID'";
    $result = $conn->query($sql);

    if (mysqli_num_rows($result) > 0) {
        $row = $result->fetch_assoc();
    } else {

    }

    // fetching donation Data form db with join query donation and campaign table

    // $sql1 = "SELECT SUM(amount) FROM donation WHERE campaign_id = '$cID'";
    // $result1 = $conn->query($sql1);
   
    // while ($row1 = mysqli_fetch_array($result1)) {
    //     echo $row['SUM(amount)'];
      
    // }

    

    
    // $slq11 =  "SELECT * FROM campaign INNER JOIN donation ON campaign.campaign_id = donation.campaign_id WHERE donation.campaign_id = '$cID'";
    // $result11 = mysqli_query($conn,$slq11);
    // $found = false;
    // if(mysqli_num_rows($result11)>0){
    //     $row11 = $result11->fetch_assoc();
    //     $found = true;
    // }else{

        // // getting target amount and other information of a campaign that has no donation record
        // $slq11 =  "SELECT * FROM campaign WHERE campaign_id='cID'";
        // $result11 = mysqli_query($conn,$slq11);
        // $row11 = $result11->fetch_assoc();
    // }
    ?>

    <section class="container">
        <div class="DonationContainer">
            <div class="leftContainer">
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

                    <div class="organizerInfo mt-4">
                        <div class="d-flex justify-content-center">
                            <img src="../images/others/man (1).png" width="50px" alt="">
                        </div>
                        <div class="mt-4 mb-5">
                            <h4>Name</h4>
                            <h5>Contact</h5>
                        </div>
                    </div>
                </div>


            </div>


            

            <div class="rightContainer">
                <div class="progressBar mt-5">



                    <h5>$ raised of $ <?php echo $row['target_amount']?> goal</h5>
                    <!-- <div class="progress mt-4">
                        <div class="progress-bar progress-bar-striped bg-warning " role="progressbar" style="width: 53%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                    </div> -->
                    <div class="progressParent mt-4">
                        <div id="progress" class="progressChild">
                        </div>
                    </div>
                    <p>32 Donation</p>
                    <div id="formContainer" class="formContainer">
                        <form action="" method="post">
                            <div class="row formHeader">
                                <div class="col d-flex justify-content-between">
                                    <h2>DONATE</h2>
                                    <img id="closeBtn" src="../images/others/close.png" width="45px" alt="">
                                </div>
                                <div class="row mt-4">
                                    <div class="pMethod1 d-flex justify-content-between">
                                        <img src="../images/others/bkash_payment_logo.png" width="80%" alt="">
                                        <input type="radio" id="pMethod1" name="pMethod" value="Bkash">
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="pMethod2 d-flex justify-content-between">
                                        <img src="../images/others/Rocket_payment_logo.jpg" width="80%" alt="">
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
                    <div class="donateBtn">
                        <button onclick="showForm();" id="donateNowBtn">Donate Now</button>
                    </div>
                </div>

            </div>
        </div>
    </section>



    <footer class="container mt-5">
      <hr>
        <?php include '../includes/footer.php' ?>
    </footer>

    <script>
        const showForm = () => {
            const donateNowBtn = document.getElementById('donateNowBtn');
            const form = document.getElementById('formContainer');
            donateNowBtn.style.display = 'none';
            form.style.display = 'block';
        }

        document.getElementById('closeBtn').addEventListener('click', () => {
            document.getElementById('formContainer').style.display = 'none';
            document.getElementById('donateNowBtn').style.display = 'block';

        })


        document.getElementById('amount').addEventListener('input', (e) => {
            const amount = parseInt(e.target.value);
            if (amount > 0) {
                document.getElementById('donateBtn').disabled = false;
            } else {
                document.getElementById('donateBtn').disabled = true;

            }
        })

        document.getElementById('progress').style.width = '20%';
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>