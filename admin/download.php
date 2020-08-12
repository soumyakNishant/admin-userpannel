<?php 
session_start();
//error_reporting(0);
session_regenerate_id(true);
include('includes/config.php');

if(strlen($_SESSION['alogin'])==0)
	{	
	header("Location: index.php"); //
	}
	else{?>
<table border="1">
									<thead>
										<tr>
										<th>#</th>
											<th>Name</th>
											<th>Email</th>
											<th>Gender</th>
											<th>Phone</th>
											<th>Designation</th>

											<th>Whatsapp</th>
											<th>Batch</th>
											<th>Passing Year</th>
											<th>Current Working Comp./Inst.</th>
											<th>Work Location</th>
											<th>Joining Year</th>
											<th>Current Post</th>
											<th>Gate Rank/Score</th>
											<th>Achievement</th>
										</tr>
									</thead>

<?php 
$filename="Users list";
$sql = "SELECT * from Users";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{				

echo '  
<tr>  
<td>'.$cnt.'</td> 
<td>'.$Name= $result->name.'</td> 
<td>'.$Email= $result->email.'</td> 
<td>'.$Gender= $result->gender.'</td> 
<td>'.$Phone= $result->mobile.'</td> 
<td>'.$Designation= $result->designation.'</td> 
<td>'.$Whatsapp= $result->whatsapp.'</td>
<td>'.$Batch= $result->batch.'</td>
<td>'.$py= $result->py.'</td>
<td>'.$company= $result->company.'</td>
<td>'.$Location= $result->location.'</td>
<td>'.$jy= $result->jy.'</td>
<td>'.$Post= $result->post.'</td>
<td>'.$Gate= $result->gate.'</td>
<td>'.$yapl= $result->yapl.'</td>
</tr>  
';
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=".$filename."-report.xls");
header("Pragma: no-cache");
header("Expires: 0");
			$cnt++;
			}
	}
?>
</table>
<?php } ?>