<?php 
include("db_connect.php");
?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<!-- Include Date Range Picker -->
<script type="text/javascript" src="js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="css/bootstrap-datepicker3.css"/>

<!-- Include Time Picker -->
	<title></title>
</head>
<script type="text/javascript">
    function getXmlHttpRequestObject() {
    if (window.XMLHttpRequest) {
        return new XMLHttpRequest();
    }
    else if(window.ActiveXObject) {
        return new ActiveXObject("Microsoft.XMLHTTP");
    }else {
        }
    }
	function search() {
          
	   var fdate = document.getElementById('fdate').value;
        var tdate = document.getElementById('tdate').value;

    var formData = new FormData();
    formData.append('fdate', fdate);
    formData.append('tdate', tdate)

		


                var req = getXmlHttpRequestObject(); // fuction to get xmlhttp object
                    if (req) {
                        req.onreadystatechange = function() {
                    if (req.readyState == 4) { //data is retrieved from server
                        if (req.status == 200) { // which reprents ok status 
                          
                          document.getElementById('gettable').innerHTML = req.responseText;                   
                    }            
                } 
            } 
                req.open("POST", 'get_invoice_item_report.php', true); //open url using get method, get_GrnBill.php
                req.send(formData); 
            }
        }
</script>
<body>
  <div class="container-fluid">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="row">
            <div class="col-sm-12 col-md-12 co-lg-12">
            <h2 style="text-align: center;" >Invoice Item Report</h2>
        </div>
        </div>
                <div class="row">
                     <div class="col-sm-6 col-md-6 col-lg-6">
                        <label style="margin-left: 30px;"><strong>Date</strong></label>
                        <div class="col-sm-12 col-md-12 col-lg-12">
                        	<div class="row">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                 <div class="col-sm-12 col-md-12 col-lg-12">
                                 	<div class="row">
                                     <div class="col-sm-2 col-md-2 col-lg-2">
                                        <label>To</label>
                                     </div>
                                     <div class="col-sm-10 col-md-10 col-lg-10" align="left">
                                        <input type="date" name="fdate" id="fdate" class="form-control">
                                     </div>
                                 </div>
                             </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                               <div class="col-sm-12 col-md-12 col-lg-12">
                               	<div class="row">
                                     <div class="col-sm-2 col-md-2 col-lg-2">
                                        <label>From</label>
                                     </div>
                                     <div class="col-sm-10 col-md-10 col-lg-10" align="left">
                                        <input type="date" name="tdate" id="tdate" class="form-control">
                                     </div>
                                 </div>
                            </div>
                        </div>
                        </div>
                     </div>
                 </div>
                     <div class="col-sm-2 col-md-2 col-lg-2" style="margin-top: 2%;">
                     	<button type="button" class="btn btn-primary" style="width:100px" onclick="search();">Search</button>
                     </div> 
                </div>
                      <div id="gettable" style="margin-top: 2%;">
                        <div class="panel-body">
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

        $sql1 = "SELECT * FROM invoice";
        $result1 = mysqli_query($con,$sql1) or die(mysqli_error($con));
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
        
                                        <?php }?>
                                           
 
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
                     </div> >
            </div>
        </div>
</body>
</html>