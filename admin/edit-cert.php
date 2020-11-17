
<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else
{
$pid=intval($_GET['id']);

if(isset($_POST['submit']))
{
	$sql=mysqli_query($con,"UPDATE info set StudentName='".$_POST['StudentName']."',CourseName='".$_POST['CourseName']."', CertCode='".$_POST['CertCode']."', DateStart='".$_POST['DateStart']."', DateEnd='".$_POST['DateEnd']."'  WHERE id='$pid'  ") or die (mysqli_error($con));
	if(mysqli_query($con, $sql)){
		$_SESSION['msg']=" Updated Successfully !!";
	} else {
		$_SESSION['msg']=" Updated Error !!" ;
	}
	
	// Close connection
	mysqli_close($con);


}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin| Insert Product</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>

   <script>
function getSubcat(val) {
	$.ajax({
	type: "POST",
	url: "get_subcat.php",
	data:'cat_id='+val,
	success: function(data){
		$("#subcategory").html(data);
	}
	});
}
function selectCountry(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}
</script>	


</head>
<body>
<?php include('include/header.php');?>

	<div class="wrapper">
		<div class="container">
			<div class="row">
<?php include('include/sidebar.php');?>				
			<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head" style="background:#1f2228;">
								<h3 style="color: white;">Update Certificate</h3>
							</div>
							<div class="module-body">

									<?php if(isset($_POST['submit']))
{?>
									<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">�</button>
									<strong>Well done!</strong>	<?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
									</div>
<?php } ?>


									<?php if(isset($_GET['del']))
{?>
									<div class="alert alert-error">
										<button type="button" class="close" data-dismiss="alert">�</button>
									<strong>Oh snap!</strong> 	<?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?>
									</div>
<?php } ?>

									<br />

<form class="form-horizontal row-fluid" name="insertproduct" method="post" enctype="multipart/form-data">

<?php

$query = "SELECT * from info where id='$pid' ";



$result = mysqli_query($con,$query) or die (mysqli_error($con));
		while($row = mysqli_fetch_array($result))
{
	


?>

<div class="control-group">
<label class="control-label" for="basicinput">Id</label>
<div class="controls">
<input type="text" name="id"  placeholder="Enter Student Name" value="<?php echo htmlentities($row['id']);?>" class="span8 tip" >
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Student Name</label>
<div class="controls">
<input type="text" name="StudentName"  placeholder="Enter Student Name" value="<?php echo htmlentities($row['StudentName']);?>" class="span8 tip" >
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Course Name</label>
<div class="controls">
<input type="text" name="CourseName"  placeholder="Enter Course Name" value="<?php echo htmlentities($row['CourseName']);?>" class="span8 tip" >
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Certificate Code</label>
<div class="controls">
<input type="text" name="CertCode"  placeholder="Enter Code Of Certificate" value="<?php echo htmlentities($row['CertCode']);?>" class="span8 tip" >
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Date Strat</label>
<div class="controls">
<input type="text" name="DateStart"  placeholder="Enter Date Start" value="<?php echo htmlentities($row['DateStart']);?>" class="span8 tip" >
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Date End</label>
<div class="controls">
<input type="text" name="DateEnd"  placeholder="Enter Date End" value="<?php echo htmlentities($row['DateEnd']);?>" class="span8 tip" >
</div>
</div>


<?php 


} 



?>





	<div class="control-group">
										</div>
									



							</div>

						</div>
                        <div class="controls">
                            <button type="submit" name="submit" style="background:orangered; color: white; float: left;" class="btn">Update</button>
                        </div>

						</form>
						
						
					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->



	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
	<script src="scripts/datatables/jquery.dataTables.js"></script>
	<script>
		$(document).ready(function() {
			$('.datatable-1').dataTable();
			$('.dataTables_paginate').addClass("btn-group datatable-pagination");
			$('.dataTables_paginate > a').wrapInner('<span />');
			$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
			$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
		} );
	</script>
</body>
<?php } ?>