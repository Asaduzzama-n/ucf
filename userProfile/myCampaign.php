<?php
session_start();
$uniId = $_SESSION['uniId'];
$loggedIn = $_GET['loggedIn'];
// echo $loggedIn;



include '../includes/db/dbConnection.php';
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

  <section class="container">
    <div class="campaignContainer">
      <div class="row">
        <div class="col imgContainer">
          <img src="../images/others/campaign.png" alt="">
        </div>
      </div>

      <div class="row">
        <div class="col mt-5">
          <h4>Campaign Name</h4>
        </div>
        <hr>
      </div>
      <div class="row">
        <div class="col">
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
            Neque libero obcaecati dignissimos odit aut amet dolor eveniet soluta 
            id minima deleniti ducimus, non modi fuga maiores, ex molestiae, nulla 
            iste. Numquam ipsam amet architecto minima cumque, mollitia et ad
             accusamus non placeat. Magni, consequatur. Tempore vero aliquam modi 
             nulla temporibus?</p>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <h5>Raised of goal</h5>
          <div class="progressBar ">
            <div class="childBar">
            </div>
          </div>
        </div>
      </div>
              
      <div class="row mt-5">
        <div class="col text-center ">
          <button class="withdrawBtn my-3">Withdraw</button>
        </div>
      </div>
    </div>

  </section>


  <footer><?php include '../includes/footer.php' ?></footer>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>