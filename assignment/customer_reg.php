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
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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
          
			
		var title = document.getElementById('title').value;
		var fname = document.getElementById('fname').value;
		var lname = document.getElementById('lname').value;
		var cnum = document.getElementById('cnum').value;
		var distric = document.getElementById('distric').value;
if (title == 'select'){
			Swal.fire({
			  icon: 'error',
			  title: 'Oops...',
			  text: 'Please Select The Title'
			})
		} else if (fname == '') {
			Swal.fire({
			  icon: 'error',
			  title: 'Oops...',
			  text: 'Please enter First Name'
			})
		} else if (lname == '') {
			Swal.fire({
			  icon: 'error',
			  title: 'Oops...',
			  text: 'Please enter Last Name'
			})

		} else if (cnum == '') {
			Swal.fire({
			  icon: 'error',
			  title: 'Oops...',
			  text: 'Please enter Mobile Number'
			})

		} else if (distric == 'select') {
			Swal.fire({
			  icon: 'error',
			  title: 'Oops...',
			  text: 'Please Select The District'
			})

		}else{
	var formData = new FormData();
	formData.append('title', title);
	formData.append('fname', fname);
	formData.append('lname', lname);
	formData.append('cnum', cnum);
	formData.append('distric', distric);
		


                var req = getXmlHttpRequestObject(); // fuction to get xmlhttp object
                    if (req) {
                        req.onreadystatechange = function() {
                    if (req.readyState == 4) { //data is retrieved from server
                        if (req.status == 200) { // which reprents ok status 
                          alert(req.responseText);
                          location.reload;                     
                    }            
                } 
            } 
                req.open("POST", 'customer_reg_submit.php', true); //open url using get method, get_GrnBill.php
                req.send(formData); 
            }
        }
        }

         function viewList(){
        
        	window.location.href='customer_viewlist.php';
        }
</script>
<body>
<div class="container-fluid">
	
	<div class="col-sm-12 col-md-12 col-lg-12" style="background-color: #cdf7f1;height:1000px;">
		<div class="row">
			<div class="col-sm-12 col-md-12 co-lg-12">
			<h2 style="text-align: center;" >Customer Registration</h2>
			<button class="btn btn-success" type="button" onclick="viewList()">View List</button>
		</div>
		</div>

		<div class="row" style="margin-top: 3%;">
			<div class="col-sm-3 col-md-3 col-lg-3">
				<label>Title</label>
				<select name="title" id="title"  class="form-control">
					<option  value="select">Select the title</option>
					<option value="Mr">Mr</option>
					<option value="Mrs">Mrs</option>
					<option value="Mis">Miss</option>
					<option value="Dr">Dr</option>
				</select>
			</div>
			<div class="col-sm-4 col-md-4 col-lg-4">
				<label>First Name</label>
				<input type="text" name="fname" id="fname" class="form-control">
			</div>
			<div class="col-sm-4 col-md-4 col-lg-4">
				<label>Last Name</label>
				<input type="text" name="lname" id="lname" class="form-control">
			</div>
		</div>

		<div class="row" style="margin-top: 3%;">
			<div class="col-sm-4 col-md-4 col-lg-4">
				<label>Contact Number</label>
				<input type="text" name="cnum" id="cnum" class="form-control" maxlength="10">
			</div>
			<div class="col-sm-4 col-md-4 col-lg-4">
				<label>Distric</label>
				<select name="distric" id="distric" class="form-control">
					<option value="select">Select The Distric</option>
					<?php
					$sql ="SELECT * FROM district WHERE active='yes'";
					$result = mysqli_query($con,$sql)or die(mysqli_error($con));
					while ($row =mysqli_fetch_array($result)) {
						$distric = $row['district'];
						$id = $row['id'];
						?>
						<option value="<?php echo $id ?>"><?php echo $distric ?></option>

					<?php
					}
					?>
				</select>
			</div>
		</div>

		<div class="col-sm-12 col-md-12 co-lg-12"  style="margin-top:2%">
				<button type="button" class="btn btn-primary" style="width:100px" onclick="submitdet();">Submit</button>
			</div>
	</div>
</div>
</body>
</html>