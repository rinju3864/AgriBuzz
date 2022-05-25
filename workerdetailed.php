<?php
include("header.php");
if(isset($_GET['workerid']))
{
	$sql = "SELECT * FROM worker WHERE worker_id='$_GET[workerid]'";
	$qsql = mysqli_query($con,$sql);
	$rsedit = mysqli_fetch_array($qsql);
}
?>
<style>

.pricing-table .plan {
  margin-left:0px;
  border-radius: 5px;
  text-align: center;
  background-color: #f3f3f3;
  -moz-box-shadow: 0 0 6px 2px #b0b2ab;
  -webkit-box-shadow: 0 0 6px 2px #b0b2ab;
  box-shadow: 0 0 6px 2px #b0b2ab;
}
 
 .plan:hover {
  background-color: #fff;
  -moz-box-shadow: 0 0 12px 3px #b0b2ab;
  -webkit-box-shadow: 0 0 12px 3px #b0b2ab;
  box-shadow: 0 0 12px 3px #b0b2ab;
}
 
 .plan {
  padding: 20px;
  margin-left:0px;
  color: #ff;
  background-color: #5e5f59;
  -moz-border-radius: 5px 5px 0 0;
  -webkit-border-radius: 5px 5px 0 0;
  border-radius: 5px 5px 0 0;
}
  
.plan-name-bronze {
  padding: 20px;
  color: #fff;
  background-color: #665D1E;
  -moz-border-radius: 5px 5px 0 0;
  -webkit-border-radius: 5px 5px 0 0;
  border-radius: 5px 5px 0 0;
 }
  
.plan-name-silver {
  padding: 20px;
  color: #fff;
  background-color: #C0C0C0;
  -moz-border-radius: 5px 5px 0 0;
  -webkit-border-radius: 5px 5px 0 0;
  border-radius: 5px 5px 0 0;
 }
  
.plan-name-gold {
  padding: 20px;
  color: #fff;
  background-color: #FFD700;
  -moz-border-radius: 5px 5px 0 0;
  -webkit-border-radius: 5px 5px 0 0;
  border-radius: 5px 5px 0 0;
  } 
  
.pricing-table-bronze  {
  padding: 20px;
  color: #fff;
  background-color: #f89406;
  -moz-border-radius: 5px 5px 0 0;
  -webkit-border-radius: 5px 5px 0 0;
  border-radius: 5px 5px 0 0;
}
  
.pricing-table .plan .plan-name span {
  font-size: 20px;
}
 
.pricing-table .plan ul {
  list-style: none;
  margin: 0;
  -moz-border-radius: 0 0 5px 5px;
  -webkit-border-radius: 0 0 5px 5px;
  border-radius: 0 0 5px 5px;
}
 
.pricing-table .plan ul li.plan-feature {
  padding: 15px 10px;
  border-top: 1px solid #c5c8c0;
  margin-right: 35px;
}
 
.pricing-three-column {
  margin: 0 auto;
  width: 80%;
}
 
.pricing-variable-height .plan {
  float: none;
  margin-left: 2%;
  vertical-align: bottom;
  display: inline-block;
  zoom:1;
  *display:inline;
}
 
.plan-mouseover .plan-name {
  background-color: #4e9a06 !important;
}
 
.btn-plan-select {
  padding: 8px 25px;
  font-size: 18px;
}
</style>

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>View Worker Details</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row content">
          <div class="col-lg-12 pt-4 pt-lg-0" data-aos="fade-left" data-aos-delay="200">
            <p class="font-italic">


<form method="post" action="" enctype="multipart/form-data"  name="frmworkreg" onSubmit="return validateworkreg()">
<div class="container">
    <div class="pricing-table pricing-three-column row">
		<div class="plan col-sm-12 col-lg-12">
          <div class="plan-name-bronze">
            <h3><?php echo $rsedit['name']; ?></h3>
            <span><?php echo $rsedit['work_profile']; ?></span>
          </div>
          <ul>
            <li class="plan-feature" ><?php echo $rsedit['address']; ?>, <?php
								  $sql3= "SELECT * FROM city where status='Active'";
									$qsql3 =mysqli_query($con,$sql3);
								  while($rssql3 = mysqli_fetch_array($qsql3))
								  {
									  if($rssql3['city_id'] == $rsedit['city_id'] )
									  {
									  echo "$rssql3[city]";
									  }
								  }
								  ?>,  <?php
								  $sql2 = "SELECT * FROM state where status='Active'";
									$qsql2 =mysqli_query($con,$sql2);
								  while($rssql2 = mysqli_fetch_array($qsql2))
								  {
									  if($rssql2['state_id'] == $rsedit['state_id'] )
									  {
									  echo "$rssql2[state]";
									  }
								  }
								  ?>, <?php
								  $sql1 = "SELECT * FROM country where status='Active'";
									$qsql1 =mysqli_query($con,$sql1);
								  while($rssql1 = mysqli_fetch_array($qsql1))
								  {
									  if($rssql1['country_id'] == $rsedit['country_id'] )
									  {
									  echo $rssql1['country'];
									  }
								  }
								  ?>, PIN - <?php echo $rsedit['pincode']; ?></li>
            <li class="plan-feature"><a href='imgworker/<?php echo $rsedit['biodata']; ?>' target="_blank" class="btn btn-secondary" >Download Biodata</a></li>
			
            <li class="plan-feature"><b>Date of Birth:</b> <?php echo date("d-M-Y",strtotime($rsedit['date_of_birth'])); ?></li>
			
            <li class="plan-feature"><b>Expected Payment:</b> <?php echo $rsedit['expected_salary']; ?>/day </li>
			
            <li class="plan-feature">
			
			
			
                        <?php
						  if(isset($_SESSION['sellerid']))
						  {
						?>
<a href="workerrequest.php?workerid=<?php echo $_GET['workerid']; ?>" class="btn btn-primary btn-plan-select"><i class="icon-white icon-ok"></i> Send Request </a>
                        <?php
						  }
						  else
						  {
						?>
<a href="sellerloginpanel.php?redirectlink=<?php echo "workerrequest.php"; ?>&workerid=<?php echo $_GET['workerid']; ?>" class="btn btn-primary btn-plan-select"><i class="icon-white icon-ok"></i> Login & Send Request </a>                          
    	                  <?php
						  }
						  ?>
			
			</li>
          </ul>
        </div>
	
	</div>
</div>
</form>


			</p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

  </main><!-- End #main -->
  
<?php
include("footer.php");
?>