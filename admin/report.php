
<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{

?>

<style>
button{
  border: none;
    float: left;
  padding: 10px 20px;
  border-radius:4px;
  color:white;
  background: #0a9ab8;
  margin-top:20px;
}
</style>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin|  Users log</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
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
								<h3 style=" color: white;">Report</h3>
							</div>
							<div class="module-body table">
	
							
								<table cellpadding="0" cellspacing="0" border="0" id="tbldata" class="datatable-1 table table-bordered table-striped	 display" width="100%">
									<thead>
										<tr>
											<th>id</th>
											<th> Student Name</th>
											<th> Course Name </th>
											<th> Certificate  Code</th>
											<th> Date Start </th>
											<th> Date End </th>
											
										</tr>
									</thead>
									<tbody>

<?php $query=mysqli_query($con,"select * from info");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>
										<tr>
											<td><?php echo htmlentities($cnt);?></td>
											
											<td><?php echo htmlentities($row['StudentName']);?></td>
											<td><?php echo htmlentities($row['CourseName']);?></td>
											<td> <?php echo htmlentities($row['CertCode']);?></td>
											<td><?php echo htmlentities($row['DateStart']); ?></td>
											<td><?php echo htmlentities($row['DateEnd']); ?></td>



										</tr>
											
											
										<?php $cnt=$cnt+1; }?>

								</table>
                                    
                                    <!-- <input type="submit" name="export1" class="btn btn-success" value="Export" /> -->

                                
							</div>

						</div>

                        <button onclick="tableToExcel('tbldata', 'Report_Certificate')">Export</button>
						
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

<script type="text/javascript">
var tableToExcel = (function() {
  var uri = 'data:application/vnd.ms-excel;base64,'
    , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
    , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
    , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
  return function(table, name) {
    if (!table.nodeType) table = document.getElementById(table)
    var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
    window.location.href = uri + base64(format(template, ctx))
  }
})()
</script>

<?php
include("include/footer.php");?>

</body>
<?php } ?>