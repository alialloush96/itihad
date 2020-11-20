<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
// ################################################################
if(isset($_POST['submit']))
{
	
// ################################################################


$sql= "insert into info (StudentName,CourseName,CertCode,DateStart,DateEnd) values ('".$_POST["stdName"]."', '".$_POST["coursename"]."','".$_POST["certcode"]."','".$_POST["datestart"]."','".$_POST["dateend"]."') ";

if ($con->query($sql) === TRUE) 
	{
		$_SESSION['msg']="Inserted Successfully !!";
  	}	 
  else 
  	{
		$_SESSION['msg']="Inserted Error !!" . $con->error;
 	}
  
  $con->close();

}

// ################################################################

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin| Insert Certificate</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>

<!-- #########################################################  -->
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

<!-- #########################################################  -->

</head>
<body>
<?php include('include/header.php');?>

<!-- #########################################################  -->
	<div class="wrapper">
		<div class="container">
			<div class="row">
<?php include('include/sidebar.php');?>				
			<div class="span9">
					<div class="content">

						<div class="module" >
							<div class="module-head" style="background:#000033;">
								<h3 style="color: white;">Insert Certificate</h3>
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
<!-- #########################################################  -->
<form class="form-horizontal row-fluid" name="insertcert" method="post" enctype="multipart/form-data">
<!-- #########################################################  -->


<!-- #########################################################  -->
<div class="control-group">
<label class="control-label" for="basicinput">Student Full Name</label>
<div class="controls">
<input type="text"    name="stdName"  placeholder="Enter Student Full Name" class="span8 tip" required>
</div>
</div>
<!-- #########################################################  -->
<div class="control-group">
<label class="control-label" for="basicinput">Course Name</label>
<div class="controls">
<input type="text"    name="coursename"  placeholder="Enter Course Name" class="span8 tip" required>
</div>
</div>
<!-- #########################################################  -->
<div class="control-group">
<label class="control-label" for="basicinput">Certificate Code</label>
<div class="controls">
<input type="text"    name="certcode"  placeholder="Enter Certificate Code" class="span8 tip" required>
</div>
</div>
<!-- #########################################################  -->
<div class="control-group">
<label class="control-label" for="basicinput">Date of Start</label>
<div class="controls">
<input type="date"    name="datestart"  placeholder="ex. 2020-11-08" class="span8 tip" required>
</div>
</div>
<!-- #########################################################  -->

<!-- #########################################################  -->
<div class="control-group">
<label class="control-label" for="basicinput">Date of end</label>
<div class="controls">
<input type="date"    name="dateend"  placeholder="ex. 2021-2-18" class="span8 tip" required>
</div>
</div>
<!-- #########################################################  -->


<!-- #########################################################  -->



<!-- #########################################################  -->



<!-- #########################################################  -->

<!-- #########################################################  -->
							<div class="control-group">
                            	<div class="controls">
                                	<button type="submit" name="submit" style="background: #0a9ab8; color: white; float: left;" class="btn">Insert</button>
                            	</div>
                        	</div>
						</form>
					</div>
				</div>

                <!-- #########################################################  -->

					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
        <!DOCTYPE HTML>
        <html>
        <head>

        </head>
        <body>
        <div id="chartContainer" style="height: 270px; width: 870px;"></div>
        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
        </body>
        </html>
	</div><!--/.wrapper-->


	<!-- ############################<?php include('include/footer.php');?>#############################  -->



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

<?php
include("include/footer.php");?>

</body>
<?php } ?>