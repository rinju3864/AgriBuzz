<?php
include("header.php");
if(!isset($_SESSION['sellerid']))
{
	echo "<script>window.location='sellerloginpanel.php';</script>";
}
if(isset($_SESSION['sellerid']))
{
	$sql = "SELECT * FROM seller WHERE seller_id='$_SESSION[sellerid]'";
	$qsql = mysqli_query($con,$sql);
	$rsdisp = mysqli_fetch_array($qsql);
}
?>
  <main id="main">


    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container">

        <div class="text-center" data-aos="zoom-in">
		<br><br>
          <h3>Keep Track of Your Progress...</h3>
        </div>

      </div>
    </section><!-- End Cta Section -->


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

		<div class="row">
          <div class="col-lg-12" data-aos="fade-up" data-aos-delay="100">
            <div class="info mt-4">
<!--  ###################################################### -->
<!--  ###################################################### -->
<?php
$loopcount = 0;
$sql = "SELECT * FROM product";
if(isset($_SESSION['sellerid']))
{
  $sql = $sql . " WHERE seller_id='$_SESSION[sellerid]'";
}
$qsql = mysqli_query($con,$sql);
while($rs = mysqli_fetch_array($qsql))
{
   $sql1 = "SELECT * FROM category WHERE category_id='$rs[category_id]'";
  $qsql1 = mysqli_query($con,$sql1);
  $rs1 = mysqli_fetch_array($qsql1);
  
   $sql2 = "SELECT * FROM produce WHERE produce_id='$rs[produce_id]'";
  $qsql2 = mysqli_query($con,$sql2);
  $rs2= mysqli_fetch_array($qsql2);
  
   $sql3 = "SELECT * FROM variety WHERE variety_id='$rs[variety_id]'";
  $qsql3 = mysqli_query($con,$sql3);
  $rs3 = mysqli_fetch_array($qsql3);
  
	$producetitle[$loopcount] =  $rs['title'];	

//3 Months back
$monthstartdt = date("Y-m-01", strtotime ( '-3 month' , strtotime ( date("Y-m-d") ) ));
$monthenddt = date("Y-m-t", strtotime ( '-3 month' , strtotime ( date("Y-m-d") ) ));
$sqlpurchase_order_bill = "SELECT IFNULL(sum(purchase_order.purchase_amt),0) FROM purchase_order_bill INNER JOIN purchase_order ON purchase_order_bill.purchase_order_id=purchase_order.purchase_order_id WHERE purchase_order_bill.paid_date BETWEEN '$monthstartdt' AND '$monthenddt' AND purchase_order.product_id='$rs[product_id]'";
$qsqlpurchase_order_bill = mysqli_query($con,$sqlpurchase_order_bill);
$rspurchase_order_bill = mysqli_fetch_array($qsqlpurchase_order_bill);
$profit[$loopcount] = $profit[$loopcount] . $rspurchase_order_bill[0] . ",";
$monthrec = $monthrec . "'" . date("F Y", strtotime ( '-3 month' , strtotime ( date("Y-m-d") ) )) . "',";

//2 Months back
$monthstartdt = date("Y-m-01", strtotime ( '-2 month' , strtotime ( date("Y-m-d") ) ));
$monthenddt = date("Y-m-t", strtotime ( '-2 month' , strtotime ( date("Y-m-d") ) ));
$sqlpurchase_order_bill = "SELECT IFNULL(sum(purchase_order.purchase_amt),0) FROM purchase_order_bill INNER JOIN purchase_order ON purchase_order_bill.purchase_order_id=purchase_order.purchase_order_id WHERE purchase_order_bill.paid_date BETWEEN '$monthstartdt' AND '$monthenddt' AND purchase_order.product_id='$rs[product_id]'";
$qsqlpurchase_order_bill = mysqli_query($con,$sqlpurchase_order_bill);
$rspurchase_order_bill = mysqli_fetch_array($qsqlpurchase_order_bill);
$profit[$loopcount] = $profit[$loopcount] . $rspurchase_order_bill[0] . ",";
$monthrec = $monthrec . "'" . date("F Y", strtotime ( '-2 month' , strtotime ( date("Y-m-d") ) )) . "',";

//1 Month back
$monthstartdt = date("Y-m-01", strtotime ( '-1 month' , strtotime ( date("Y-m-d") ) ));
$monthenddt = date("Y-m-t", strtotime ( '-1 month' , strtotime ( date("Y-m-d") ) ));
$sqlpurchase_order_bill = "SELECT IFNULL(sum(purchase_order.purchase_amt),0) FROM purchase_order_bill INNER JOIN purchase_order ON purchase_order_bill.purchase_order_id=purchase_order.purchase_order_id WHERE purchase_order_bill.paid_date BETWEEN '$monthstartdt' AND '$monthenddt' AND purchase_order.product_id='$rs[product_id]'";
$qsqlpurchase_order_bill = mysqli_query($con,$sqlpurchase_order_bill);
$rspurchase_order_bill = mysqli_fetch_array($qsqlpurchase_order_bill);
$profit[$loopcount] = $profit[$loopcount] . $rspurchase_order_bill[0] . ",";
$monthrec = $monthrec . "'" . date("F Y", strtotime ( '-1 month' , strtotime ( date("Y-m-d") ) )) . "',";
//Current Month
$monthstartdt = date('Y-m-01', strtotime(date("Y-m-d")));
$monthenddt = date('Y-m-t', strtotime(date("Y-m-d")));
$sqlpurchase_order_bill = "SELECT IFNULL(sum(purchase_order.purchase_amt),0) FROM purchase_order_bill INNER JOIN purchase_order ON purchase_order_bill.purchase_order_id=purchase_order.purchase_order_id WHERE purchase_order_bill.paid_date BETWEEN '$monthstartdt' AND '$monthenddt' AND purchase_order.product_id='$rs[product_id]'";
$qsqlpurchase_order_bill = mysqli_query($con,$sqlpurchase_order_bill);
$rspurchase_order_bill = mysqli_fetch_array($qsqlpurchase_order_bill);
$profit[$loopcount] = $profit[$loopcount] . $rspurchase_order_bill[0] . ",";
$monthrec = $monthrec . "'" . date("F Y") . "'";
}								  	  
$prolist = 0;							  
foreach($producetitle as $val)
{
	$productwise =  $productwise .  "{
            name: '$val',
            data: [$profit[$prolist]]
      },
		";							
	$prolist = $prolist + 1;		  
}
//echo $productwise;
?>
<style type="text/css">
${demo.css}
</style>
<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
<!--  ###################################################### -->
<!--  ###################################################### -->
			</div>
		  </div>
        </div>
		

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->
<?php
include("footer.php");
?>


  <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
  <script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            type: 'area'
        },
        title: {
            text: 'Farm Produce Sales Representation'
        },
        subtitle: {
            text: 'Monthly sales chart'
        },
        xAxis: {
            categories: [ <?php echo $monthrec; ?>],
            tickmarkPlacement: 'on',
            title: {
                enabled: false
            }
        },
        yAxis: {
            title: {
                text: 'Rupees'
            },
            labels: {
                formatter: function () {
                    return this.value;
                }
            }
        },
        tooltip: {
            shared: true,
            valueSuffix: ' Rupees'
        },
        plotOptions: {
            area: {
                stacking: 'normal',
                lineColor: '#666666',
                lineWidth: 1,
                marker: {
                    lineWidth: 1,
                    lineColor: '#666666'
                }
            }
        },
        series: [
		<?php
		echo $productwise;
		?>
		]
    });
});
		</script>