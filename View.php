<?php
include "includes/config.php";
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>View Page</title>
</head>
<body>

    <div class="container mt-5">
    <img src="assets/logo-new.png" >
    <br/><br/><br/>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Client Details 
                            <a href="Admin_index.php" class="btn btn-danger float-end" style="background-color:#111470">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $crudid = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM crud WHERE id='$crudid' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $crud = mysqli_fetch_array($query_run);
                                ?>
                                
                                    <div class="mb-3">
                                        <label>Client Name</label>
                                        <p class="form-control">
                                            <?=$crud['Client_name'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Client Code</label>
                                        <p class="form-control">
                                            <?=$crud['Client_code'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Email</label>
                                        <p class="form-control">
                                            <?=$crud['email'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Date</label>
                                        <p class="form-control">
                                            <?=$crud['datepicker'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Contact No</label>
                                        <p class="form-control">
                                            <?=$crud['Contact_no'];?>
                                        </p>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label>Deposit Amount</label>
                                        <p class="form-control">
                                            <?=$crud['Deposit_Amount'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Amount in Words</label>
                                        <p class="form-control">
                                            <?=$crud['Amount_in_Words'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Bank</label>
                                        <p class="form-control">
                                            <?=$crud['Select_Bank'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Reference No.</label>
                                        <p class="form-control">
                                            <?=$crud['Reference_no'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Other Known Details</label>
                                        <p class="form-control">
                                            <?=$crud['Other_Known_Details'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Name</label>
                                        <p class="form-control">
                                            <?=$crud['Type_name'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Informed Delivered By</label>
                                        <p class="form-control">
                                            <?=$crud['Informed_Delivered_By'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Proof</label>
                                        <p class="form-control">
                                            <?=$crud['Proof'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Status</label>
                                        <p class="form-control">
                                            <?=$crud['Status'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3"><label>Remarks</label><p class="form-control"><?=$crud['Remarks'];?>
                                        </p>
                                    </div>

                                <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>