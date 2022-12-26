<?php
include '../includes/db/dbConnection.php';
session_start();
$uniId = $_SESSION['uniId'];
$loggedIn = $_GET['loggedIn'];
$userId = $_SESSION['userId'];
// echo $userId;
// echo $loggedIn;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $campaignId = $_POST['campId'];
  
  $sql3 = "UPDATE campaign SET camp_status=3 WHERE user_id = '$uniId' AND campaign_id = '$campaignId'";
  $result3 = mysqli_query($conn, $sql3);
  if ($result3) {
    echo "<script>alert('Withdraw successful!')</script>";
  } else {
    echo "<script>alert('Please try again!')</script>";
  }
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>UCF</title>
  <!-- local css links -->
  <link rel="stylesheet" href="./myCampaign.css">
  <link rel="stylesheet" href="../css/nav.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
  <!-- bootstrap and fontawesome link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script src="../js/script.js"></script>
  <script src="https://kit.fontawesome.com/744d788fd4.js" crossorigin="anonymous"></script>


</head>

<body>
  <header class="container">
    <div class="navigation">
      <div class="leftLogo">
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
                <a class="mx-3 " href="./profile.php?loggedIn=true">View Profile</a>
              <?php } else { ?>
                <a class="mx-3 " href="../login.php">View Profile</a>
              <?php } ?>

            </div>
            <hr>
            <div class="viewProfile d-flex align-items-center ">
              <i class="fa-sharp fa-solid fa-layer-group"></i>

              <?php if ($loggedIn == 'true') { ?>
                <a class="mx-3 " href="./myCampaign.php?loggedIn=true">My campaign</a>
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
  $sql = "SELECT * FROM campaign WHERE user_id = '$uniId'";
  $result = mysqli_query($conn, $sql);
  ?>
  <section class="container">
    <?php
    if (mysqli_num_rows($result) > 0) {
      while ($row = $result->fetch_assoc()) {
        $path = '../images/CampaignImages/';
    ?>
        <div class="campaignContainer mt-5">
          <div class="campaignStatus">
          <?php
                if ($row['camp_status'] == 2) {
                ?>
                <p class="pendingP">Pending</p>
                <?php } else if($row['camp_status'] == 1) {
                ?>
                <p class="activeP">Active</p>
                <?php } else if($row['camp_status'] == 0){
                ?>
                <p class="">Canceled</p>
                <?php } else {
                ?>
                <p class="finishP">Finished</p>
                <?php }
                ?>
          </div>
          <div class="row">
            <div class="col imgContainer">
              <img src="<?php echo $path . $row['camp_img'] ?>" alt="">
            </div>
          </div>

          <div class="row my-5">
            <div class="col ">
              <h4><?php echo $row['camp_name'] ?></h4>
            </div>
          </div>
          <hr>
          <div class="row mt-4">
            <div class="col">
              <p><?php echo $row['camp_desc'] ?></p>
            </div>
          </div>

          <div class="row mt-3">
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

          <div class="row mt-5">
            <div class="col text-center ">
              <form action="" method="post">
                <?php
                if ($row['camp_status'] != 3) {
                ?>
                <input class="d-none" type="text" name="campId" value="<?php echo $row['campaign_id']?>">
                  <button class="withdrawBtn my-3">Withdraw</button>
                <?php } else {
                ?>
                  <button class="withdrawnBtn my-3 " disabled>Withdrawn</button>
                <?php }
                ?>

              </form>
            </div>
          </div>
        </div>
      <?php } ?>


    <?php } else {
    ?>
      <h1>You Don't have any campaign running</h1>

    <?php }
    ?>

  </section>


  <?php
  function updateCampaignStatus()
  {
    echo 'Called';
  }
  ?>



  <footer><?php include '../includes/footer.php' ?></footer>

  <script>
    const tAmount = parseInt(document.getElementById('tAmount').innerHTML);
    const progressAmount = parseInt(document.getElementById('progressAmount').innerHTML);
    console.log(progressAmount);
    if (progressAmount >= tAmount) {
      document.getElementById('progress').style.width = '100%';
      document.getElementById('progressAmount').innerHTML = tAmount;
    } else {
      const progressPercentage = (progressAmount / tAmount) * 100;
      console.log(progressPercentage);
      document.getElementById('progress').style.width = progressPercentage + "%";
    }
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>