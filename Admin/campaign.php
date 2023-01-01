<?php
session_start();
include '../includes/db/dbConnection.php';

$id = $_GET['id'];
$approve = $_GET['approve'];
$cancel = $_GET['cancel'];

// echo $id . $approve . $cancel;
if ($approve == 'true' && $cancel == 'false') {
    $sql = " UPDATE campaign SET camp_status = 1 WHERE campaign_id = '$id'";
    $result = mysqli_query($conn,$sql);
    if($result){

    }else{
        echo 'error!';
    }
}
else{
    $sql2 = " UPDATE campaign SET camp_status = 0 WHERE campaign_id = '$id'";
    $result2 = mysqli_query($conn,$sql2);
    if($result2){

    }else{
        echo 'error!';
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
    <link rel="stylesheet" href="./css/dashboard.css">

    <link rel="stylesheet" href="./css/userRequest.css">
    <!-- bootstrap and fontawesome link -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">


    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">


    <script src="./js/script.js"></script>
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
        <nav>
            <div class="navStyle">
                <a href="./dashboard.php">
                    <h1>UIUCF</h1>
                </a>
                <h4>Welcome: adsadsa</h4>
            </div>
        </nav>
    </header>

    <section class="container tableContainer">
        <h2 class="my-5">Campaign List</h2>

        <div class="mt-5">
            <table class="table " id="myTable">
                <thead>
                    <tr>
                        <th scope="col">Campaign Name</th>
                        <th scope="col">Target Amount</th>
                        <th scope="col">Campaigner ID</th>
                        <th scope="col">Documents</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>




                    </tr>
                </thead>

                <tbody>

                    <?php
                    $sql = "SELECT * from campaign";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {

                            $status = '';
                            if ($row['camp_status'] == 1) {
                                $status = 'Active';
                                echo "<tr>
                        <td>" . $row['camp_name'] . "</td>
                        <td>" . $row['target_amount'] . "</td>
                        <td>" . $row['user_id'] . "</td>
                        <td> <a class='downloadDesign' href=download2.php?file=" . $row['camp_file'] . ">Download</a>  </td>
                        <td> <p class='activeStatus'> $status </p> </td>
                        <td class='d-flex'> 
                        <a class='approveDesign mx-3' href=./campaign.php?id=" . $row['campaign_id'] . "&approve=true&cancel=false>
                        <img src='../images/others/check (1).png' width='30px'>
                        </a> 
                        <a class='cancelDesign mx-3' href=./campaign.php?id=" . $row['campaign_id'] . "&approve=false&cancel=true>
                        <img src='../images/others/multiply.png' width='30px'>
                        </a> 
                        </td>

                        </tr>";
                            } else if ($row['camp_status'] == 2) {
                                $status = 'Pending';
                                echo "<tr>
                        <td>" . $row['camp_name'] . "</td>
                        <td>" . $row['target_amount'] . "</td>
                        <td>" . $row['user_id'] . "</td>
                        <td> <a class='downloadDesign' href=download2.php?file=" . $row['camp_file'] . ">Download</a>  </td>
                        <td> <p class='pendingStatus'> $status </p> </td>
                        <td class='d-flex'> 
                        <a class='approveDesign mx-3' href=./campaign.php?id=" . $row['campaign_id'] . "&approve=true&cancel=false>
                        <img src='../images/others/check (1).png' width='30px'>
                        </a> 
                        <a class='cancelDesign mx-3' href=./campaign.php?id=" . $row['campaign_id'] . "&approve=false&cancel=true>
                        <img src='../images/others/multiply.png' width='30px'>
                        </a> 
                        </td>
                        </tr>";
                            }  else if ($row['camp_status'] == 3) {
                                $status = 'Finished';
                                echo "<tr>
                        <td>" . $row['camp_name'] . "</td>
                        <td>" . $row['target_amount'] . "</td>
                        <td>" . $row['user_id'] . "</td>
                        <td> <a class='downloadDesign' href=download2.php?file=" . $row['camp_file'] . ">Download</a>  </td>
                        <td> <p class='finishStatus'> $status </p> </td>
                        <td class='d-flex'> 
                        <a class='approveDesign mx-3' href=./campaign.php?id=" . $row['campaign_id'] . "&approve=true&cancel=false>
                        <img src='../images/others/check (1).png' width='30px'>
                        </a> 
                        <a class='cancelDesign mx-3' href=./campaign.php?id=" . $row['campaign_id'] . "&approve=false&cancel=true>
                        <img src='../images/others/multiply.png' width='30px'>
                        </a> 
                        </td>
                        </tr>";
                            }else{
                                $status = 'Canceled';
                                echo "<tr>
                        <td>" . $row['camp_name'] . "</td>
                        <td>" . $row['target_amount'] . "</td>
                        <td>" . $row['user_id'] . "</td>
                        <td> <a class='downloadDesign' href=download2.php?file=" . $row['camp_file'] . ">Download</a>  </td>
                        <td> <p class='cancelStatus'> $status </p> </td>
                        <td class='d-flex'> 
                        <a class='approveDesign mx-3' href=./campaign.php?id=" . $row['campaign_id'] . "&approve=true&cancel=false>
                        <img src='../images/others/check (1).png' width='30px'>
                        </a> 
                        <a class='cancelDesign mx-3' href=./campaign.php?id=" . $row['campaign_id'] . "&approve=false&cancel=true>
                        <img src='../images/others/multiply.png' width='30px'>
                        </a> 
                        </td>
                        </tr>";
                            }


                        }
                    }
                    ?>

                </tbody>

            </table>
        </div>

    </section>



    <footer><?php include '../includes/footer.php' ?></footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>