<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UCF</title>

    <link rel="stylesheet" href="./css/login.css">
    <!-- bootstrap and fontawesome link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/744d788fd4.js" crossorigin="anonymous"></script>


</head>


<body>

    <section class="loginBox mt-5">
        <div class="loginContainer shadow">
            <div class="row text-center mb-3">
                <h1>Login</h1>

                <?php if (isset($_GET['error'])) { ?>
                    <p class="error mt-3"><?php echo $_GET['error']; ?></p>
                <?php } ?>
            </div>
            <br>
            <form action="login-process.php" method="post">
                <div class="row">
                    <div class="col-md-12">
                        <input class="inputStyle" type="text" name="uniId" placeholder="University ID">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <input class="inputStyle" type="password" name="password" placeholder="Password" required>
                    </div>
                </div>
                <br>
                <div class="row ">
                    <div class="col-sm-12 d-flex justify-content-between link">
                        <a href="#">Forget password</a>
                        <a href="./signup.php">Signup</a>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-12 text-center">
                        <input type="submit" value="Submit">
                    </div>
                </div>
            </form>
        </div>

    </section>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>