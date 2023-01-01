<?php
session_start();
include '../../includes/db/dbConnection.php';
$loggedIn = $_GET['loggedIn'];


?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>UCF</title>
  <link rel="stylesheet" href="./success.css">


  <link rel="stylesheet" href="../../css/nav.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script src="../../js/script.js"></script>
  <script src="https://kit.fontawesome.com/744d788fd4.js" crossorigin="anonymous"></script>


</head>


<body>

  <header class="">
    <div class="navigation">
      <div class="leftLogo mx-5">
        <?php if ($loggedIn == 'true') { ?>
          <a href="../../index.php?loggedIn=true">
            <h1>UIUCF</h1>
          </a>
        <?php } else { ?>
          <a href="../../index.php?loggedIn=false">
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
  <br>
  <section class="container">
    <div class="startFund my-5">
      <h1>Share your story and start your own fundraising <br> journey with<span style="color:#F78924; font-style:italic; font-weight:bold;"> UIUCF!</span></h1>
      <br>
      <?php if ($loggedIn == 'true') { ?>
        <a href="../startCampaign/startCampaign.php?loggedIn=true">Start Now <img src="../../images/others/right-arrow.png" width="30px" alt=""> </a>
      <?php } else { ?>
        <a href="../../login.php">Start Now <img src="../../images/others/right-arrow.png" width="30px" alt=""> </a>
      <?php } ?>

    </div>


  </section>
  <br>

  <?php
  $conn = new mysqli('localhost', 'root', '', 'fund_future');
  $sql = "SELECT * FROM campaign WHERE camp_status = 3";

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
              <img src="<?php echo '../../images/CampaignImages/' . $row['camp_img']; ?>" alt="">
            </div>
            <div class="textGroup mt-3">
              <h3>Campaigner ID: <?php echo $row['user_id'] ?></h3>


              <hr>
              <h4><?php echo $row['camp_name'] ?></h4>
              <p><?php echo $row['camp_desc'] ?></p>
              <div class="d-flex">
                <strong>$ <?php
                          $cID = $row['campaign_id'];
                          $sql2 = "SELECT SUM(amount) FROM donation WHERE campaign_id = '$cID';";
                          $result2 = $conn->query($sql2);
                          while ($row2 = mysqli_fetch_array($result2)) {
                            echo $row2['SUM(amount)'];
                          }
                          ?>
                </strong>
                <strong class="mx-2">raised of </strong>
                <strong>$ <?php echo $row['target_amount'] ?> goal</strong>

                <div class="progressParent mt-4">
                  <div id="progress" class="progressChild">
                    
                  </div>
                </div>

              </div>

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

  <footer class=" mt-5">

    <?php include '../../includes/footer.php' ?>
  </footer>


  <script>
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