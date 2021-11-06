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
        
            window.location.href='customer_reg.php';
        }
</script>

    <div class="row">
            <div class="col-sm-12 col-md-12 co-lg-12">
            <h2 style="text-align: center;" >Customer View List</h2>
            <button class="btn btn-success" type="button" onclick="addcus()">Add Customer</button>
        </div>
        </div>
<div class="panel-body">
        <div class="adv-table">
        <table  class="display table table-bordered table-striped" id="dynamic-table">
        <thead>
        <tr>
                                                <th>Customer Title</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                 <th>Contact No.</th>
                                                <th>District</th>
           
        </tr>
        </thead>
        <tbody>
        
        <?php 

        $sql1 = "SELECT * FROM customer";
        $result1 = mysqli_query($con,$sql1) or die(mysqli_error($con));
        while ($row1 = mysqli_fetch_array($result1)) {
          $title=$row1['title'];
          $first_name=$row1['first_name'];
          $last_name=$row1['last_name'];
          $contact_no=$row1['contact_no'];
          $district=$row1['district'];

      $sql2 = "SELECT * FROM district WHERE id='$district'";
        $result2 = mysqli_query($con,$sql2) or die(mysqli_error($con));
        $row2=mysqli_fetch_assoc($result2);
            $districtn = $row2['district'];
                                           ?>
                                           
                                           <tr>
                  
        
                                                <td><?php echo $title ;?></td>
                                                <td><?php echo $first_name ;?></td>
                                                <td><?php echo $last_name ;?></td>
                                                <td><?php echo $contact_no ;?></td>
                                                <td><?php echo $districtn ;?></td>
                                                
                                            
                                       
                                            </tr>
        
                                        <?php }?>
                                           
 
        </tbody>
        <tfoot>
        <tr>
                                                <th>Customer Title</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                 <th>Contact No.</th>
                                                <th>District</th>
   
        </tr>
        <!-- Button trigger modal -->

 
        </tfoot>
        </table>
        </div>
    </div>
</body>
</html>