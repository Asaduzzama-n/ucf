<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UCF</title>

    <link rel="stylesheet" href="./css/signup.css">
    <!-- bootstrap and fontawesome link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/744d788fd4.js" crossorigin="anonymous"></script>


</head>
<style>
    body {
        background-color: #FEE7D1;
    }
</style>

<body>



    <section class="customSignUpContainer shadow">
        <h1>Sign up</h1>

        <!-- Error and success message will show here -->




        <div class="d-flex boxContainer ">
            <div class="signupContainer ">
                <form action="signup-process.php" method="post" enctype="multipart/form-data">
                    <?php if (isset($_GET['error'])) { ?>
                        <p class="error"><?php echo $_GET['error']; ?></p>
                    <?php } ?>

                    <?php if (isset($_GET['success'])) { ?>
                        <p class="success"><?php echo $_GET['success']; ?></p>
                    <?php } ?>

                    <div class="row">
                        <div class="col-sm-6">
                            <?php if (isset($_GET['fName'])) { ?>
                                <input class="inputStyle" type="text" id="fName" name="fName" placeholder="First Name" value="<?php echo $_GET['fName']; ?>">
                            <?php } else { ?>
                                <input class="inputStyle" type="text" id="fName" name="fName" placeholder="First Name">
                            <?php } ?>
                        </div>
                        <div class="col-sm-6">
                            <?php if (isset($_GET['lName'])) { ?>
                                <input class="inputStyle" type="text" id="lName" name="lName" placeholder="Last Name" value="<?php echo $_GET['lName']; ?>">
                            <?php } else { ?>
                                <input class="inputStyle" type="text" id="lName" name="lName" placeholder="last Name">
                            <?php } ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <?php if (isset($_GET['email'])) { ?>
                                <input onclick="validation('email');" class="inputStyle"  type="email" id="email" name="email" placeholder="Email" value="<?php echo $_GET['email']; ?>">
                            <?php } else { ?>
                                <input onclick="validation('email');" class="inputStyle" type="email" id="email" name="email" placeholder="Email">
                            <?php } ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <?php if (isset($_GET['phone'])) { ?>
                                <input class="inputStyle" type="text" id="phone" name="phone" placeholder="Phone" value="<?php echo $_GET['phone']; ?>">
                            <?php } else { ?>
                                <input class="inputStyle" type="text" id="phone" name="phone" placeholder="Phone">
                            <?php } ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">

                            <?php if (isset($_GET['uniId'])) { ?>
                                <input class="inputStyle" type="text" id="uniId" name="uniId" placeholder="University ID" value="<?php echo $_GET['uniId']; ?>">
                            <?php } else { ?>
                                <input class="inputStyle" type="text" id="uniId" name="uniId" placeholder="University ID">
                            <?php } ?>
                        </div>
                    </div>
                    <div class="row text-start">
                        <div class="col-sm-6">

                            <?php if (isset($_GET['userDepartment'])) { ?>
                                <select class="selectCustomStyle" name="userDepartment" id="userDepartment">
                                    <option selected value="0">Chose Your Department</option>
                                    <option value="<?php echo $_GET['userDepartment']; ?>">CSE</option>
                                    <option value="<?php echo $_GET['userDepartment']; ?>">BBA</option>
                                    <option value="<?php echo $_GET['userDepartment']; ?>">EEE</option>
                                    <option value="<?php echo $_GET['userDepartment']; ?>">CIVIL</option>
                                    <option value="<?php echo $_GET['userDepartment']; ?>">MJ</option>
                                </select>
                            <?php } else { ?>
                                <select class="selectCustomStyle" name="userDepartment" id="userDepartment">
                                    <option selected value="Not Selected">Chose Your Department</option>
                                    <option value="CSE">CSE</option>
                                    <option value="BBA">BBA</option>
                                    <option value="EEE">EEE</option>
                                    <option value="CIVIL">CIVIL</option>
                                    <option value="MJ">MJ</option>
                                </select>
                            <?php } ?>


                        </div>
                        <div class="col-sm-6">


                            <?php if (isset($_GET['userDesignation'])) { ?>
                                <select class="selectCustomStyle" name="userDesignation" id="userDesignation">
                                    <option selected value="Not Selected">Select Your Designation</option>
                                    <option value="<?php echo $_GET['userDesignation']; ?>">Student</option>
                                    <option value="<?php echo $_GET['userDesignation']; ?>">Faculty</option>
                                    <option value="<?php echo $_GET['userDesignation']; ?>">Staff</option>
                                </select>
                            <?php } else { ?>
                                <select class="selectCustomStyle" name="userDesignation" id="userDesignation">
                                    <option selected value="Not Selected">Select Your Designation</option>
                                    <option value="Student">Student</option>
                                    <option value="Faculty">Faculty</option>
                                    <option value="Staff">Staff</option>
                                </select>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-sm-12 fileStyle  d-flex justify-start">

                            <?php if (isset($_GET['image'])) { ?>
                                <input type="file" name="image" accept="image/*" value="<?php echo $_GET['image']; ?>">
                            <?php } else { ?>
                                <input type="file" name="image" accept="image/*">
                            <?php } ?>


                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <input onclick="validation('password');" class="inputStyle" type="password" id="password" name="password" placeholder="Password">
                        </div>
                        <div class="col-sm-6">
                            <input onclick="validation('rePassword');" class="inputStyle" type="password" id="rePassword" name="rePassword" placeholder="Confirm Password">
                        </div>

                    </div>

                    <div class="row ">
                        <div class="col-12 d-flex justify-content-center">
                            <input type="submit" id="btn" name="submit" value="Signup">
                            <!-- <button type="submit">Signup</button> -->
                        </div>
                    </div>
                    <div class="row mt-5 loginBtn">
                        <a href="./login.php">Login</a>
                    </div>
                </form>
            </div>

        </div>
    </section>

    <script>
        const validation = (id) => {
            document.getElementById(id).addEventListener('input', (e) => {
                const field = document.getElementById(id);
                // console.log(e.target.value);
                const btn = document.getElementById('btn');
                if (id == 'password' || id == 'rePassword') {
                    if (/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/.test(e.target.value)) {
                        field.style.border = '2px solid green';
                        btn.disabled = false;

                    } else {
                        field.style.border = '2px solid red';
                        btn.disabled = true;
                    }
                } else {
                    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(e.target.value)) {
                        field.style.border = '2px solid green';
                        btn.disabled = false;

                    } else {
                        field.style.border = '2px solid red';
                        btn.disabled = true;
                    }
                }

            })
        }

        // document.getElementById('email').addEventListener('input', (e) => {
        //     const email = document.getElementById('email');

        //     if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(e.target.value)) {
        //         email.style.border = '2px solid green';
        //     } else {

        //         email.style.border = '2px solid red';

        //     }
        // })
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>