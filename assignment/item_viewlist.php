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
    <title></title>
</head>
<body>
<script type="text/javascript">
     function addcus(){
        
            window.location.href='item_reg.php';
        }
</script>

    <div class="row">
            <div class="col-sm-12 col-md-12 co-lg-12">
            <h2 style="text-align: center;" >Customer View List</h2>
            <button class="btn btn-success" type="button" onclick="addcus()">Add Item</button>
        </div>
        </div>
<div class="panel-body">
        <div class="adv-table">
        <table  class="display table table-bordered table-striped" id="dynamic-table">
        <thead>
        <tr>
                                                <th>Item Category</th>
                                                <th>Item Sub Category</th>
                                                 <th>Item Code</th>
                                                 <th>Item Name</th>
                                                <th>Quantity</th>
                                                <th>Unit Price</th>
           
        </tr>
        </thead>
        <tbody>
        
        <?php 

        $sql1 = "SELECT * FROM item";
        $result1 = mysqli_query($con,$sql1) or die(mysqli_error($con));
        while ($row1 = mysqli_fetch_array($result1)) {
          $item_code=$row1['item_code'];
          $item_category=$row1['item_category'];
          $quantity=$row1['quantity'];
          $item_subcategory=$row1['item_subcategory'];
          $item_name=$row1['item_name'];
           $unit_price=$row1['unit_price'];

            $sql2 = "SELECT * FROM item_category WHERE id='$item_category'";
        $result2 = mysqli_query($con,$sql2) or die(mysqli_error($con));
        $row2=mysqli_fetch_assoc($result2);
            $category = $row2['category'];

             $sql3 = "SELECT * FROM item_subcategory WHERE id='$item_subcategory'";
        $result3 = mysqli_query($con,$sql3) or die(mysqli_error($con));
        $row3=mysqli_fetch_assoc($result3);
            $sub_category = $row3['sub_category'];
                                           ?>
                                           
                                           <tr>
                  
        
                                                <td><?php echo $category ;?></td>
                                                <td><?php echo $sub_category ;?></td>
                                                <td><?php echo $item_code ;?></td>
                                                <td><?php echo $item_name ;?></td>
                                                <td><?php echo $quantity ;?></td>
                                                <td><?php echo $unit_price ;?></td>
                                                
                                            
                                       
                                            </tr>
        
                                        <?php }?>
                                           
 
        </tbody>
        <tfoot>
        <tr>
                                                <th>Item Category</th>
                                                <th>Item Sub Category</th>
                                                 <th>Item Code</th>
                                                 <th>Item Name</th>
                                                <th>Quantity</th>
                                                <th>Unit Price</th>
   
        </tr>
        <!-- Button trigger modal -->

 
        </tfoot>
        </table>
        </div>
    </div>
</body>
</html>