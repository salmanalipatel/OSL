<?php
include "includes/config.php";
$id = $_GET["id"];
if (isset($_POST["submit"])) {
  $Client_name = $_POST['Client_name'];
  $Client_code = $_POST['Client_code'];
  $email = $_POST['email'];
  $Contact_no = $_POST['Contact_no'];
  $Status = $_POST['Status'];
  $datepicker = $_POST['datepicker'];

  $MOD = $_POST['MOD'];
  $Deposit_Amount = $_POST['Deposit_Amount'];
  $Amount_in_Words = $_POST['Amount_in_Words'];
  $Select_bank = $_POST['Select_bank'];
  $Reference_no = $_POST['Reference_no'];
  $Other_Known_Details = $_POST['Other_Known_Details'];
  $Type_name = $_POST['Type_name'];
  $Informed_Delivered_By = $_POST['Informed_Delivered_By'];
  $Proof = $_POST['Proof'];
  $Status = $_POST['Status'];
  $Remarks = $_POST['Remarks'];

  
  

 


  $sql = "UPDATE `crud` SET `Client_name`='$Client_name',`Client_code`='$Client_code',`email`='$email',`Contact_no`='$Contact_no',`Status`='$Status',`datepicker`='$datepicker',
  `MOD`='$MOD',`Deposit_Amount`='$Deposit_Amount',`Amount_in_Words`='$Amount_in_Words',`Select_bank`='$Select_bank',`Reference_no`='$Reference_no',`Other_Known_Details`='$Other_Known_Details',
  `Type_name`='$Type_name',`Informed_Delivered_By`='$Informed_Delivered_By',`Proof`='$Proof',`Remarks`='$Remarks' WHERE id = $id";

  $result = mysqli_query($con, $sql);

  if ($result) {
      
       $sql = "SELECT * FROM `crud` WHERE id = $id LIMIT 1";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
      
      $from = "donotreply@osl.com.pk";
$to = "salman.h@aptechsite.net";

$subject = "Testing";
$message = "<h2>Data you submited to OSL</h2> Client Name: ".$row['Client_name']. "<br> Client Code: " .$row['Client_code']. "<br> Client Email: " .$row['email']. "<br> Client Contact: ". $row['Contact_no']. "<br> Mode of Diposit: " .$row['MOD']. "<br> Date: " .$row['datepicker']. "<br> Diposited Amount: " .$row['Deposit_Amount']. "<br> Amount In Words: " .$row['Amount_in_Words']. "<br> Reference Number: " .$row['Reference_no']. "<br> Type Name: " .$row['Type_name']. "<br> Other Details: " .$row['Other_Known_Details']. "<br> Proof: " .$row['Proof']. "<br> Bank: " .$row['Select_Bank']. "<br> Infomred by: " .$row['Informed_Delivered_By']. "<br> Status: " .$row['Status']. "<br> Remarks: " .$row['Remarks'];
$headers = "From:" . $from;
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

mail($to,$subject,$message,$headers);
      
    header("Location: Admin_index.php?msg=Data updated successfully");
  } else {
    echo "Failed: " . mysqli_error($con);
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>PHP Application</title>
</head>

<body>
  <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
   
  </nav>

  <div class="container">
    <div class="text-center mb-4">
    <img src="assets/logo-new.png">
<br/><br/><br/>
      <h3>Edit User Information</h3>
      <p class="text-muted">Click update after changing any information</p>
    </div>

    <?php
    $sql = "SELECT * FROM `crud` WHERE id = $id LIMIT 1";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>
    <div class="container d-flex justify-content-center">
      <form action="" method="post" style="width:50vw; min-width:300px;">
        <h5><b>Details of Client</b></h5>
         &nbsp;
            <div class="row mb-3">
               <div class="col">
                  <label class="form-label">Client Name:</label>
                  <input type="text" class="form-control" name="Client_name" placeholder="Albert" required value="<?php echo $row['Client_name']; ?>">
               </div>

               <div class="col">
                  <label class="form-label">Client Code:</label>
                  <input type="number" class="form-control" name="Client_code" placeholder="0000" required  value="<?php echo $row['Client_code']; ?>">
               </div>
            </div>

            <div class="row mb-3">
            <div class="col">
               <label class="form-label">Email:</label>
               <input type="email" class="form-control" name="email" placeholder="name@example.com" required  value="<?php echo $row['email']; ?>">
            </div>

            <div class="col">
                  <label class="form-label">Contact No:</label>
                  <input type="text" class="form-control" name="Contact_no" placeholder="0000-0000000" required  value="<?php echo $row['Contact_no']; ?>">
               </div>
            </div>
          
            &nbsp;
      
            <h5><b>Details of Payment</b></h5>
            <br/>
            <div class="row mb-3">
            <div class="col">
                 
                  <label>Mode Of Deposit:</label>
                  &nbsp;  
              <br/>
                <input  type="radio" class="form-check-input" name="MOD" id="Bank_Transfer"  value="Bank" <?php if($row['MOD']=="Bank") {echo "checked";} ?> />
               <label for="Bank_Transfer" class="form-input-label"><b>Bank Transfer</b></label>
               &nbsp;
               <input type="radio" class="form-check-input" name="Cheque" id="Cheque" value="Cheque" <?php if($row['MOD']=="Cheque") {echo "checked";} ?> />
               <label for="Cheque" class="form-input-label"><b>Cheque</b></label>
               &nbsp;
               <input type="radio" class="form-check-input" name="Cash" id="Cash" value="Cash" <?php if($row['MOD']=="Cash") {echo "checked";} ?> />
               <label for="Cash" class="form-input-label"><b>Cash </b></label>
               </div>
               <div class="col">
                  <label class="datepicker">Date Of Deposit:</label>
                  <input type="date" id="datepicker" class="form-control" name="datepicker" placeholder="Select Date" required value="<?php echo $row['datepicker']; ?>">
               </div>
            </div>

            <div class="row mb-3">
            <div class="col">
               <label class="form-label">Deposit Amount:</label>
               <input type="text" class="form-control" name="Deposit_Amount" placeholder="XXXXXX" required  value="<?php echo $row['Deposit_Amount']; ?>">
            </div>
            <div class="col">
                  <label class="form-label">Deposit Amount In Words:</label>
                  <input type="text" class="form-control" name="Amount_in_Words" placeholder="Twenty five thousand" required value="<?php echo $row['Amount_in_Words']; ?>">
               </div>
            </div>

            <br/>
            <h5><b>Depositing Bank Details</b></h5>
            <br/>

            <div class="row mb-3" id="mycode">

            <div class="col" id="mycode">
                  <label class="Dropdown_List"></label>
                  <input type="Text" class="form-control" name="Reference_no" placeholder="Reference no" value="<?php echo $row['Reference_no']; ?>">
               </div>
               <div class="col">
                  <label class="form-label"></label>
                  <input type="Text" class="form-control" name="Type_name" placeholder="Type Your Name (Incase of Others)" value="<?php echo $row['Type_name']; ?>">
               </div>             
            </div>       
            <div class="row mb-3" id="mycode">
               <div class="col">
                  <label class="form-label"></label>
                  <input type="text" class="form-control" name="Other_Known_Details" placeholder="Other Known Details of Receiving Bank (Enter here)" value="<?php echo $row['Other_Known_Details']; ?>">
               </div>         
              <div class="col">
                  <label class="Proof"></label>
                  <input type="file" class="form-control" name="Proof" placeholder="Upload Proof" required value="<?php echo $row['Proof']; ?>">
               </div>
            </div>
          
            <div class="row mb-3">
            <select id="Select_bank" class="col"">
            <option value=""><?php echo $row['Select_Bank']; ?></option>
            <option value="ABL">ABL Client A/c (PK21ABPL0010001297190027)</option>
            <option value="BAFL">BAHL Client A/c (PK04BAHL1012008100630101)</option>
            <option value="BAHL">BAHL Client A/c (PK04BAHL1012008100630101)</option>

            <option value="BIPL">BIPL Client A/c (PK64BKIP0000020112901116)</option>
            <option value="HBL">HBL Client A/c (PK35HABB0000357900097303)</option>
            <option value="JSBL">JSBL Client A/c (PK20JSBL9005000000546532)</option>
            <option value="MCB">MCB Client A/c (PK69MUCB0732929291000801)</option>
            <option value="MEBL">MEBL Client A/c (PK61MEZN0099090101601911)</option>
            <option value="UBL">UBL Client A/c (PK91UNIL0109000218370401)</option>


            </select>
            <br/><br/>
</div>
<div class="row mb-3">
            <select id="Select" value="" name="Informed_Delivered_By" class="col" placeholder="Informed Delivered By" required >
            <option><?php echo $row['Informed_Delivered_By']; ?></option>
            <option value="Client">Client</option>
            <option value="Staff Member">Staff Member</option>
            <option value="Others">Others</option>
            </select>
            <br/><br/>
</div>
<div class="row mb-3">
            <select id="Status" value="" name="Status" class="col" required value="<?php echo $row['Status']; ?>">
            <option value="">Status</option>
            <option value="Pending">Pending</option>
            <option value="Approved">Approved</option>
            <option value="Disable">Disable</option>
            </select>
            <br/><br/>
</div>






            <div class="row mb-3">
            <label for="Remarks"></label>
    <textarea id="Remarks" name="Remarks"  placeholder="Remarks" value="<?php echo $row['Remarks'];?>"></textarea>

               
            </div>


                                                                            <!-- changes end -->


      
   <!-- Bootstrap -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>


        <div>
          <button type="submit" class="btn btn-success" name="submit" style="background-color:#111470">Update</button>
          <a href="Admin_index.php" class="btn btn-danger" style="background-color:#111470">Cancel</a>
        </div>
      </form>
    </div>
  </div>


  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>