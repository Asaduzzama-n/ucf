<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="./dmodal.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
</head>

<body>
    <section class="modalContainer">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#campaignModal">
            Launch demo modal
        </button>

        <!-- Modal -->
        <div class="modal fade " id="campaignModal" tabindex="-1" aria-labelledby="campaignModalLabel" aria-hidden="true">
            <div class="modal-dialog modalBg">
                <div class="modal-content">
                    <div class="modal-header ">
                        <h1 class="modal-title fs-5" id="campaignModalLabel">
                            Donate
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- modal form will be here -->
                    <div class="modal-body ">
                        <div class="modalBox">
                            <form action="#">
                                <div class="row">
                                    <div class="col">
                                        <div class="pMethod1  d-flex justify-content-between align-items-center">
                                            <img src="../../../images/others/bkash_payment_logo.png" width="80%" alt="">
                                            <input type="radio" id="pMethod1" name="bkash" value="Bkash">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="pMethod2 d-flex justify-content-between align-items-center">
                                            <img src="../../../images/others/Rocket_payment_logo.jpg" width="80%" alt="">
                                            <input type="radio" id="pMethod2" name="rocket" value="Rocket">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <input type="number" id="dAmount" name="dAmount" placeholder="Donated Amount" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <input type="text" id="tId" name="tId" placeholder="Transaction ID" required>
                                    </div>
                                </div>
                                <br>
                                <hr>
                                <div class="row mt-3">
                                    <div class="col">
                                        <input type="submit" value="Submit" id="submit" name="submit">
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                    <!-- <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="button" class="btn btn-primary">
                            Save changes
                        </button>
                    </div> -->
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>