<?php
   
   // Import Database connection file
   include ('database-connection.php');

   // Import FPDF Library File
   require('fpdf/fpdf.php');

   // Checking if $_POST Existe
   if (isset($_POST['invoice_no'])) {

    // GETTING INVOICE NUMBER (KEY)
    $Invoice_Key = htmlspecialchars($_POST['invoice_no']);


    // GETTING DATA FROM DATABASE AND STORE IT INTO VARIABLES

    $invoice_data = $pdo->query("SELECT * FROM `order_list` WHERE `Invoice_no`='$Invoice_Key';")->fetch();

   $pdf = new FPDF('P', 'mm', "A4");

   $pdf->AddPage();

   $pdf->SetFont('Arial', 'B', 20);

   $pdf->Cell(71, 10, '', 0,0);
   $pdf->Cell(59, 5, 'Invoice', 0,0);
   $pdf->Cell(59, 10, '', 0,1);


   $pdf->SetFont('Arial', 'B', 15);
   $pdf->Cell(71, 5, 'MRG Invoicing', 0,0);
   $pdf->Cell(59, 5, '', 0,0);
   $pdf->Cell(59, 5, 'Details', 0,1);

   $pdf->SetFont('Arial', '', 10);

   $pdf->Cell(130, 5,'Github.com',0,0);
   $pdf->Cell(30, 5, 'Customer Name:',0,0);
   $pdf->Cell(34,5,"$invoice_data->Customer_Name",0,1);

   $pdf->Cell(130, 5,'@aboubakrmarghati',0,0);
   $pdf->Cell(25, 5, 'Invoice Date:',0,0);
   $pdf->Cell(34, 5, "$invoice_data->Invoice_Date",0,1);

   $pdf->Cell(130, 5,'',0,0);
   $pdf->Cell(25, 5,'Invoice No:',0,0);
   $pdf->Cell(34, 5,"$invoice_data->Invoice_no",0,1);

   $pdf->SetFont('Arial', 'B',15);
   $pdf->Cell(130, 5, 'Bill To',0,0);
   $pdf->Cell(59, 5, '',0,0);
   $pdf->SetFont('Arial', 'B', 10);

   $pdf->Cell(50,10,'',0,1);

   $pdf->SetFont('Arial', 'B', 10);
   /* Heading Of Table */
   $pdf->Cell(10, 6, 'ID',1,0,'C');
   $pdf->Cell(80, 6, 'Product Name',1,0,'C');
   $pdf->Cell(23, 6, 'Quantity',1,0,'C');
   $pdf->Cell(30, 6, 'Unit Price',1,0,'C');
   $pdf->Cell(20, 6, 'Order Date',1,0,'C');
   $pdf->Cell(25, 6, 'Total Price',1,1,'C');/* End of line */
   /* Heading Of Table End */

   $pdf->SetFont('Arial', '', 10);


       $pdf->Cell(10, 6, $invoice_data->id,1,0);
       $pdf->Cell(80, 6, "$invoice_data->Product_1",1,0);
       $pdf->Cell(23, 6, "$invoice_data->Qty_1",1,0,'R');
       $pdf->Cell(30, 6, "$invoice_data->Unite_Price_1",1,0,'R');
       $pdf->Cell(20, 6, "$invoice_data->Invoice_Date",1,0,'R');
       $pdf->Cell(25, 6, "$invoice_data->Total_Price_1",1,1, 'R');


   $pdf->Cell(118, 6, '',0,0);
   $pdf->Cell(25, 6, 'SUBTOTAL',0,0);

   // MAD REFER TO (MOROCCAN DIRHAM)

   $pdf->Cell(45, 6, "$invoice_data->Total_Price_1 MAD",1,1, 'R');

   $pdf->Output();
   } else {
    header("Location: ../index.php?invoice_error=true");
    die();
   }
?>