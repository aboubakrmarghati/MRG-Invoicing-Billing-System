<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MRG Invoicing</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">

    <div class="container mt-5">

        <!-- Form Title -->
        <h2 class="mb-5 text-center">Billing Program</h2>
        
        <!-- Alert Message -->
        <?php if (isset($_GET['inserted-successfuly'])) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                ORDER REGISTERED SUCCESSFULY !
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif ?>

        <!-- Alert Error -->
        <?php if (isset($_GET['invoice_error'])) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                AN ERROR HAS OCCURRED PLEASE TRY AGAIN LATER !
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif ?>

        <!-- Invoice Form -->
        <form action="php/insert-order.php" method="POST">
            <div class="row mt-5 mb-5">
                <!-- Customer Name -->
                <div class="form-group col-md-6 mb-3">
                    <label for="customer_name">Customer Name</label>
                    <input type="text" name="customer_name" placeholder="Customer name" class="form-control" id="customer_name" required>
                </div>
                
                <!-- Invoice Date -->
                <div class="form-group col-md-6 mb-3">
                    <label for="invoice_date">Invoice Date</label>
                    <input type="text" class="form-control" value="<?= date('d-m-Y')?>" name="invoice_date" id="invoice_date" readonly>
                </div>
                
                <!-- Product Details -->
                <hr>
                <div class="form-group col-md-6 mb-3">
                    <label for="product_1">Product</label>
                    <input type="text" placeholder="Product Name" class="form-control" name="product_1" id="product_1" required>
                </div>
                <div class="form-group col-md-6 mb-3">
                    <label for="product_1_qty">Quantity</label>
                    <input type="number" min="1" value="1" placeholder="Quantity" class="form-control" name="qty_1" id="product_1_qty" required>
                </div>
                <div class="form-group col-md-6 mb-3">
                    <label for="product_1_unite_price">Unit Price</label>
                    <input type="number" step="0.01" placeholder="Unit Price" class="form-control" name="unite_price_1" id="product_1_unite_price" required>
                </div>
                <div class="form-group col-md-6 mb-3">
                    <label for="product_1_total_price">Total Price</label>
                    <input type="text" placeholder="Total Price" class="form-control" name="total_price_1" id="product_1_total_price" readonly>
                </div>
                
                <hr>
                <button type="submit" name="register_order" class="btn btn-success">Add Invoice</button>
            </div>
        </div>
    </form>


    <hr>

    <!-- Stored Data Table -->

    <div class="container mt-3">
        <table class="table table-dark table-bordered responsive">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Customer Name</th>
                    <th>Date</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Total Price</th>
                    <th>Invoice</th>
                </tr>
            </thead>
            <tbody>

                   <!-- Import Data From Database -->
                   <?php include "php/table-data.php";?>
                   <?php foreach ($data_table as $key => $db_table) : ?>
                    <tr>
                   <td><?= $db_table->id ?></td>
                   <td><?= $db_table->Customer_Name ?></td>
                   <td><?= $db_table->Invoice_Date ?></td>
                   <td><?= $db_table->Product_1 ?></td>
                   <td><?= $db_table->Qty_1 ?></td>
                   <td><?= $db_table->Unite_Price_1 ?></td>
                   <td><?= $db_table->Total_Price_1 ?></td>
                   <td>
                       <form action="php/generate-invoice.php" method="post">
                           <button value="<?= $db_table->Invoice_no ?>" name="invoice_no" class="btn btn-outline-success">
                               Invoice
                            </button>
                        </form>
                    </td>
                   </tr>
                   <?php endforeach ?>

            </tbody>
        </table>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="invoice.js"></script>

</body>
</html>
