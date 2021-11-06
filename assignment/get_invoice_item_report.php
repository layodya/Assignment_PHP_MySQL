<?php 
include("db_connect.php");
$fdate = mysqli_real_escape_string($con,$_POST['fdate']);
$tdate = mysqli_real_escape_string($con,$_POST['tdate']);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<title></title>
</head>
<body>
 
<div class="panel-body" style="margin-top: 2%;">
        <div class="adv-table">
        <table  class="display table table-bordered table-striped" id="dynamic-table">
        <thead>
        <tr>
                                                <th>Invoice No</th>
                                                <th>Invoice Date</th>
                                                <th>Customer Name</th>
                                                <th>Item Name</th>
                                                <th>Item Code</th>
                                                <th>Item Category</th>
                                                <th>Unit Price</th>
           
        </tr>
        </thead>
        <tbody>
        
        <?php 

        $sql1 = "SELECT * FROM invoice WHERE date >= '$fdate' AND date <= '$tdate'";
        $result1 = mysqli_query($con,$sql1) or die(mysqli_error($con));
        $rowcount = mysqli_num_rows($result1);
        if ($rowcount==0) {
            ?> <h5 align="center"><font style="color: red;">No Data Found!!</font></h5> <?php
        }else{
        while ($row1 = mysqli_fetch_array($result1)) {
          $invoice_no=$row1['invoice_no'];
          $customer=$row1['customer'];
          $date=$row1['date'];

          $sql2 = "SELECT * FROM customer WHERE id='$customer'";
        $result2 = mysqli_query($con,$sql2) or die(mysqli_error($con));
        $row2=mysqli_fetch_assoc($result2);
            $first_name = $row2['first_name'];
            $last_name = $row2['last_name'];

             $sql3 = "SELECT * FROM invoice_master WHERE invoice_no='$invoice_no'";
        $result3 = mysqli_query($con,$sql3) or die(mysqli_error($con));
        $row3=mysqli_fetch_assoc($result3);
            $item_id = $row3['item_id'];

            $sql4 = "SELECT * FROM item WHERE id='$item_id'";
        $result4 = mysqli_query($con,$sql4) or die(mysqli_error($con));
        $row4=mysqli_fetch_assoc($result4);
            $item_name = $row4['item_name'];
            $item_code = $row4['item_code'];
            $item_category = $row4['item_category'];
            $unit_price = $row4['unit_price'];

            $sql5 = "SELECT * FROM item_category WHERE id='$item_category'";
        $result5 = mysqli_query($con,$sql5) or die(mysqli_error($con));
        $row5=mysqli_fetch_assoc($result5);
            $category = $row5['category'];
                                           ?>
                                           
                                           <tr>
                  
        
                                              <td><?php echo $invoice_no ;?></td>
                                                <td><?php echo $date ;?></td>
                                                <td><?php echo $first_name.'&nbsp;'.$last_name ;?></td>
                                                <td><?php echo $item_name ;?></td>
                                                <td><?php echo $item_code ;?></td>
                                                <td><?php echo $category ;?></td>
                                                <td><?php echo $unit_price ;?></td>
                                                
                                            
                                       
                                            </tr>
        
                                        <?php }}?>
                                           
 
        </tbody>
        <tfoot>
        <tr>
                                                <th>Invoice No</th>
                                                <th>Invoice Date</th>
                                                <th>Customer Name</th>
                                                <th>Item Name</th>
                                                <th>Item Code</th>
                                                <th>Item Category</th>
                                                <th>Unit Price</th>
   
        </tr>
        <!-- Button trigger modal -->

 
        </tfoot>
        </table>
        </div>
    </div>
</body>
</html>