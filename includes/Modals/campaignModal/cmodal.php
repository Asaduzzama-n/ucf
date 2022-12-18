<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="./cmodal.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
</head>

<body>
    <section class="modalContainer">
        <!-- Button trigger modal -->

        <!-- Modal -->
        <div class="modal fade " id="campaignModal" tabindex="-1" aria-labelledby="campaignModalLabel" aria-hidden="true">
            <div class="modal-dialog modalBg">
                <div class="modal-content">
                    <div class="modal-header ">
                        <h1 class="modal-title fs-5" id="campaignModalLabel">
                            Start Your Own Campaign
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- modal form will be here -->
                    <div class="modal-body ">
                        <div class="modalBox">
                            <form action="#">
                                <div class="row">
                                    <div class="col">
                                        <input type="text" id="cName" name="cName" placeholder="Campaign Name" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <input type="email" id="cEmail" name="cEmail" placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <input type="number" id="tAmount" name="tAmount" placeholder="Targeted Amount" required>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col">
                                        <textarea id="cDescription" name="cDescription" placeholder="Please describe your case" required></textarea>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col">
                                        <input type="text" id="cPhone" name="cPhone" placeholder="Phone Number" required>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col">
                                        <select class="selectCustomStyle" name="uDept" id="uDept" required>
                                            <option selected>Chose Your Department</option>
                                            <option value="1">CSE</option>
                                            <option value="2">BBA</option>
                                            <option value="3">EEE</option>
                                            <option value="4">CIVIL</option>
                                            <option value="5">MJ</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <input type="text" id="cID" name="cID" placeholder="University ID" required>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col">
                                        <small>Please Provide mentioned documents</small>
                                        <br>
                                        <small>***Student certificate/ID card/NID/</small>
                                        <br>
                                        <small>***Necessary documents regarding your campaign</small>
                                        <br>
                                        <small>***All the documents in one single pdf file</small>
                                        <br>
                                        <br>
                                        <label for="cFile">Choose file to upload (pdf)</label>
                                      
                                        <input class="mt-2" type="file" id="cFile" name="cFile" placeholder="Chose File" accept="application/pdf">
                                    </div>
                                </div>
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