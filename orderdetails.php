<!DOCTYPE html>
<html>
    <?php
    include('adminpartials/session.php');
    include('adminpartials/head.php');
    ?>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <?php
            include("adminpartials/header.php");
            include("adminpartials/aside.php");
            ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Dashboard
                    <small>Control panel</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-sm-9">
                <?php
                include('../partials/connect.php');

                $id=$_GET['order_id'];
                $sql="SELECT * FROM orders, customers WHERE orders.id='$id' AND orders.customer_id=customers.id";
                $sql2="SELECT * FROM order_details, orders, products WHERE orders.id='$id' AND order_details.order_id=orders.id AND order_details.product_id=products.id";

                $results=$connect->query($sql);
                $results2=$connect->query($sql2);

                
                $final=$results->fetch_assoc();
                $final2=$results2->fetch_assoc();

                
                ?>

                <h3> Customer id : <?php echo $final['customer_id']?> </h3><hr><br>

                <h3> Customer username : <?php echo $final['username']?> </h3><hr><br>

                <h3> Address : <?php echo $final['address']?> </h3><hr><br>

                <h3> Phone : <?php echo $final['phone']?> </h3><hr><br>

                <h3> Product id : <?php echo $final2['product_id']?> </h3><hr><br>

                <h3> Product Name : <?php echo $final2['name']?> </h3><hr><br>

                <h3> Quantity : <?php echo $final2['quantity']?> </h3><hr><br>

                <h3> Total : <?php echo $final['total']?> </h3><hr><br>



        </div>

        
        <div class="col-sm-3">

        </div>
        </div>

    </section>
    <!-- /.content -->
</div>

<?php
include("adminpartials/footer.php");
?>
    </body>
</html>