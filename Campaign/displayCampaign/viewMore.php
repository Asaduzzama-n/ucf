<?php
session_start();
include '../../includes/db/dbConnection.php';
$loggedIn = $_SESSION['loggedIn'];
$userId = $_SESSION['userId'];
$uniId = $_SESSION['uniId'];
$cID = $_GET['cID'];
// $tAmount = $_GET['tAmount'];



?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UCF</title>
    <link rel="stylesheet" href="../../css/nav.css">

    <link rel="stylesheet" href="./viewMore.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/744d788fd4.js" crossorigin="anonymous"></script>



</head>



<body>

    <header class="">
        <div class="navigation">
            <div class="leftLogo mx-5">
                <a href="../../index.php?loggedIn=true">
                    <h1>UIUCF</h1>
                </a>
            </div>
            <div class="rightInfo">
                <div class="profileContainer">
                    <button onclick="showNav();"><?php
                                                    // echo $_SESSION['userProfile'];
                                                    if ($_SESSION['userProfile'] == 'NULL') {
                                                    ?>
                            <img src="../../images/others/man.png" width="70px" alt="">
                        <?php } else { ?>
                            <img class="prStyle" src="<?php echo '../../images/userProfilePic/' . $_SESSION['userProfile'] ?> " width="40px" alt="">
                        <?php } ?></button>
                    <div id="nav" class="linkContainer ">
                        <div class="triangle-up">
                        </div>
                        <div class="viewProfile d-flex align-items-center ">
                            <i class="fa-solid fa-user"></i>

                            <?php if ($loggedIn == 'true') { ?>
                                <a class="mx-3 " href="../../userProfile/profile.php?loggedIn=true">View Profile</a>
                            <?php } else { ?>
                                <a class="mx-3 " href="../../login.php">View Profile</a>
                            <?php } ?>

                        </div>
                        <hr>
                        <div class="viewProfile d-flex align-items-center ">
                            <i class="fa-sharp fa-solid fa-layer-group"></i>

                            <?php if ($loggedIn == 'true') { ?>
                                <a class="mx-3 " href="../../userProfile/myCampaign.php?loggedIn=true">My campaign</a>
                            <?php } else { ?>
                                <a class="mx-3 " href="../../login.php">My campaign</a>
                            <?php } ?>


                        </div>
                        <hr>
                        <div class="viewProfile d-flex align-items-center ">
                            <i class="fa-sharp fa-solid fa-circle-dollar-to-slot"></i>

                            <?php if ($loggedIn == 'true') { ?>
                                <a class="mx-3 " href="../../Campaign/startCampaign/startCampaign.php?loggedIn=true">Start campaign</a>
                            <?php } else { ?>
                                <a class="mx-3 " href="../../login.php">Start campaign</a>
                            <?php } ?>

                        </div>
                        <hr>
                        <div class="viewProfile d-flex align-items-center ">
                            <i class="fa-sharp fa-solid fa-right-from-bracket"></i>

                            <?php if ($loggedIn == 'true') { ?>
                                <a class="mx-3 " href="../../logout.php">Logout</a>
                            <?php } else { ?>
                                <a class="mx-3 " href="../../login.php">Login</a>
                            <?php } ?>


                        </div>
                        <hr>
                    </div>

                </div>
            </div>
        </div>
    </header>


    <?php
    $sql3 = "SELECT * FROM campaign WHERE campaign_id='$cID'";
    $result3 = mysqli_query($conn, $sql3);
    if (mysqli_num_rows($result3) > 0) {
        $row = $result3->fetch_assoc();
        $path = '../../images/CampaignImages/';
    }

    ?>

    <section class="container">
        <div class="customContainer">
        <div class="row">
            <div class="col-sm-6 imgContainer">
                    <img src="<?php echo $path . $row['camp_img'] ?>" width="600px" alt="">
            </div>
        
        <div class="col-sm-6">
            <div class="row my-2">
                <div class="col ">
                    <h5><strong>Campaigner Name: <?php echo $row['camp_name'] ?></strong></h5>
                </div>
            </div>
            <div class="row">
                <div class="col ">
                    <h5><strong>Campaigner ID: <?php echo $row['user_id'] ?></strong></h5>
                </div>
            </div>

            <hr>
            <div class="row mt-4">
                <div class="col">
                    <p><?php echo $row['camp_desc'] ?></p>
                </div>
            </div>

            <div class="row mt-3 ">
                <div class="col">
                    <div class="d-flex">
                        <h5 id="progressAmount">
                            <?php
                            $cID = $row['campaign_id'];
                            $sql2 = "SELECT SUM(amount) FROM donation WHERE campaign_id = '$cID';";
                            $result2 = $conn->query($sql2);
                            while ($row2 = mysqli_fetch_array($result2)) {
                                echo $row2['SUM(amount)'];
                            }
                            ?>
                        </h5>
                        <h5 class="px-2">Raised of </h5>
                        <h5 id="tAmount"><?php echo $row['target_amount'] ?></h5>
                        <h5 class="px-2"> goal</h5>
                    </div>
                    <div class="progressBar mt-4">
                        <div id="progress" class="childBar">
                        </div>
                    </div>
                </div>

            </div>
        </div>
        </div>
        </div>
    </section>



    <footer class=" mt-5 footers">

        <?php include '../../includes/footer.php' ?>
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



        const progressAmount = parseInt(document.getElementById('progressAmount').innerHTML);
        const tAmount = parseInt(document.getElementById('tAmount').innerHTML);

        if (progressAmount >= tAmount) {
            document.getElementById('progress').style.width = '100%';
            document.getElementById('progressAmount').innerHTML = tAmount;
            document.getElementById('donateNowBtn').disabled = true;
        } else {
            const progressPercentage = (progressAmount / tAmount) * 100;
            console.log(progressPercentage);
            document.getElementById('progress').style.width = progressPercentage + "%";
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>