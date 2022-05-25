<?php
include("header.php");
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
?>
  <main id="main">
  
      <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Worker Login/Register</h2>
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
          <div class="col-lg-4">
            <div class="section-title" data-aos="fade-right">
              <h2>Worker Login/Register</h2>
              <p>Are you willing to purchase products from Farmer's?<br> <b>Login / Register as Worker</b></p>
            </div>
          </div>
          <div class="col-lg-8">
            <div class="row">
			
              <div class="col-md-6 d-flex align-items-stretch">
                <div class="icon-box" data-aos="zoom-in" data-aos-delay="100" style="width: 100%;">
                  <div class="icon"><i class="bx bx-lock"></i></div>
                  <h4><a href="workerloginpanel.php">Existing Worker</a></h4>
				        
				  <button type="button" class="btn btn-info btn-lg btn-block" onclick="window.location='workerloginpanel.php'">Sign In  & Get Started</button>
                </div>
              </div>

              <div class="col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
                <div class="icon-box" data-aos="zoom-in" data-aos-delay="200" style="width: 100%;">
                  <div class="icon"><i class="bx bx-file"></i></div>
                  <h4><a href="worker.php">New Worker</a></h4>
				  <button type="button" class="btn btn-warning btn-lg btn-block"  onclick="window.location='worker.php'" >Sign Up (It's Free)</button>
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