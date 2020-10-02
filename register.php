<?php
include('includes/config.php');
if(isset($_POST['submit']))
{

$file = $_FILES['image']['name'];
$file_loc = $_FILES['image']['tmp_name'];
$folder="images/"; 
$new_file_name = strtolower($file);
$final_file=str_replace(' ','-',$new_file_name);

$name=$_POST['name'];
$email=$_POST['email'];
$password=md5($_POST['password']);
$gender=$_POST['gender'];
$mobileno=$_POST['mobileno'];
$designation=$_POST['designation'];
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
$notitype='Create Account';
$reciver='Admin';
$sender=$email;

$sqlnoti="insert into notification (notiuser,notireciver,notitype) values (:notiuser,:notireciver,:notitype)";
$querynoti = $dbh->prepare($sqlnoti);
$querynoti-> bindParam(':notiuser', $sender, PDO::PARAM_STR);
$querynoti-> bindParam(':notireciver',$reciver, PDO::PARAM_STR);
$querynoti-> bindParam(':notitype', $notitype, PDO::PARAM_STR);
$querynoti->execute();    
    
$sql ="INSERT INTO users(name,email, password, gender, mobile, designation, image, whatsapp, batch, py, company, location, jy, post, gate, yapl, status) VALUES(:name, :email, :password, :gender, :mobileno, :designation, :image, :whatsapp, :batch, :py, :company, :location, :jy, :post, :gate, :yapl,  1)";
$query= $dbh -> prepare($sql);
$query-> bindParam(':name', $name, PDO::PARAM_STR);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> bindParam(':gender', $gender, PDO::PARAM_STR);
$query-> bindParam(':mobileno', $mobileno, PDO::PARAM_STR);
$query-> bindParam(':designation', $designation, PDO::PARAM_STR);
$query-> bindParam(':image', $image, PDO::PARAM_STR);
$query-> bindParam(':whatsapp', $whatsapp, PDO::PARAM_STR);
$query-> bindParam(':batch', $batch, PDO::PARAM_STR);
$query-> bindParam(':py', $py, PDO::PARAM_STR);
$query-> bindParam(':company', $company, PDO::PARAM_STR);
$query-> bindParam(':location', $location, PDO::PARAM_STR);
$query-> bindParam(':jy', $jy, PDO::PARAM_STR);
$query-> bindParam(':post', $post, PDO::PARAM_STR);
$query-> bindParam(':gate', $gate, PDO::PARAM_STR);
$query-> bindParam(':yapl', $yapl, PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo "<script type='text/javascript'>alert('Registration Sucessfull!');</script>";
echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
}
else 
{
$error="Something went wrong. Please try again";
}

}
?>

<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
    <script type="text/javascript">

	function validate()
        {
            var extensions = new Array("jpg","jpeg");
            var image_file = document.regform.image.value;
            var image_length = document.regform.image.value.length;
            var pos = image_file.lastIndexOf('.') + 1;
            var ext = image_file.substring(pos, image_length);
            var final_ext = ext.toLowerCase();
            for (i = 0; i < extensions.length; i++)
            {
                if(extensions[i] == final_ext)
                {
                return true;
                
                }
            }
            alert("Image Extension Not Valid (Use Jpg,jpeg)");
            return false;
        }
        
</script>
</head>

<body>
	<div class="login-page bk-img">
		<div class="form-content">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1 class="text-center text-bold mt-2x">Register</h1>
                        <div class="hr-dashed"></div>
						<div class="well row pt-2x pb-3x bk-light text-center">
                         <form method="post" class="form-horizontal" enctype="multipart/form-data" name="regform" onSubmit="return validate();">
                            <div class="form-group">
                            <label class="col-sm-1 control-label">Name<span style="color:red">*</span></label>
                            <div class="col-sm-5">
                            <input type="text" name="name" class="form-control" required>
                            </div>
                            <label class="col-sm-1 control-label">Email<span style="color:red">*</span></label>
                            <div class="col-sm-5">
                            <input type="text" name="email" class="form-control" required>
                            </div>
                            </div>

                            <div class="form-group">
                            <label class="col-sm-1 control-label">Password<span style="color:red">*</span></label>
                            <div class="col-sm-5">
                            <input type="password" name="password" class="form-control" id="password" required >
                            </div>
				    
			    <label class="col-sm-1 control-label">Confirm Password<span style="color:red">*</span></label>
                            <div class="col-sm-5">
                            <input type="password" name="confirm password" class="form-control" id="password" required >
                            </div>

                            <label class="col-sm-1 control-label">Designation<span style="color:red">*</span></label>
                            <div class="col-sm-5">
                            <input type="text" name="designation" class="form-control" required>
                            </div>
                            </div>

                             <div class="form-group">
                            <label class="col-sm-1 control-label">Gender<span style="color:red">*</span></label>
                            <div class="col-sm-5">
                            <select name="gender" class="form-control" required>
                            <option value="">Select</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            </select>
                            </div>

                            <label class="col-sm-1 control-label">Phone<span style="color:red">*</span></label>
                            <div class="col-sm-5">
                            <input type="number" name="mobileno" class="form-control" required>
                            </div>
                            </div>

                             

                             <div class="form-group">
                            <label class="col-sm-1 control-label">Batch<span style="color:red">*</span></label>
                            <div class="col-sm-5">
                            <select name="batch" class="form-control" required>
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
                            <label class="col-sm-1 control-label">Whatsapp<span style="color:red">*</span></label>
                            <div class="col-sm-5">
                            <input type="number" name="whatsapp" class="form-control" required>
                            </div>
                            </div>
                            
                            <div class="form-group">
                            <label class="col-sm-1 control-label">Passing<span style="color:red">*</span> Year</label>
                            <div class="col-sm-5">
                            <input type="text" name="py" class="form-control" required>
                            </div>
                            <label class="col-sm-1 control-label">Working<span style="color:red">*</span> company/inst.</label>
                            <div class="col-sm-5">
                            <input type="text" name="company" class="form-control" required>
                            </div>
                            </div>

                            <div class="form-group">
                            <label class="col-sm-1 control-label">Location<span style="color:red">*</span> of Work</label>
                            <div class="col-sm-5">
                            <input type="text" name="location" class="form-control" required>
                            </div>
                            <label class="col-sm-1 control-label">Joining<span style="color:red">*</span> Year</label>
                            <div class="col-sm-5">
                            <input type="text" name="jy" class="form-control" required>
                            </div>
                            </div>

                            <div class="form-group">
                            <label class="col-sm-1 control-label">Current<span style="color:red">*</span> Post</label>
                            <div class="col-sm-5">
                            <input type="text" name="post" class="form-control" required>
                            </div>
                            <label class="col-sm-1 control-label">GATE<span style="color:red">*</span> Rank&Score</label>
                            <div class="col-sm-5">
                            <input type="text" name="gate" class="form-control" required>
                            </div>
                            </div>

                            <div class="form-group">
                             <label class="col-sm-1 control-label">Something<span style="color:red">*</span> about your achievement</label>
                            <div class="col-sm-5">
                            <div><textarea name="yapl" type="text" class="form-control" required>Enter text here...</textarea></div>
                            </div>   
                            <label class="col-sm-1 control-label">Avtar<span style="color:red">*</span></label>
                            <div class="col-sm-5">
                            <div><input type="file" name="image" class="form-control"></div>
                            </div>
                            </div>

								<br>
                                <button class="btn btn-primary" name="submit" type="submit">Register</button>
                                </form>
                                <br>
                                <br>
								<p>Already Have Account? <a href="index.php" >Signin</a></p>
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

</body>
</html>
