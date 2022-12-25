<?php
session_start();
$uniId = $_SESSION['uniId'];
$loggedIn = $_GET['loggedIn'];
include '../includes/db/dbConnection.php';
// echo $loggedIn;

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
  $fName = validate($_POST['fName']);
  $lName = validate($_POST['lName']);
  $email = validate($_POST['email']);
  $phone = validate($_POST['phone']);
  $userDepartment = validate($_POST['userDepartment']);
  $userDesignation = validate($_POST['userDesignation']);
  $userId = $_SESSION['userId'];


  $flag = $_FILES['image']['name'];
  if (empty($flag)) {

    $sql = "UPDATE `user` SET `f_name` = '$fName' , `l_name` = '$lName', `u_department` = '$userDepartment', 
    `u_phone` = '$phone', `u_email` = '$email',  `u_designation` = '$userDesignation' WHERE `id` = $userId";

    $result = mysqli_query($conn, $sql);
    if ($result) {
      echo "<script>alert('Your profile has been updated!')</script>";
      $_SESSION['fName'] = $fName;
      $_SESSION['lName'] = $lName;
      $_SESSION['userDepartment'] = $userDepartment;
      $_SESSION['userDesignation'] = $userDesignation;
      $_SESSION['email'] = $email;
      $_SESSION['phone'] = $phone;
    }
  } else {
    $photo_name = $_FILES["image"]["name"];
    $photo_tmp_name = $_FILES["image"]["tmp_name"];
    $photo_size = $_FILES["image"]["size"];
    $photo_new_name = rand() . $photo_name;
    $sql = "UPDATE `user` SET `f_name` = '$fName' , `l_name` = '$lName', `u_department` = '$userDepartment', 
      `u_phone` = '$phone', `u_email` = '$email', `u_profile` = '$photo_new_name', `u_designation` = '$userDesignation' WHERE `id` = $userId";

    $result = mysqli_query($conn, $sql);
    if ($result) {
      echo "<script>alert('Your profile has been updated! FROM')</script>";
      move_uploaded_file($photo_tmp_name, "../images/userProfilePic/" . $photo_new_name);
      $_SESSION['fName'] = $fName;
      $_SESSION['lName'] = $lName;
      $_SESSION['userDepartment'] = $userDepartment;
      $_SESSION['userDesignation'] = $userDesignation;
      $_SESSION['email'] = $email;
      $_SESSION['phone'] = $phone;
      $_SESSION['userProfile'] = $photo_new_name;
    }
  }
}




function validate($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
include '../includes/db/dbConnection.php';
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>UCF</title>
  <!-- local css links -->

  <link rel="stylesheet" href="./profile.css">
  <link rel="stylesheet" href="../css/nav.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
  <!-- bootstrap and fontawesome link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script src="../js/script.js"></script>
  <script src="https://kit.fontawesome.com/744d788fd4.js" crossorigin="anonymous"></script>

  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

  <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#myTable').DataTable();
    });
  </script>


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
                                        <?php } ?>
          </button>
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

  <!-- update profile Modal -->

  <section class="container displayStyle">
    <div id="updateModal" class=" cModal">
      <div class="mHeader d-flex">
        <div>
          <h3>Update Profile</h3>
        </div>
        <div>
          <img id="closeBtn" src="../images/others/cancel.png" width="30px" alt="">
        </div>
      </div>
      <div class="mBody">
        <form method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col">
              <input type="text" id="fName" name="fName" placeholder="First Name">
            </div>
          </div>
          <div class="row">
            <div class="col">
              <input type="text" id="lName" name="lName" placeholder="Last Name">
            </div>
          </div>
          <div class="row">
            <div class="col">
              <input type="email" id="email" name="email" placeholder="Email">
            </div>
          </div>

          <div class="row">
            <div class="col">
              <input type="text" id="phone" name="phone" placeholder="Phone">
            </div>
          </div>
          <div class="row">
            <div class="col">
              <select class="selectStyle" name="userDepartment" id="userDepartment">
                <option selected value="Not Selected">Select Your Department</option>
                <option value="CSE">CSE</option>
                <option value="EEE">EEE</option>
                <option value="BBA">BBA</option>
                <option value="CIVIL">CIVIL</option>
                <option value="MJ">MJ</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <select class="selectStyle" name="userDesignation" id="userDesignation">
                <option selected value="Not Selected">Select Your Designation</option>
                <option value="Student">Student</option>
                <option value="Faculty">Faculty</option>
                <option value="Staff">Staff</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <input type="file" name="image" accept="image/*">
            </div>
          </div>
          <hr>
          <div class="text-center">
            <input type="submit" name="submit" value="Update">
          </div>
        </form>
      </div>
    </div>
  </section>


  <section class="container">
    <div class="row">
      <div class="col-sm-4 leftContainer">
        <div class="userImage mt-3">
          <?php
          // echo $_SESSION['userProfile'];
          if ($_SESSION['userProfile'] == 'NULL') {
          ?>
            <img src="../images/others/man.png" width="70px" alt="">
          <?php } else { ?>
            <img src="<?php echo '../images/userProfilePic/' . $_SESSION['userProfile'] ?> " width="80px" alt="">
          <?php } ?>

        </div>




        <div class="userInfo mt-5 mx-3">
          <p id="pName">Name : <?php echo $_SESSION['fName'] . " " . $_SESSION['lName'] ?> </p>
          <p id="pId">University ID : <?php echo $_SESSION['uniId'] ?></p>
          <p id="pEmail">Email : <?php echo $_SESSION['email'] ?></p>
          <p id="pPhone">Phone : <?php echo $_SESSION['phone'] ?></p>
          <p id="pDept">Department : <?php echo $_SESSION['userDepartment'] ?></p>
          <p id="pDes">Designation : <?php echo $_SESSION['userDesignation'] ?></p>
        </div>
        <button id="updateProfile">Update Profile</button>
      </div>
      <div class="col-sm-8 rightContainer">
        <div class=" mt-5 d-flex justify-content-center">
          <h2>All Donation</h2>
          <img class="mx-5" src="../images/others/help.png" width="50px" alt="">
        </div>
        <div class="mt-5">
          <table class="table " id="myTable">
            <thead>
              <tr>
                <th scope="col">Campaign name</th>
                <th scope="col">Amount</th>
                <th scope="col">Date</th>

              </tr>
            </thead>

            <tbody>

              <?php
              $sql = "SELECT * FROM campaign INNER JOIN donation ON campaign.campaign_id=donation.campaign_id WHERE donation.doner_id = '$uniId';";
              $result = mysqli_query($conn, $sql);
              if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                  echo "<tr>
                <td>" . $row['camp_name'] . "</td>
                <td>" . $row['amount'] . "</td>
                <td>" . $row['date'] . "</td>
            </tr>";
                }
              }
              ?>

            </tbody>

          </table>
        </div>
      </div>
    </div>


  </section>


  <footer><?php include '../includes/footer.php' ?></footer>


  <script>
    let pName = document.getElementById('pName').innerText;
    let pEmail = document.getElementById('pEmail').innerText;
    let pPhone = document.getElementById('pPhone').innerText;
    let pDept = document.getElementById('pDept').innerText;
    let pDes = document.getElementById('pDes').innerText;

    const result = pName.trim().split(/\s+/);
    const firstName = result[2];
    const lastName = result[3];

    const result2 = pEmail.trim().split(/\s+/);
    pEmail = result2[2];

    const result3 = pPhone.trim().split(/\s+/);
    pPhone = result3[2];

    const result4 = pDept.trim().split(/\s+/);
    pDept = result4[2];
    const result5 = pDes.trim().split(/\s+/);
    pDes = result5[2];


    console.log(firstName, lastName, pEmail, pPhone, pDept, pDes)

    const update = document.getElementById('updateProfile');
    update.addEventListener('click', () => {
      const updateModal = document.getElementById('updateModal');
      updateModal.style.display = 'block';

      const fName = document.getElementById('fName');
      const lName = document.getElementById('lName');
      const email = document.getElementById('email');
      const phone = document.getElementById('phone');
      const userDepartment = document.getElementById('userDepartment');
      const userDesignation = document.getElementById('userDesignation');

      fName.value = firstName;
      lName.value = lastName;
      email.value = pEmail;
      phone.value = pPhone;
      userDepartment.value = pDept;
      userDesignation.value = pDes;


    })

    document.getElementById('closeBtn').addEventListener('click', () => {
      document.getElementById('updateModal').style.display = "none";
    })
  </script>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>