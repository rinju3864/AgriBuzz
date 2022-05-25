<?php
include("header.php");
?>

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
      <h1>AgriBuzz - Change The Way You Trade...</h1>
      <h2>Agriculture Management System is to help farmers by providing all kinds agriculture related information in the website...</h2>
      <a href="aboutus.php" class="btn-get-started scrollto">Get Started</a>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients">
      <div class="container">

        <div class="row">

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center" data-aos="zoom-in" data-aos-delay="100">
            <img src="assets/img/clients/client-1.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center" data-aos="zoom-in" data-aos-delay="200">
            <img src="assets/img/clients/client-2.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center" data-aos="zoom-in" data-aos-delay="300">
            <img src="assets/img/clients/client-3.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center" data-aos="zoom-in" data-aos-delay="400">
            <img src="assets/img/clients/client-4.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center" data-aos="zoom-in" data-aos-delay="500">
            <img src="assets/img/clients/client-5.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center" data-aos="zoom-in" data-aos-delay="600">
            <img src="assets/img/clients/client-6.png" class="img-fluid" alt="">
          </div>

        </div>

      </div>
    </section><!-- End Clients Section -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row content">
          <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
<img src="img/pja1.jpg" style="width: 100%;">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-left" data-aos-delay="200">
            <p class="font-italic"><b>Mission :</b> To provide technology and services to farmers, merchants, and farm labourers to help them expand their business and provide them with a wider market. And to improve the present farming processes and to provide knowledge about recent agricultural issues.
            </p>
            <p class="font-italic"><b>Vision :</b> To provide a helping hand to the farmers and farm labourers in improving their lives through the medium of technology, thereby, improving the Agricultural Sector in the Indian Economy.
            </p>
            <ul>
              <li><i class="ri-check-double-line"></i> ‘Agri Buzz' is a model farmer management website application..</li>
              <li><i class="ri-check-double-line"></i> ‘Agri Buzz’ provides a concept of virtual agricultural trade to its users.</li>
              <li><i class="ri-check-double-line"></i> It helps the wholesalers and retailers in buying produce from larger number of farmers.</li>
            </ul>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container">

        <div class="row counters">

          <div class="col-lg-2 col-4 text-center">
            <span data-toggle="counter-up"><?php
$sql = "select * from seller";
$qsql = mysqli_query($con,$sql);
echo mysqli_num_rows($qsql);
			?></span>
            <p>Farmers</p>
          </div>

          <div class="col-lg-2 col-4 text-center">
            <span data-toggle="counter-up"><?php
$sql = "select * from customer";
$qsql = mysqli_query($con,$sql);
echo mysqli_num_rows($qsql);
			?></span>
            <p>Customers</p>
          </div>
		  
          <div class="col-lg-2 col-4 text-center">
            <span data-toggle="counter-up"><?php
$sql = "select * from article";
$qsql = mysqli_query($con,$sql);
echo mysqli_num_rows($qsql);
			?></span>
            <p>Blogs & Articles</p>
          </div>

          <div class="col-lg-2 col-4 text-center">
            <span data-toggle="counter-up"><?php
$sql = "select * from product";
$qsql = mysqli_query($con,$sql);
echo mysqli_num_rows($qsql);
			?></span>
            <p>Farmer's Kit</p>
          </div>

          <div class="col-lg-2 col-4 text-center">
            <span data-toggle="counter-up"><?php
$sql = "select * from selling_product";
$qsql = mysqli_query($con,$sql);
echo mysqli_num_rows($qsql);
			?></span>
            <p>Farmer's Market</p>
          </div>

          <div class="col-lg-2 col-4 text-center">
            <span data-toggle="counter-up"><?php
$sql = "select * from worker";
$qsql = mysqli_query($con,$sql);
echo mysqli_num_rows($qsql);
			?></span>
            <p>Workers</p>
          </div>


        </div>

      </div>
    </section><!-- End Counts Section -->

  </main><!-- End #main -->
  
<?php
include("footer.php");
?>