<?php
include 'database-connection.php';

if (isset($_POST['register_order'])) {

    $Customername = htmlspecialchars($_POST['customer_name']);
    $date = htmlspecialchars($_POST['invoice_date']);

    $product1 = htmlspecialchars($_POST['product_1']);
    $qty1 = htmlspecialchars($_POST['qty_1']);
    $uniteprice1 = htmlspecialchars($_POST['unite_price_1']);
    $totalprice1 = htmlspecialchars($_POST['total_price_1']);

    // $product2 = htmlspecialchars($_POST['product_2']);
    // $qty2 = htmlspecialchars($_POST['qty_2']);
    // $uniteprice2 = htmlspecialchars($_POST['unite_price_2']);
    // $totalprice2 = htmlspecialchars($_POST['total_price_2']);

    $statement = $pdo->prepare("INSERT INTO `order_list` (`id`, `Customer_Name`, `Invoice_Date`, `Invoice_no`, `Product_1`, `Qty_1`, `Unite_Price_1`, `Total_Price_1`) VALUES (NULL, :Customername, :date, :Invoice_no, :product1, :qty1, :uniteprice1, :totalprice1);");
    $statement->execute([
        'Customername' => $Customername,
        'date' => $date,
        'Invoice_no' => rand(000000, 999999),
        'product1' => $product1,
        'qty1' => $qty1,
        'uniteprice1' => $uniteprice1,
        'totalprice1' => $totalprice1,

    ]);

    header("Location: ../index.php?inserted-successfuly=true");
    die();
}