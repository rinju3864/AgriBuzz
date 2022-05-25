<?php
if(!isset($_SESSION)) { session_start(); }
include("header.php");
include("dbconnection.php");
if(!isset($_SESSION['workerid']))
{
	echo "<script>window.location='index.php';</script>";
}
if($_SESSION['randnumber']  == $_POST['randnumber'])
{
if(isset($_POST['submit']))
{
	$imgname1 = rand() . $_FILES['biodata']['name'];
	move_uploaded_file($_FILES['biodata']['tmp_name'],"imgworker/" . $imgname1);
	
	$sql ="UPDATE worker SET name='$_POST[name]', address='$_POST[address]', state_id='$_POST[state]', city_id='$_POST[city]', country_id='$_POST[country]', pincode='$_POST[pincode]',contactno='$_POST[contct]', work_profile='$_POST[workprofile]', ";
	if($_FILES['biodata'][name] != "")
	{
		$sql = $sql . " biodata='$imgname1', ";
	}
	$sql = $sql . " date_of_birth='$_POST[dob]', login_id='$_POST[loginid]',  expected_salary='$_POST[expectedsalary]', status='Active' WHERE worker_id='$_SESSION[workerid]'";
		if(!mysqli_query($con,$sql))
		{
			echo "Error in mysqli query";
		}
		else
		{
			echo "<script>alert('Worker profile updated successfully...');</script>";
		}
}
}
$randnumber = rand();
$_SESSION['randnumber'] = $randnumber;
if(isset($_SESSION['workerid']))
{
	$sql = "SELECT * FROM worker WHERE worker_id='$_SESSION[workerid]'";
	$qsql = mysqli_query($con,$sql);
	$rsedit = mysqli_fetch_array($qsql);
}
?>
  <main id="main">


    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container">

        <div class="text-center" data-aos="zoom-in">
		<br><br>
          <h3>Worker Profile</h3>
        </div>

      </div>
    </section><!-- End Cta Section -->


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">
        <div class="row">

          <div class="col-lg-12" data-aos="fade-up" data-aos-delay="100">
            <div class="info mt-4">
			
		<center><h4>Keep Your Profile Updated Here..</h4></center><hr>

<form method="post" action="" enctype="multipart/form-data"  name="frmworkreg" onSubmit="return validateworkreg()">
<input type="hidden" name="randnumber" value="<?php echo $randnumber; ?>" >
				  
<div class="form-row">
	<div class="col-md-6 form-group">
	Name  <font color="#FF0000">*</font>
	  <input type="text" name="name" id="name" value="<?php echo $rsedit['name']; ?>" autofocus class="form-control" >
	</div>	
	
	<div class="col-md-6 form-group">
	Email ID <font color="#FF0000">*</font>
	  <input type="email" name="loginid" id="loginid" value="<?php echo $rsedit['login_id']; ?>" class="form-control" >
	</div>	
	
	<div class="col-md-12 form-group">
	 Address <font color="#FF0000">*</font>
	  <textarea name="address" id="address" class="form-control"><?php echo $rsedit['address']; ?></textarea>
	</div>
	
	<div class="col-md-6 form-group">
	Country <font color="#FF0000"> *</font>
	  <select name="country" id="country" onChange="loadstate(this.value)" class="form-control">
		  <option value="">Select</option>
		  <?php
		  $sql1 = "SELECT * FROM country where status='Active'";
			$qsql1 =mysqli_query($con,$sql1);
		  while($rssql1 = mysqli_fetch_array($qsql1))
		  {
			  if($rssql1['country_id'] == $rsedit['country_id'] )
			  {
			  echo "<option value='$rssql1[country_id]' selected>$rssql1[country]</option>";
			  }
			  else
			  {
			  echo "<option value='$rssql1[country_id]'>$rssql1[country]</option>";
			  }
		  }
		  ?>
		</select>
	</div>
	
	<div class="col-md-6 form-group">
	State <font color="#FF0000"> *</font>
	  <span id='loadstate'><select name="state" id="state" class="form-control">
                                   <option value="">Select</option>
                                  <?php
								  $sql2 = "SELECT * FROM state where status='Active'";
									$qsql2 =mysqli_query($con,$sql2);
								  while($rssql2 = mysqli_fetch_array($qsql2))
								  {
									  if($rssql2['state_id'] == $rsedit['state_id'] )
									  {
									  echo "<option value='$rssql2[state_id]' selected>$rssql2[state]</option>";
									  }
									  else
									  {
									  echo "<option value='$rssql2[state_id]'>$rssql2[state]</option>";
									  }
								  }
								  ?>
						          </select></span>
	</div>
	
	<div class="col-md-6 form-group">
	City <font color="#FF0000"> *</font>
	  <span id='loadcity'><select name="city" id="city" class="form-control">
                                   <option value="">Select</option>
                                  <?php
								  $sql3 = "SELECT * FROM city where status='Active'";
									$qsql3 =mysqli_query($con,$sql3);
								  while($rssql3 = mysqli_fetch_array($qsql3))
								  {
									  if($rssql3['city_id'] == $rsedit['city_id'] )
									  {
									  echo "<option value='$rssql3[city_id]' selected>$rssql3[city]</option>";
									  }
									  else
									  {
									  echo "<option value='$rssql3[city_id]'>$rssql3[city]</option>";
									  }
								  }
								  ?>
						          </select></span>
	</div>
	
	<div class="col-md-6 form-group">
	Pincode <font color="#FF0000"> *</font>
	  <input type="number" name="pincode" id="pincode" value="<?php echo $rsedit['pincode']; ?>" class="form-control">
	</div>
	
	<div class="col-md-6 form-group">
	Contact Number <font color="#FF0000"> *</font>
	  <input type="number" name="contct" id="contct" value="<?php echo $rsedit['contactno']; ?>" class="form-control">
	</div>
	
	
	<div class="col-md-6 form-group">
		Biodata  <font color="#FF0000">*</font>
		<input type="file" name="biodata" id="biodata"  class="form-control">
        <a href='imgworker/<?php echo $rsedit['biodata']; ?>' target="_blank" >Download Biodata</a>
	</div>
	
	<div class="col-md-12 form-group">
		Work Profile  (Kindly mention Work profile, experience, etc..) <font color="#FF0000">*</font>
		<textarea name="workprofile" id="workprofile" class="form-control"><?php echo $rsedit['work_profile']; ?></textarea>
	</div>
	

	<div class="col-md-6 form-group">
		Date of Birth  <font color="#FF0000">*</font>
	  <input type="date" name="dob" id="dob" value="<?php echo $rsedit['date_of_birth']; ?>" autofocus class="form-control" >
	</div>	
	
	
	<div class="col-md-6 form-group">
		Expected salary  <font color="#FF0000">*</font>
		<input type="number" name="expectedsalary" id="expectedsalary" value="<?php echo $rsedit['expected_salary']; ?>" autofocus class="form-control" >
	</div>	
	
	
</div>
<hr>
<button type="submit" name="submit" id="submit" class="btn btn-info btn-lg btn-block" >Click here to update</button>

</form>
            </div>
		  </div>
		  
        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->
  
<?php
include("footer.php");
?>
<script>
$(document).ready( function () {
    $('#datatable').DataTable();
} );
</script>
	<script type="application/javascript">
	function validateworkreg()
	{
		var alphaExp = /^[a-zA-Z]+$/; //Variable to validate only alphabets
var alphaspaceExp = /^[a-zA-Z\s]+$/; //Variable to validate only alphabets and space
var numericExpression = /^[0-9]+$/; //Variable to validate only numbers
var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/; //Variable to validate Email ID

		if(document.frmworkreg.name.value == "")
	{
		alert("Worker name should not be empty..");
		document.frmworkreg.name.focus();
		return false;
	}
	else if(!document.frmworkreg.name.value.match(alphaspaceExp))
	{
		alert("Please enter only letters for your name..");
		document.frmworkreg.name.focus();
		return false;
	}
	else if(document.frmworkreg.address.value == "")
	{
		alert("Address should not be empty..");
		document.frmworkreg.address.focus();
		return false;
	}
	else if(document.frmworkreg.country.value == "")
	{
		alert("Kindly select a country..");
		document.frmworkreg.country.focus();
		return false;
	}
	else if(document.frmworkreg.state.value == "")
	{
		alert("Kindly select a state..");
		document.frmworkreg.state.focus();
		return false;
	}
	else if(document.frmworkreg.city.value == "")
	{
		alert("Kindly select a city..");
		document.frmworkreg.city.focus();
		return false;
	}
	else if(document.frmworkreg.pincode.value == "")
	{
		alert("Kindly enter the PIN Code..");
		document.frmworkreg.pincode.focus();
		return false;
	}
	else if(document.frmworkreg.contct.value == "")
	{
		alert("Kindly enter the Contact Number..");
		document.frmworkreg.contct.focus();
		return false;
	}
	else if(document.frmworkreg.workprofile.value == "")
	{
		alert("Work Profile should not be blank..");
		document.frmworkreg.workprofile.focus();
		return false;
	}
	else if(document.frmworkreg.biodata.value == "")
	{
		alert("Kindly enter the biodata..");
		document.frmworkreg.biodata.focus();
		return false;
	}
	else if(document.frmworkreg.dob.value == "")
	{
		alert("Date of Birth should not be blank..");
		document.frmworkreg.dob.focus();
		return false;
	}
	else if(document.frmworkreg.loginid.value == "")
	{
		alert("E-Mail ID should not be blank..");
		document.frmworkreg.loginid.focus();
		return false;
	}
	else if(!document.frmworkreg.loginid.value.match(emailExp))
	{
		alert("Kindly enter Valid Email ID..");
		document.frmworkreg.loginid.focus();
		return false;
	}
	else if(document.frmworkreg.password.value == "")
	{
		alert("Password should not be blank..");
		document.frmworkreg.password.focus();
		return false;
	}
	else if(document.frmworkreg.password.value.length < 8)
	{
		alert("Password length should be more than 8 characters...");
		document.frmworkreg.password.focus();
		return false;
	}
	else if(document.frmworkreg.password.value.length > 16)
	{
		alert("Password length should be less than 16 characters...");
		document.frmworkreg.password.focus();
		return false;
	}
	else if(document.frmworkreg.cpassword.value == "")
	{
		alert("Confirm password should not be blank..");
		document.frmworkreg.password.focus();
		return false;
	}
	else if(document.frmworkreg.password.value != document.frmworkreg.cpassword.value)
	{
		alert("Password and confirm password not matching...");
		document.frmworkreg.cpassword.focus();
		return false;
	}
		else if(document.frmworkreg.expectedsalary.value == "")
	{
		alert("Kindly enter the expected salary..");
		document.frmworkreg.cpassword.focus();
		return false;
	}
	else
	{
		return true;
	}
	}
	</script>