<?php 
include("header.php");
include("dbconnection.php");
if(!isset($_SESSION['adminid']))
{
	echo "<script>window.location='adminloginpanel.php'; </script>";
}
if($_SESSION['randnumber']  == $_POST['randnumber'])
{
if(isset($_POST['submit']))
{
	if(isset($_GET['editid']))
	{
		$sql ="UPDATE country SET `country`='$_POST[country]', `description`='$_POST[description]', `status`='$_POST[status]' WHERE country_id='$_GET[editid]'";
		if(!mysqli_query($con,$sql))
		{
			echo "Error in mysqli query";
		}
		else
		{
			echo "<script>alert('Country record updated successfully...');</script>";
		}
	}
	else
	{
$sql="INSERT INTO `country`(`country_id`, `country`, `description`, `status`) VALUES ('','$_POST[country]','$_POST[description]','$_POST[status]')";	

if(!mysqli_query($con,$sql))
	{
		echo "Error in mysqli query";
	}
	else
	{
		echo "<script>alert('Country record inserted successfully...');</script>";
	}
	}
}
}
$randnumber = rand();
$_SESSION['randnumber'] = $randnumber;
if(isset($_GET['editid']))
{
	$sql = "SELECT * FROM country WHERE country_id='$_GET[editid]'";
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
          <h3>Country</h3>
        </div>

      </div>
    </section><!-- End Cta Section -->


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">
        <div class="row">
		

          <div class="col-lg-12" data-aos="fade-up" data-aos-delay="100">
            <div class="info mt-4 ">
			
		<center><h4>Enter Country Detail...</h4></center><hr>

<form method="post" action="" name="frmcountry" onSubmit="return validatecountry()">
<input type="hidden" name="randnumber" value="<?php echo $randnumber; ?>" >
				  
<div class="form-row">
	<div class="col-md-12 form-group">
	Country <font color="#FF0000">*</font>
	  <input type="text" name="country" id="country" value="<?php echo $rsedit['country']; ?>" autofocus class="form-control" >
	</div>	
	
	<div class="col-md-12 form-group">
	Description <font color="#FF0000">*</font>
	  <textarea  name="description" id="description" class="form-control" ><?php echo $rsedit['description']; ?></textarea>
	</div>	
	
	<div class="col-md-12 form-group">
	Status <font color="#FF0000">*</font>
	  <select name="status" id="status" class="form-control">
			<option value="">Select Status</option>
		  <?php
		  $arr= array("Active","Inactive");
		  foreach($arr as $val)
		  {
			  if($rsedit['status'] == $val)
			  {
			  echo "<option value='$val' selected >$val</option>";
			  }
			  else
			  {
			  echo "<option value='$val'>$val</option>";
			  }
		  }
		  ?>
	  </select>
	</div>	
	
</div>

<hr>
<button type="submit" name="submit" id="submit" class="btn btn-info btn-lg btn-block" >Submit</button>

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
	<script type="application/javascript">
	function validatecountry()
	{
		var alphaspaceExp = /^[a-zA-Z\s]+$/; //Variable to validate only alphabets and space
		if(document.frmcountry.country.value == "")
	{
		alert("Country name should not be empty..");
		document.frmcountry.country.focus();
		return false;
	}
	else if(!document.frmcountry.country.value.match(alphaspaceExp))
	{
		alert("Please enter only letters for country ..");
		document.frmcountry.country.focus();
		return false;
	}
	else
	{
		return true;
	}
	}
	</script>