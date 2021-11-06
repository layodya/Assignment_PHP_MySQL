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
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	<script src="sweetalert2.all.min.js"></script>
<!-- Optional: include a polyfill for ES6 Promises for IE11 -->
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
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

    	function submitdet() {
           
			
		var icode = document.getElementById('icode').value;
		var iname = document.getElementById('iname').value;
		var icat = document.getElementById('icat').value;
		var isubcat = document.getElementById('isubcat').value;
		var quantity = document.getElementById('quantity').value;
		var uprice = document.getElementById('uprice').value;

if (icode == ''){
			Swal.fire({
			  icon: 'error',
			  title: 'Oops...',
			  text: 'Please enter Item Code'
			})
		} else if (iname == '') {
			Swal.fire({
			  icon: 'error',
			  title: 'Oops...',
			  text: 'Please enter Item Name'
			})
		} else if (icat == 'select') {
			Swal.fire({
			  icon: 'error',
			  title: 'Oops...',
			  text: 'Please Select Category'
			})

		} else if (isubcat == 'select') {
			Swal.fire({
			  icon: 'error',
			  title: 'Oops...',
			  text: 'Please Select SubCategory'
			})
		} else if (quantity==''){
			Swal.fire({
			  icon: 'error',
			  title: 'Oops...',
			  text: 'Please Enter Quantity'
			})
		} else if (uprice==''){
Swal.fire({
			  icon: 'error',
			  title: 'Oops...',
			  text: 'Please Enter Unit Price'
			})
		}else{
	var formData = new FormData();
	formData.append('icode', icode);
	formData.append('iname', iname);
	formData.append('icat', icat);
	formData.append('isubcat', isubcat);
	formData.append('quantity', quantity);
	formData.append('uprice', uprice);
		

			

                var req = getXmlHttpRequestObject(); // fuction to get xmlhttp object
                    if (req) {
                        req.onreadystatechange = function() {
                    if (req.readyState == 4) { //data is retrieved from server
                        if (req.status == 200) { // which reprents ok status 
                          alert(req.responseText);
                          location.reload
                          $('#exampleModalCenter').modal('show');                       
                    }            
                } 
            } 
                req.open("POST", 'item_reg_submit.php', true); //open url using get method, get_GrnBill.php
                req.send(formData); 
            }
        }
        }
	function viewList(){
        
        	window.location.href='item_viewlist.php';
        }
</script>
<body>
<div class="container-fluid">
	<div class="col-sm-12 col-md-12 col-lg-12" style="background-color: #cdf7f1;height:1000px;">
		<div class="row">
			<div class="col-sm-12 col-md-12 co-lg-12">
			<h2 style="text-align: center;" >Item Registration</h2>
			<button class="btn btn-success" type="button" onclick="viewList()">View List</button>
		</div>
		</div>

		<div class="row" style="margin-top: 3%;" align="center">
			<div class="col-sm-5 col-md-5 col-lg-5">
				<label>Item Code</label>
				<input type="text" name="icode" id="icode" class="form-control">
			</div>
			<div class="col-sm-5 col-md-5 col-lg-5">
				<label>Item Name</label>
				<input type="text" name="iname" id="iname" class="form-control">
			</div>
		</div>

		<div class="row" style="margin-top: 3%;"align="center">
			<div class="col-sm-5 col-md-5 col-lg-5">
				<label>Category</label>
				<select name="icat" id="icat" class="form-control">
					<option value="select">Select Category</option>
					<?php
					$sql ="SELECT * FROM item_category";
					$result = mysqli_query($con,$sql)or die(mysqli_error($con));
					while ($row =mysqli_fetch_array($result)) {
						$category = $row['category'];
						$id = $row['id'];
						?>
						<option value="<?php echo $id ?>"><?php echo $category ?></option>

					<?php
					}
					?>
				</select>
			</div>
			<div class="col-sm-5 col-md-5 col-lg-5">
				<label>Sub Catergory</label>
				<select name="isubcat" id="isubcat" class="form-control">
					<option value="select">Select Sub Category</option>
					<?php
					$sql1 ="SELECT * FROM item_subcategory";
					$result1 = mysqli_query($con,$sql1)or die(mysqli_error($con));
					while ($row1 =mysqli_fetch_array($result1)) {
						$sub_category = $row1['sub_category'];
						$ids = $row1['id'];
						?>
						<option value="<?php echo $ids ?>"><?php echo $sub_category ?></option>

					<?php
					}
					?>
				</select>
			</div>
		</div>

		<div class="row" style="margin-top: 3%;"align="center">
			<div class="col-sm-5 col-md-5 col-lg-5">
				<label>Quantity</label>
				<div class="input-group">
                                    <span class="input-group-btn">
                                        <button type="button" class="quantity-left-minus btn btn-danger btn-number"  data-type="minus" data-field="">
                                          <span class="glyphicon glyphicon-minus"></span>
                                        </button>
                                    </span>
                                    <input type="text" id="quantity" name="quantity" class="form-control input-number" value="0" min="1" max="100">
                                    <span class="input-group-btn">
                                        <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus" data-field="">
                                            <span class="glyphicon glyphicon-plus"></span>
                                        </button>
                                    </span>
                                </div>
			</div>
			<div class="col-sm-5 col-md-5 col-lg-5">
				<label>Unit Price</label>
				<input type="text" name="uprice" id="uprice" class="form-control">
			</div>
		</div>

		<div class="row">
			<div class="col-sm-12 col-md-12 co-lg-12"  style="margin-top:2%">
				<button type="button" class="btn btn-primary" style="width:100px" onclick="submitdet();">Submit</button>
			</div>
		</div>
	</div>
</div>
</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){

var quantitiy=0;
   $('.quantity-right-plus').click(function(e){
        
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantity').val());
        
        // If is not undefined
            
            $('#quantity').val(quantity + 1);

          
            // Increment
        
    });

     $('.quantity-left-minus').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantity').val());
        
        // If is not undefined
      
            // Increment
            if(quantity>0){
            $('#quantity').val(quantity - 1);
            }
    });
    
});
</script>