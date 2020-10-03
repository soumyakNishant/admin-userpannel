<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
	
if(isset($_POST['submit']))
  {	
	$file = $_FILES['image']['name'];
	$file_loc = $_FILES['image']['tmp_name'];
	$folder="images/";
	$new_file_name = strtolower($file);
	$final_file=str_replace(' ','-',$new_file_name);
	
	$name=$_POST['name'];
	$email=$_POST['email'];
	$mobileno=$_POST['mobile'];
	$password=$_POST['password'];
	$designation=$_POST['designation'];
	$idedit=$_POST['editid'];
	$image=$_POST['image'];
	$whatsapp=$_POST['whatsapp'];
	$batch=$_POST['batch'];
	$py=$_POST['py'];
	$company=$_POST['company'];
	$location=$_POST['location'];
	$jy=$_POST['jy'];
	$post=$_POST['post'];
	$gate=$_POST['gate'];
	$yapl=$_POST['yapl'];

	if(move_uploaded_file($file_loc,$folder.$final_file))
		{
			$image=$final_file;
		}

	$sql="UPDATE users SET name=(:name), email=(:email), mobile=(:mobileno), designation=(:designation), whatsapp=(:whatsapp), batch=(:batch), py=(:py), company=(:company), location=(:location), jy=(:jy), post=(:post), gate=(:gate), yapl=(:yapl), Image=(:image) WHERE id=(:idedit)";
	$query = $dbh->prepare($sql);
	$query-> bindParam(':name', $name, PDO::PARAM_STR);
	$query-> bindParam(':email', $email, PDO::PARAM_STR);
	$query-> bindParam(':mobileno', $mobileno, PDO::PARAM_STR);
	$query-> bindParam(':designation', $designation, PDO::PARAM_STR);
	$query-> bindParam(':whatsapp', $whatsapp, PDO::PARAM_STR);
	$query-> bindParam(':batch', $batch, PDO::PARAM_STR);
	$query-> bindParam(':py', $py, PDO::PARAM_STR);
	$query-> bindParam(':company', $company, PDO::PARAM_STR);
	$query-> bindParam(':location', $location, PDO::PARAM_STR);
	$query-> bindParam(':jy', $jy, PDO::PARAM_STR);
	$query-> bindParam(':post', $post, PDO::PARAM_STR);
	$query-> bindParam(':gate', $gate, PDO::PARAM_STR);
	$query-> bindParam(':yapl', $yapl, PDO::PARAM_STR);
	$query-> bindParam(':image', $image, PDO::PARAM_STR);
	$query-> bindParam(':idedit', $idedit, PDO::PARAM_STR);
	$query->execute();
	$msg="Information Updated Successfully";
}    https://support.google.com/chrome/?p=incognito
?>

<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>Edit Profile</title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">

	<script type= "text/javascript" src="../vendor/countries.js"></script>
	<style>
	.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
	background: #dd3d36;
	color:#fff;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
	background: #5cb85c;
	color:#fff;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>


</head>

<body>
<?php
		$email = $_SESSION['alogin'];
		$sql = "SELECT * from users where email = (:email);";
		$query = $dbh -> prepare($sql);
		$query-> bindParam(':email', $email, PDO::PARAM_STR);
		$query->execute();
		$result=$query->fetch(PDO::FETCH_OBJ);
		$cnt=1;	
?>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
	<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading"><?php echo htmlentities($_SESSION['alogin']); ?></div>
<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

									<div class="panel-body">
<form method="post" class="form-horizontal" enctype="multipart/form-data">

<div class="form-group">
	<div class="col-sm-4">
	</div>
	<div class="col-sm-4 text-center">
		<img src="images/<?php echo htmlentities($result->image);?>" style="width:200px; border-radius:50%; margin:10px;">
		<input type="file" name="image" class="form-control">
		<input type="hidden" name="image" class="form-control" value="<?php echo htmlentities($result->image);?>">
	</div>
	<div class="col-sm-4">
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">Name<span style="color:red">*</span></label>
	<div class="col-sm-4">
	<input type="text" name="name" class="form-control" required value="<?php echo htmlentities($result->name);?>">
	</div>

	<label class="col-sm-2 control-label">Email<span style="color:red">*</span></label>
	<div class="col-sm-4">
	<input type="email" name="email" class="form-control" required value="<?php echo htmlentities($result->email);?>">
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">Mobile<span style="color:red">*</span></label>
	<div class="col-sm-4">
	<input type="text" name="mobile" class="form-control" required value="<?php echo htmlentities($result->mobile);?>">
	</div>

	<label class="col-sm-2 control-label">Designation<span style="color:red">*</span></label>
	<div class="col-sm-4">
	<input type="text" name="designation" class="form-control" required value="<?php echo htmlentities($result->designation);?>">
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label">Whatsapp<span style="color:red">*</span></label>
	<div class="col-sm-4">
	<input type="text" name="whatsapp" class="form-control" required value="<?php echo htmlentities($result->whatsapp);?>">
	</div>

	<label class="col-sm-2 control-label">Batch<span style="color:red">*</span></label>
	<div class="col-sm-4">
	<select name="batch" class="form-control" required value="<?php echo htmlentities($result->batch);?>">
                            <option value="">Select</option>
                            <option value="2003-07">2003-07</option>
                            <option value="2004-08">2004-08</option>
                            <option value="2005-09">2005-09</option>
                            <option value="2006-10">2006-10</option>
                            <option value="2007-11">2007-11</option>
                            <option value="2008-12">2008-12</option>
                            <option value="2009-13">2009-13</option>
                            <option value="2010-14">2010-14</option>
                            <option value="2011-15">2011-15</option>
                            <option value="2012-16">2012-16</option>
                            <option value="2013-17">2013-17</option>
                            <option value="2014-18">2014-18</option>
                            <option value="2015-19">2015-19</option>
                            <option value="2016-20">2016-20</option>
                            <option value="2017-present">2017-present</option>
                            </select>
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label">Year<span style="color:red">*</span> of Passing</label>
	<div class="col-sm-4">
	<input type="text" name="py" class="form-control" required value="<?php echo htmlentities($result->py);?>">
	</div>

	<label class="col-sm-2 control-label">Current<span style="color:red">*</span> Working COmp./Inst.</label>
	<div class="col-sm-4">
	<input type="text" name="company" class="form-control" required value="<?php echo htmlentities($result->company);?>">
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label">Work<span style="color:red">*</span> Location</label>
	<div class="col-sm-4">
	<input type="text" name="location" class="form-control" required value="<?php echo htmlentities($result->location);?>">
	</div>

	<label class="col-sm-2 control-label">Joining<span style="color:red">*</span> Year</label>
	<div class="col-sm-4">
	<input type="text" name="jy" class="form-control" required value="<?php echo htmlentities($result->jy);?>">
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label">Current<span style="color:red">*</span> Post</label>
	<div class="col-sm-4">
	<input type="text" name="post" class="form-control" required value="<?php echo htmlentities($result->post);?>">
	</div>

	<label class="col-sm-2 control-label">GATE<span style="color:red">*</span> Rank/Score</label>
	<div class="col-sm-4">
	<input type="text" name="gate" class="form-control" required value="<?php echo htmlentities($result->gate);?>">
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label">Your<span style="color:red">*</span> Achievement</label>
	<div class="col-sm-4">
	<textarea name="yapl" type="text" class="form-control" required value="<?php echo htmlentities($result->yapl);?>" ></textarea></div>
	</div>
</div>

<input type="hidden" name="editid" class="form-control" required value="<?php echo htmlentities($result->id);?>">

<div class="form-group">
	<div class="col-sm-8 col-sm-offset-2">
		<button class="btn btn-primary" name="submit" type="submit">Save Changes</button>
	</div>
</div>

</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
	<script type="text/javascript">
				 $(document).ready(function () {          
					setTimeout(function() {
						$('.succWrap').slideUp("slow");
					}, 3000);
					});
	</script>
</body>
</html>
<?php } ?>
