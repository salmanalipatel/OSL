
<?php
session_start();
include "includes/config.php";

if(!isset($_SESSION["username"]))
{
	header("location:login.php");
}
?>

<script>
function text(x) 
{
   if(x == 0)
   {
       document.getElementById("mycode").style.display = "block";
       //document.getElementById("MOD").value = "Bank";


       <?php $MOD = 'Bank_Transfer';?>
       alert("<?php echo $MOD; ?>");
   }
   else if(x == 1)
   {
       document.getElementById("mycode").style.display = "block";


       <?php $MOD = 'Cheque';?>
       alert("<?php echo $MOD; ?>");
   }
   else
   {
       document.getElementById("mycode").style.display = "none";
       <?php $MOD = 'Cash';?>
       alert("<?php echo $MOD; ?>");
   }
}
</script>


<?php


if (isset($_POST["submit"])) {
    
   

   $Client_name = $_POST['Client_name'];
   $Client_code = $_POST['Client_code'];
   $email = $_POST['email'];
   $datepicker = $_POST['datepicker'];
   $Contact_no = $_POST['Contact_no'];
   $MOD= $_POST['MOD'];
   $Deposit_Amount= $_POST['Deposit_Amount'];
   $Amount_in_Words= $_POST['Amount_in_Words'];
   $Select_bank= $_POST['Select_bank'];
   $Other_Known_Details= $_POST['Other_Known_Details'];
   $Type_name= $_POST['Type_name'];
   $Informed_Delivered_By= $_POST['Informed_Delivered_By'];
   $Proof= $_POST['Proof'];
   $remarks= $_POST['Remarks'];
   $Reference_no= $_POST['Reference_no'];
    
    
$location = "uploads/";
$target_file = $location.$_FILES['file']['name'];

if(move_uploaded_file($_FILES["file"]["tmp_name"], $target_file))
{


   $sql = "INSERT INTO `crud`(`id`, `Client_name`, `Client_code`, `email`, `datepicker`,`Contact_no`,`MOD`,`Deposit_Amount`,`Amount_in_Words`,`Select_bank`,`Other_Known_Details`,`Type_name`,`Informed_Delivered_By`,`Proof`,`remarks`,`Reference_no`) VALUES
                            (NULL,'$Client_name','$Client_code','$email','$datepicker','$Contact_no','$MOD','$Deposit_Amount','$Amount_in_Words','$Select_bank','$Other_Known_Details','$Type_name','$Informed_Delivered_By','$target_file','$remarks','$Reference_no')";

   $result = mysqli_query($con,$sql);

   if ($result) {
      header("Location: User_index.php?msg=New record created successfully");
       
   } else {
      echo "Failed: " . mysqli_error($con);
   }
}
else
{
    echo 'File not uploaded';
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

   <title>PHP CRUD Application</title>

   <style>
      label {
         display:inline;
      }
      .col.form-col {
         padding: 0px;
         padding-right: 15px;
      }

      .col.form-col:last-child {
          padding-right: 0px;
      }

      .col.form-col input, .form-col select, .col.form-col input, .form-col textarea {
    padding: 10px;
    border-radius: 10px;
    margin-top: 5px;
    border: 1px solid #ccc;
    color: #888 !important;
}
   .btn {
    font-size: 14px;
    border: none;
    text-transform: capitalize;
    padding: 10px 20px;
    margin-right: 5px;
    transition: all ease 500ms;
}
.form-control[type=file]:not(:disabled):not([readonly]) {
    padding-left: 15px;
}


.btn:hover {
    transition: all ease 500ms;
    background: #1e22ac !important;
}
textarea#Remarks {
    height: 100px;
}
/* .main-form-sec form {
    padding: 30px;
    background: #efefef;
    border-radius: 20px;
    box-shadow: 0px 0px 20px #dcdcdc;
    border: 1px solid #ccc;
} */
   </style>


</head>

<body>
   <!-- <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
      PHP Complete CRUD Application
   </nav> -->

   <div class="container">
      <div class="text-center mb-4">
      <img src="assets/logo-new.png" ><br/><br/><br/>
         <h3>Client Funds Deposit</h3>
         <!-- <p class="text-muted">Complete the form below to add a new user</p> -->
      </div>

      <div class="container d-flex justify-content-center main-form-sec">
         <form action="" method="post" enctype="multipart/form-data" style="width:50vw; min-width:300px;">
         
         <h5><b>Details of Client</b></h5>
         &nbsp;



            <div class="row mb-3 form-row">
               <div class="col form-col">
                  <label class="form-label">Client Name:</label>
                  <input type="text" class="form-control" name="Client_name" placeholder="Albert" required>
               </div>

               <div class="col form-col">
                  <label class="form-label">Client Code:</label>
                  <input type="Text" class="form-control" name="Client_code" placeholder="0000" required>
               </div>
            </div>

            <div class="row mb-3">
            <div class="col form-col">
               <label class="form-label">Email:</label>
               <input type="email" class="form-control" name="email" placeholder="name@example.com" required>
            </div>

            <div class="col form-col">
                  <label class="form-label">Contact No:</label>
                  <input type="text" class="form-control" name="Contact_no" placeholder="0000-0000000" required>
               </div>
            </div>
            

            &nbsp;
<!-- changing -->
            <h5><b>Details of Payment</b></h5>
            <br/>
            <div class="row mb-3">
            <div class="col form-col-checkboxs">
                 
                  <label>Mode of Deposit:</label>
                  &nbsp;  
              <br/>


<input type="radio" class="form-check-input" name="MOD" value="Bank_Transfer" onclick="text(0)"/>
               <label for="Bank_Transfer" class="form-input-label"><b>Bank Transfer</b></label>
               &nbsp;
<input type="radio" class="form-check-input" name="MOD" value="Cheque" onclick="text(1)"/>
               <label for="Cheque" class="form-input-label"><b>Cheque</b></label>
               &nbsp;
<input type="radio" class="form-check-input" name="MOD"  value="Cash" onclick="text(2)"/>
               <label for="Cash" class="form-input-label"><b>Cash </b></label>
               </div>
               
               <div class="col form-col">
                  <label class="datepicker">Date of Deposit:</label>
                  <input type="date" id="datepicker" class="form-control" name="datepicker" placeholder="Select Date" required>
               </div>
            </div>
            
            <div class="row mb-3">
            <div class="col form-col">
               <label class="form-label">Deposit Amount:</label>
               <input type="text" class="form-control" name="Deposit_Amount" placeholder="XXXXXX" required>
            </div>
            <div class="col form-col">
                  <label class="form-label">Deposit Amount in Words:</label>
                  <input type="text" class="form-control" name="Amount_in_Words" placeholder="Twenty five thousand" required>
               </div>
            </div>


           
    

            <br/>
            <h5><b>Depositing Bank Details</b></h5>
            <br/>

            
            <div class="row mb-3" id="mycode">

            <div class="col form-col" id="mycode">
                  <label class=""></label>
                  <input type="number" class="form-control" name="Reference_no" placeholder="Reference Number"  >
               </div>
               <div class="col form-col">
                  <label class="form-label"></label>
                  <input type="Text" class="form-control" name="Type_name" placeholder="Type Your Name (Incase of Others)" >
               </div>             
            </div>       
            <div class="row mb-3" id="mycode">
               <div class="col form-col">
                  <label class="form-label"></label>
                  <input type="text" class="form-control" name="Other_Known_Details" placeholder="Other Known Details of Receiving Bank (Enter here)" >
               </div>         
              <div class="col form-col">
                  <label class="Proof"></label>
                  <input type="file" class="form-control" id="file" name="file" placeholder="Upload Proof" required >
               </div>
            </div>
          
            <div class="row mb-3 form-col">
            <select id="Select_bank" value="" name="Select_bank" class="col" required >
            <option value="">Select Bank</option>
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
<div class="row mb-3 form-col">
            <select id="Select" value="" name="Informed_Delivered_By" class="col" placeholder="Informed Delivered By" required  >
            <option value="">Informed Delivered By</option>
            <option value="Client">Client</option>
            <option value="Staff Member">Staff Member</option>
            <option value="Others">Others</option>
            </select>
            <br/><br/>
</div>

            <div class="row mb-3 form-col">
            <label for="Remarks"></label>
    <textarea id="Remarks" name="Remarks"  placeholder="Remarks" height="400px"></textarea>

               
            </div>

               
        

            <div class="form-btn-box">
          <button type="submit" class="btn btn-success" name="submit" style="background-color:#111470">Update</button>
          <a href="logout.php" class="btn btn-danger" style="background-color:#111470">LogOut</a>
        </div>
      </form>
    </div>
  </div>

   <!-- Bootstrap -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>
