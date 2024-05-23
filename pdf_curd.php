
<?php
require('fpdf/fpdf.php');
include 'includes/config.php';

// Function to generate PDF
function generatePDF($client_id) {
    global $con;

    // Check if $client_id is not empty
    if (empty($client_id)) {
        echo 'Error: Empty Stock ID';
        return;
    }
   
else
{
    


    // Use prepared statements to avoid SQL injection
    $sql = "SELECT * FROM crud WHERE id= ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $client_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        
        while ($row = $result->fetch_assoc()) {
            $pdf = new FPDF();
            $pdf->AddPage();

            $watermarkPath = 'watermark(4).png'; // Adjust the path to the actual watermark image file
            $pdf->Image($watermarkPath, 30, 60, 150, 150, 'PNG');  // Adjust the coordinates and dimensions

            
              
              
        $pdf->SetFont('Arial', 'B', 10);

        $pdf->SetFillColor(82,139,254);
        
        $pdf->SetTextColor(0, 0, 0); // Red
        // Add an image (adjust the path to the actual image file)
        $imagePath = 'logo-new.png';

        // Adjust the image coordinates and dimensions
        $pdf->Image($imagePath, 30, 20, 150, 25, 'PNG');
       

    
        $pdf->Ln(50);
        $pdf->SetX(40);
        $pdf->Cell(120, 10, 'Client Detail', 'B', 1, 'C',true);
        $pdf->SetX(40);
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->Cell(60, 9, 'Client NAME', 'B', 0,'S');
        $pdf->Cell(60, 9, $row['Client_name'], 'LB', 1,'S');
        $pdf->SetX(40);
        $pdf->Cell(60, 9, 'Client  CODE', 'B', 0,'S');
        $pdf->Cell(60, 9, $row['Client_code'], 'LB', 1,'S');
        $pdf->SetX(40);
        $pdf->Cell(60, 9, 'Email', 'B', 0,'S');
        $pdf->Cell(60, 9, $row['email'], 'LB', 1,'S');
        $pdf->SetX(40);
        $pdf->Cell(60, 9, 'Contact No ','B', 0,'S');
        $pdf->Cell(60, 9, $row['Contact_no'],'LB', 1,'S');
        $pdf->SetX(40);
        $pdf->Cell(60, 9, 'Status', 'B', 0,'S');
        $pdf->Cell(60, 9, $row['Status'],'LB', 1,'S');
        $pdf->SetX(40);
        $pdf->Cell(60, 9, 'Datepicker', 'B', 0,'S');
        $pdf->Cell(60, 9, $row['datepicker'], 'LB', 1,'S');
       
        $pdf->SetX(40);
        $pdf->Cell(60, 9, 'MOD', 'B', 0,'S');
        $pdf->Cell(60, 9, $row['MOD'], 'LB', 1,'S');
        $pdf->SetX(40);
        $pdf->Cell(60, 9, 'Deposit Amount', 'B', 0,'S');
        $pdf->Cell(60, 9, $row['Deposit_Amount'], 'LB', 1,'S');
        $pdf->SetX(40);
        $pdf->Cell(60, 9, 'Amount in Words', 'B', 0,'S');
        $pdf->Cell(60, 9, $row['Amount_in_Words'], 'LB', 1,'S');
        $pdf->SetX(40);
        $pdf->Cell(60, 9, 'Select Bank', 'B', 0,'S');
        $pdf->Cell(60, 9, $row['Select_Bank'], 'LB', 1,'S');
        $pdf->SetX(40);
        $pdf->Cell(60, 9, 'Other Known Details', 'B', 0,'S');
        $pdf->Cell(60, 9, $row['Other_Known_Details'], 'LB', 1,'S');
        $pdf->SetX(40);
        $pdf->Cell(60, 9, 'Type Name', 'B', 0,'S');
        $pdf->Cell(60, 9, $row['Type_name'], 'LB', 1,'S');
        $pdf->SetX(40);
        $pdf->Cell(60, 9, 'Informed Delivered By', 'B', 0,'S');
        $pdf->Cell(60, 9, $row['Informed_Delivered_By'], 'LB', 1,'S');
        $pdf->SetX(40);
        $pdf->Cell(60, 9, 'Proof', 'B', 0,'S');
        $pdf->Cell(60, 9, $row['Proof'], 'LB', 1,'S');
        $pdf->SetX(40);
        $pdf->Cell(60, 9, 'Remarks', 'B', 0,'S');
        $pdf->Cell(60, 9, $row['Remarks'], 'LB', 1,'S');
        $pdf->SetX(40);
        $pdf->Cell(60, 9, 'Reference No', 'B', 0,'S');
        $pdf->Cell(60, 9, $row['Reference_no'], 'LB', 1,'S');


            $pdfContent = $pdf->Output('', 'S');

            // Provide the PDF as a download
            header('Content-Type: application/pdf');
            header('Content-Disposition: attachment; filename="Oriental Securities (PVT) LTD.pdf"');
            echo $pdfContent;
        }
    } else {
        echo 'No data found for the specified .';
    }


    $stmt->close();
}
}
// Check if the download button is clicked
if (isset($_POST['downloadButton'])) {
    $client_id = $_POST['client_id'];
    generatePDF($client_id);
}?>
