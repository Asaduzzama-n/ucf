<?php
session_start();
include '../includes/db/dbConnection.php';


?>



<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UCF</title>
    <!-- local css links -->
    <link rel="stylesheet" href="./css/dashboard.css">
    <!-- bootstrap and fontawesome link -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="./js/script.js"></script>
    <script src="https://kit.fontawesome.com/744d788fd4.js" crossorigin="anonymous"></script>


</head>


<body>

    <header class="container">
        <nav>
            <div class="navStyle">
                <h1>UIUCF</h1>
                <h4>Welcome: adsadsa</h4>
            </div>
        </nav>
    </header>

    <section class="container">
        <div class="row my-5">
            <div class="col-sm-4 dashboardNav mb-5">
                <div class="row my-3">
                    <div class="col d-flex align-items-center">
                        <img class="mx-3" src="../images/others/speedometer.png" width="30px" alt="">
                        <a href="./dashboard.php?loggedIn=true">Dashboard</a>
                    </div>
                </div>
                <hr>
                <div class="row my-3">
                    <div class="col d-flex align-items-center">
                        <img class="mx-3" src="../images/others/team.png" width="30px" alt="">
                        <a href="">Members</a>
                    </div>
                </div>
                <hr>

                <div class="row my-3">
                    <div class="col d-flex align-items-center">
                        <img class="mx-3" src="../images/others/request.png" width="30px" alt="">
                        <a href="./userRequest.php?loggedIn=true&approve=false&cancel=false&id=''">User Request</a>
                    </div>
                </div>
                <hr>

                <div class="row my-3">
                    <div class="col d-flex align-items-center">
                        <img class="mx-3" src="../images/others/welfare.png" width="30px" alt="">
                        <a href="./campaign.php?loggedIn=true&approve=false&cancel=false&id=''">Campaign</a>
                    </div>
                </div>
                <hr>

            </div>




            <div class="col-sm-8 ">
                <div class="row">
                    <div class="col ">
                        <div class="dashboardInfo d-flex align-item-center ">
                            <div class="dashboardImg">
                                <img src="../images/others/flag.png" width="60px" alt="">
                            </div>
                            <div class="mx-3">
                                <h4>Total Campaign</h4>
                                <p><?php
                                    $sql = "SELECT COUNT(campaign_id) FROM `campaign` WHERE camp_status = 1 OR camp_status = 3 ;";
                                    $result = $conn->query($sql);
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo $row['COUNT(campaign_id)'];
                                    }
                                    ?></p>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row mt-3">
                    <div class="col ">
                        <div class="dashboardInfo d-flex align-item-center ">
                            <div class="dashboardImg">
                                <img src="../images/others/charity.png" width="60px" alt="">
                            </div>
                            <div class="mx-3">
                                <h4>Total Donation</h4>
                                <p><?php
                                    $sql = "SELECT COUNT(donation_id) FROM `donation`;";
                                    $result = $conn->query($sql);
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo $row['COUNT(donation_id)'];
                                    }
                                    ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col ">
                        <div class="dashboardInfo d-flex align-item-center ">
                            <div class="dashboardImg">
                                <img src="../images/others/welfare.png" width="60px" alt="">
                            </div>
                            <div class="mx-3">
                                <h4>Total Donation Amount</h4>
                                <h5><?php
                                    $sql = "SELECT SUM(amount) FROM `donation`;";
                                    $result = $conn->query($sql);
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo $row['SUM(amount)'];
                                    }
                                    ?></h5>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row mt-3">
                    <div class="col ">
                        <div class="dashboardInfo d-flex align-item-center ">
                            <div class="dashboardImg">
                                <img src="../images/others/campaign (1).png" width="60px" alt="">
                            </div>
                            <div class="mx-3">
                                <h4>Active Campaign</h4>
                                <p><?php
                                    $sql = "SELECT COUNT(campaign_id) FROM `campaign` WHERE camp_status = 1;";
                                    $result = $conn->query($sql);
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo $row['COUNT(campaign_id)'];
                                    }
                                    ?></p>
                            </div>
                        </div>
                    </div>
                </div>






            </div>
        </div>
    </section>



    <footer><?php include '../includes/footer.php' ?></footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>