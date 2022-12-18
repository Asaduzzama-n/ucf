<?php
session_start();
include './includes/db/dbConnection.php';
include './includes/Modals//campaignModal/cmodal.php';
$_SESSION['loggedIn'] = true;
$loggedIn = $_SESSION['loggedIn'];
// $uniId = $_SESSION['uniId'];


// echo $loggedIn;
?>



<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>UCF</title>
  <!-- local css links -->
  <link rel="stylesheet" href="./includes/navBar/style.css">
  <link rel="stylesheet" href="./includes/carousel/style.css">
  <link rel="stylesheet" href="./css/index.css">
  <link rel="stylesheet" href="./includes/Modals/campaignModal/cmodal.css">
  <link rel="stylesheet" href="./includes/informativePart/information.css">
  <link rel="stylesheet" href="./Campaign/displayCampaign/displayCampaign.css">
  <!-- bootstrap and fontawesome link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/744d788fd4.js" crossorigin="anonymous"></script>


</head>

<body>

  <header>
    <section class="wrapper">
      <nav>
        <?php include './includes/navBar/navBar.php'; ?>
        <div class="mostRight">

          <?php if ($loggedIn) { ?>
            <li><a href='#'>View Profile</a></li>
            <li><a href='logout.php'>logout</a></li>
          <?php } else { ?>
            <li><a href="login.php">Login</a></li>
          <?php } ?>


        </div>
      </nav>

    </section>
  </header>

  <main class="container">

    <section>
      <?php include './includes/carousel/carousel.php'; ?>
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

    <section>
      <div class="campaignStories mt-5">

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
                <a href="./Donation/donation.php?cID=<?php echo $row['campaign_id'];?>&tAmount=<?php echo $row['target_amount']?>">Help Now <img src="./images/others/right-arrow.png" width="20px" alt=""></a>
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
        <a href="./Campaign/displayCampaign/fundrisers.php"> <button class="mt-5 ">See all Fundraisers
        <img src="./images/others/right-arrow (1).png" width="20px" alt="">
        </button></a>
      </div>

      </div>

    </section>



    <!-- success story part begins from here -->
    <section class="mt-5">

      <?php
      $conn = new mysqli('localhost', 'root', '', 'fund_future');
      $sql2 = "SELECT * FROM campaign WHERE camp_status=3";
      $result2 = $conn->query($sql2);
      ?>
      <div class="featuredTopic">
        <p>Featured Topics</p>
        <h1>Success Stories</h1>
      </div>
      <div class="successStories ">

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
        <a href="#"><button>See all Success Story<img src="./images/others/right-arrow (1).png" width="20px" alt=""></button></a>
      </div>
    </section>



  </main>





  <footer><?php include './includes/footer.php' ?></footer>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>