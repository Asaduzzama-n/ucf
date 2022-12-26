<?php
session_start();
include './includes/db/dbConnection.php';
include './includes/Modals//campaignModal/cmodal.php';
$loggedIn = $_GET['loggedIn'];

?>



<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>UCF</title>
  <!-- local css links -->

  <link rel="stylesheet" href="./css/index.css">
  <link rel="stylesheet" href="./includes/informativePart/information.css">
  <link rel="stylesheet" href="./Campaign/displayCampaign/displayCampaign.css">
  <link rel="stylesheet" href="./css/nav.css">
  <!-- bootstrap and fontawesome link -->

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script src="./js/script.js"></script>
  <script src="https://kit.fontawesome.com/744d788fd4.js" crossorigin="anonymous"></script>


</head>


<body>
  <header class="container">
    <div class="navigation">
      <div class="leftLogo">
        <?php if ($loggedIn == 'true') { ?>
          <a href="./index.php?loggedIn=true">
            <h1>UIUCF</h1>
          </a>
        <?php } else { ?>
          <a href="./index.php?loggedIn=false">
            <h1>UIUCF</h1>
          </a>
        <?php } ?>
      </div>
      <div class="rightInfo">
        <div class="profileContainer">
          <button onclick="showNav();"><?php
                                        // echo $_SESSION['userProfile'];
                                        if ($loggedIn == 'false') {
                                        ?>
                                          <img src="./images/others/man.png" width="70px" alt="">
                                        <?php } else { ?>
                                          <?php if($_SESSION['userProfile']=='NULL'){
                                            ?>
                                            <img src="./images/others/man.png" width="70px" alt="">
                                            <?php } else { ?>
                                            <img class="prStyle" src="<?php echo './images/userProfilePic/' . $_SESSION['userProfile'] ?> " width="40px" alt=""> 
                                            <?php } ?>
                                        <?php } ?></button>
          <div id="nav" class="linkContainer ">
            <div class="triangle-up">
            </div>
            <div class="viewProfile d-flex align-items-center ">
              <i class="fa-solid fa-user"></i>

              <?php if ($loggedIn == 'true') { ?>
                <a class="mx-3 " href="./userProfile/profile.php?loggedIn=true">View Profile</a>
              <?php } else { ?>
                <a class="mx-3 " href="./login.php">View Profile</a>
              <?php } ?>

            </div>
            <hr>
            <div class="viewProfile d-flex align-items-center ">
              <i class="fa-sharp fa-solid fa-layer-group"></i>

              <?php if ($loggedIn == 'true') { ?>
                <a class="mx-3 " href="./userProfile/myCampaign.php?loggedIn=true">My campaign</a>
              <?php } else { ?>
                <a class="mx-3 " href="./login.php">My campaign</a>
              <?php } ?>

            </div>
            <hr>
            <div class="viewProfile d-flex align-items-center ">
              <i class="fa-sharp fa-solid fa-circle-dollar-to-slot"></i>
              <?php if ($loggedIn == 'true') { ?>
                <a class="mx-3 " href="./Campaign/startCampaign/startCampaign.php?loggedIn=true">Start campaign</a>
              <?php } else { ?>
                <a class="mx-3 " href="./login.php">Start campaign</a>
              <?php } ?>

            </div>
            <hr>
            <div class="viewProfile d-flex align-items-center ">
              <i class="fa-sharp fa-solid fa-right-from-bracket"></i>

              <?php if ($loggedIn == 'true') { ?>
                <a class="mx-3 " href="./logout.php">Logout</a>
              <?php } else { ?>
                <a class="mx-3 " href="./login.php">Login</a>
              <?php } ?>


            </div>
            <hr>
          </div>

        </div>
      </div>
    </div>
  </header>



  <main class="container">


    <section class="carouselContainer customStyle">
      <div id="carouselExampleDark" class="carousel rounded carousel-dark slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active " data-bs-interval="10000">
            <img src="./images/carousel/1902_i003_009_s.jpg" height="600px" width="800px" class="d-block w-100 " alt="...">
            <div class="carousel-caption d-none d-md-block">

              <h4><?php if ($loggedIn == 'true') { ?>
                  <a class="mx-3 " href="./Campaign/startCampaign/startCampaign.php?loggedIn=true">Start Your Own Campaign</a>
                <?php } else { ?>
                  <a class="mx-3 " href="./login.php">Start Your Own Campaign</a>
                <?php } ?>
              </h4>

            </div>
          </div>
          <div class="carousel-item customStyle" data-bs-interval="2000">
            <img src="./images//carousel/shutterstock_1356273047-2048x1365.jpg" height="600px" width="800px" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block customLink">
              <h4><?php if ($loggedIn == 'true') { ?>
                  <a class="mx-3 " href="./Campaign/startCampaign/startCampaign.php?loggedIn=true">Start Your Own Campaign</a>
                <?php } else { ?>
                  <a class="mx-3 " href="./login.php">Start Your Own Campaign</a>
                <?php } ?>
              </h4>

            </div>
          </div>
          <div class="carousel-item customStyle">
            <img src="./images//carousel/shutterstock_1356273047-2048x1365.jpg" height="600px" width="800px" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h4><?php if ($loggedIn == 'true') { ?>
                  <a class="mx-3 " href="./Campaign/startCampaign/startCampaign.php?loggedIn=true">Start Your Own Campaign</a>
                <?php } else { ?>
                  <a class="mx-3 " href="./login.php">Start Your Own Campaign</a>
                <?php } ?>
              </h4>
            </div>
          </div>
        </div>
        <!-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button> -->
        <!-- <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button> -->
      </div>
    </section>



    <section class="mt-5">
      <?php include './includes/informativePart/information.php'; ?>
    </section>







    <!-- campaign story part begins from here -->
    <?php
    $conn = new mysqli('localhost', 'root', '', 'fund_future');
    $sql = "SELECT * FROM campaign";
    $result = $conn->query($sql);
    ?>

    <section class="container ">
      <div class=" campaignStories my-5">

        <?php
        $count = 0;
        if (mysqli_num_rows($result) > 0) {
          while ($row = $result->fetch_assoc()) {
            $count = $count + 1;
            if ($count == 4) {
              break;
            }
            $path = 'images/userImages/';
        ?>
            <div class="cardBox">
              <div class="cardImg">
                <img src="<?php echo './images/CampaignImages/' . $row['camp_img']; ?>" alt="">
              </div>
              <div class="textGroup">
                <p><?php echo $row['camp_name'] ?></p>


                <?php if ($loggedIn == 'true') { ?>
                  <a href="./Donation/donation.php?cID=<?php echo $row['campaign_id']; ?>&tAmount=<?php echo $row['target_amount'] ?>&loggedIn=true">Help Now <img src="./images/others/right-arrow.png" width="20px" alt=""></a>
                <?php } else { ?>
                  <a href="./login.php">Help Now <img src="./images/others/right-arrow.png" width="20px" alt=""></a>
                <?php } ?>


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
      <div class="seeAllBtn">

        <?php if ($loggedIn == 'true') { ?>
          <a href="./Campaign/displayCampaign/fundrisers.php?loggedIn=true"> <button class="mt-5 ">See all Fundraisers
              <img src="./images/others/right-arrow (1).png" width="20px" alt="">
            </button></a>
        <?php } else { ?>
          <a href="./Campaign/displayCampaign/fundrisers.php?loggedIn=false"> <button class="mt-5 ">See all Fundraisers
              <img src="./images/others/right-arrow (1).png" width="20px" alt="">
            </button></a>
        <?php } ?>
      </div>

      </div>

    </section>



    <!-- success story part begins from here -->
    <section class="container my-5">

      <?php
      $conn = new mysqli('localhost', 'root', '', 'fund_future');
      $sql2 = "SELECT * FROM campaign WHERE camp_status=3";
      $result2 = $conn->query($sql2);
      ?>
      <div class="featuredTopic my-5">
        <p>Featured Topics</p>
        <h1>Success Stories</h1>
      </div>
      <div class="successStories my-5">

        <!-- <div class="featuredTopics"> -->
        <!-- Custom Card starts here -->
        <?php
        $count = 0;
        if (mysqli_num_rows($result2) > 0) {
          while ($row2 = $result2->fetch_assoc()) {
            $count = $count + 1;
            if ($count == 4) {
              break;
            }
            $path = 'images/userImages/';
        ?>
            <div class="cardBox">
              <div class="cardImg">
                <img src="<?php echo './images/CampaignImages/' . $row2['camp_img']; ?>" alt="">
              </div>
              <div class="textGroup">
                <p><?php echo $row2['camp_name'] ?></p>
                <a href="#">View More <img src="./images/others/right-arrow.png" width="20px" alt=""></a>
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
      <div class="seeAllBtn mt-5">

      <?php if ($loggedIn == 'true') { ?>
        <a href="./Campaign/displayCampaign/successStory.php?loggedIn=true"><button>See all Success Story<img src="./images/others/right-arrow (1).png" width="20px" alt=""></button></a>
        <?php } else { ?>
          <a href="./Campaign/displayCampaign/successStory.php?loggedIn=false"><button>See all Success Story<img src="./images/others/right-arrow (1).png" width="20px" alt=""></button></a>
        <?php } ?>

      </div>
    </section>



  </main>





  <footer><?php include './includes/footer.php' ?></footer>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>