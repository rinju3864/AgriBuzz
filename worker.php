<?php
include("header.php");
if(!isset($_GET['editid']))
{
	if(isset($_SESSION['customerid']))
	{
		echo "<script>window.location='customerpanel.php';</script>";
	}
	if(isset($_SESSION['sellerid']))
	{
		echo "<script>window.location='sellerpanel.php';</script>";
	}
	if(isset($_SESSION['workerid']))
	{
		echo "<script>window.location='workerpanel.php';</script>";
	}
	if(isset($_SESSION['adminid']))
	{
		echo "<script>window.location='adminpanel.php';</script>";
	}
}
if($_SESSION['randnumber']  == $_POST['randnumber'])
{
	if(isset($_POST['submit']))
	{
		$imgname1 = rand() . $_FILES['biodata']['name'];
		move_uploaded_file($_FILES['biodata']['tmp_name'],"imgworker/" . $imgname1);
		if(isset($_GET['editid']))
		{
			$sql ="UPDATE worker SET name='$_POST[name]', address='$_POST[address]', state_id='$_POST[state]', city_id='$_POST[city]', country_id='$_POST[country]', pincode='$_POST[pincode]',contactno='$_POST[contct]', work_profile='$_POST[workprofile]'";
			if($_FILES['biodata']['name'] != "")
			{
			$sql =$sql . " , biodata='$imgname1'";
			}
			$sql =$sql . ", date_of_birth='$_POST[dob]', login_id='$_POST[loginid]', password='$_POST[password]', expected_salary='$_POST[expectedsalary]', status='Active' WHERE worker_id='$_GET[editid]'";
			if(!mysqli_query($con,$sql))
			{
				echo "Error in mysqli query";
			}
			else
			{
				echo "<script>alert('Worker record updated successfully...');</script>";
			}
		}
		else
		{
			$sql="INSERT INTO worker( name, address, state_id, city_id, country_id, pincode, contactno, work_profile, biodata, date_of_birth, login_id, password, expected_salary, status) VALUES ('$_POST[name]','$_POST[address]','$_POST[state]','$_POST[city]','$_POST[country]','$_POST[pincode]','$_POST[contct]','$_POST[workprofile]','$imgname1','$_POST[dob]','$_POST[loginid]','$_POST[password]','$_POST[expectedsalary]','Active')";
			if(!mysqli_query($con,$sql))
			{
				echo "Error in mysqli query";
			}
			else
			{
				echo "<script>alert('Worker Registration done successfully...');</script>";
				echo "<script>window.location='workerloginpanel.php';</script>";		
			}
		}
	}
}
$randnumber = rand();
$_SESSION['randnumber'] = $randnumber;
if(isset($_GET['editid']))
{
	$sql = "SELECT * FROM worker WHERE worker_id='$_GET[editid]'";
	$qsql = mysqli_query($con,$sql);
	$rsedit = mysqli_fetch_array($qsql);
}
?>
  <main id="main">
  
      <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Worker Registration Panel</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->
<hr>

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="row">
			
              <div class="col-md-3 d-flex align-items-stretch mt-4 mt-lg-0">
                <div class="icon-box" data-aos="zoom-in" data-aos-delay="200" style="width: 100%;">
                  <h4>Register as Worker</h4>
                  <img src="images/workers.png" style="width: 100%;">
                </div>
              </div>
              <div class="col-md-9 d-flex align-items-stretch">
                <div class="icon-box" data-aos="zoom-in" data-aos-delay="100" style="width: 100%;text-align: left;">
<form method="post" action="" enctype="multipart/form-data"  name="frmworkreg" onSubmit="return validateworkreg()">
<input type="hidden" name="randnumber" value="<?php echo $randnumber; ?>" >
<input type="hidden" name="editid" id="editid" value="<?php 
if(isset($_GET['editid']))
{
	echo $_GET['editid'];
}
else
{
	echo 0;
}
 ?>" >
                  <h4>Worker Registration Panel</h4>
				  
<div class="form-row">
	<div class="col-md-6 form-group">
	Name  <font color="#FF0000">*</font>
	  <input type="text" name="name" id="name" value="<?php echo $rsedit['name']; ?>" autofocus class="form-control" >
	</div>	
	
	<div class="col-md-6 form-group">
	Email ID <font color="#FF0000">*</font>
	  <input type="email" name="loginid" id="loginid" value="<?php echo $rsedit['login_id']; ?>" class="form-control" >
	</div>	
	
	<div class="col-md-6 form-group">
	Password <font color="#FF0000">*</font>
	  <input type="password" name="password" id="password" value="<?php echo $rsedit['password']; ?>" class="form-control" >
	</div>
	
	<div class="col-md-6 form-group">
	Confirm Password <font color="#FF0000">*</font>
	  <input type="password" name="cpassword" id="cpassword" value="<?php echo $rsedit['password']; ?>" class="form-control" >
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
	  <span id='loadstate'><?php include("ajaxstate.php"); ?></span>
	</div>
	
	<div class="col-md-6 form-group">
	City <font color="#FF0000"> *</font>
	  <span id='loadcity'><?php include("ajaxcity.php"); ?></span>
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
		<?php
		if(isset($_GET['editid']))
		{	
			if(file_exists("imgworker/". $rsedit['biodata']))
			{
				echo "<a href='imgworker/".$rsedit['biodata'] . "' download>Download</a>";
			}
		}
		?>
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
<button type="submit" name="submit" id="submit" class="btn btn-info btn-lg btn-block" >Click here to Register</button>

</form>
                </div>
              </div>


            </div>
          </div>
        </div>

      </div>
    </section><!-- End Services Section -->

<hr>
  </main><!-- End #main -->
  
<?php
include("footer.php");
?>
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
	else if(document.frmworkreg.contct.value.length != 10)
	{
		alert("Contact Number should contain 10 digits..");
		document.frmworkreg.contct.focus();
		return false;
	}
	else if(document.frmworkreg.workprofile.value == "")
	{
		alert("Work Profile should not be blank..");
		document.frmworkreg.workprofile.focus();
		return false;
	}
	else if(document.frmworkreg.biodata.value == "" && document.frmworkreg.editid.value == 0)
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
	
	
function loadstate(id) {
    if (id == "") {
        document.getElementById("loadstate").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("loadstate").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","ajaxstate.php?id="+id,true);
        xmlhttp.send();
    }
}
function loadcity(id) {
    if (id == "") {
        document.getElementById("loadcity").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("loadcity").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","ajaxcity.php?id="+id,true);
        xmlhttp.send();
    }
}
	</script>