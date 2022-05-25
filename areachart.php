<?php
include("dbconnection.php");
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
//Jan
$sqlpurchase_order_bill = "SELECT IFNULL(sum(purchase_order.purchase_amt),0) FROM purchase_order_bill INNER JOIN purchase_order ON purchase_order_bill.purchase_order_id=purchase_order.purchase_order_id WHERE purchase_order_bill.paid_date BETWEEN '2019-11-01' AND '2019-11-31' AND purchase_order.product_id='$rs[product_id]'";
$qsqlpurchase_order_bill = mysqli_query($con,$sqlpurchase_order_bill);
$rspurchase_order_bill = mysqli_fetch_array($qsqlpurchase_order_bill);
$profit[$loopcount] = $profit[$loopcount] . $rspurchase_order_bill[0] . ",";
//Feb
$sqlpurchase_order_bill = "SELECT IFNULL(sum(purchase_order.purchase_amt),0) FROM purchase_order_bill INNER JOIN purchase_order ON purchase_order_bill.purchase_order_id=purchase_order.purchase_order_id WHERE purchase_order_bill.paid_date BETWEEN '2019-12-01' AND '2019-12-31' AND purchase_order.product_id='$rs[product_id]'";
$qsqlpurchase_order_bill = mysqli_query($con,$sqlpurchase_order_bill);
$rspurchase_order_bill = mysqli_fetch_array($qsqlpurchase_order_bill);
$profit[$loopcount] = $profit[$loopcount] . $rspurchase_order_bill[0] . ",";
//Mar
$sqlpurchase_order_bill = "SELECT IFNULL(sum(purchase_order.purchase_amt),0) FROM purchase_order_bill INNER JOIN purchase_order ON purchase_order_bill.purchase_order_id=purchase_order.purchase_order_id WHERE purchase_order_bill.paid_date BETWEEN '2020-01-01' AND '2020-01-31' AND purchase_order.product_id='$rs[product_id]'";
$qsqlpurchase_order_bill = mysqli_query($con,$sqlpurchase_order_bill);
$rspurchase_order_bill = mysqli_fetch_array($qsqlpurchase_order_bill);
$profit[$loopcount] = $profit[$loopcount] . $rspurchase_order_bill[0] . ",";
//Apr
$sqlpurchase_order_bill = "SELECT IFNULL(sum(purchase_order.purchase_amt),0) FROM purchase_order_bill INNER JOIN purchase_order ON purchase_order_bill.purchase_order_id=purchase_order.purchase_order_id WHERE purchase_order_bill.paid_date BETWEEN '2020-02-01' AND '2020-02-30' AND purchase_order.product_id='$rs[product_id]'";
$qsqlpurchase_order_bill = mysqli_query($con,$sqlpurchase_order_bill);
$rspurchase_order_bill = mysqli_fetch_array($qsqlpurchase_order_bill);
$profit[$loopcount] = $profit[$loopcount] . $rspurchase_order_bill[0] ;
$loopcount = $loopcount +1;

//Nov
$sqlpurchase_order_bill = "SELECT IFNULL(sum(purchase_order.purchase_amt),0) FROM purchase_order_bill INNER JOIN purchase_order ON purchase_order_bill.purchase_order_id=purchase_order.purchase_order_id WHERE purchase_order_bill.paid_date BETWEEN '2020-03-01' AND '2020-03-30' AND purchase_order.product_id='$rs[product_id]'";
$qsqlpurchase_order_bill = mysqli_query($con,$sqlpurchase_order_bill);
$rspurchase_order_bill = mysqli_fetch_array($qsqlpurchase_order_bill);
$profit[$loopcount] = $profit[$loopcount] . $rspurchase_order_bill[0] . ",";
//Dec
$sqlpurchase_order_bill = "SELECT IFNULL(sum(purchase_order.purchase_amt),0) FROM purchase_order_bill INNER JOIN purchase_order ON purchase_order_bill.purchase_order_id=purchase_order.purchase_order_id WHERE purchase_order_bill.paid_date BETWEEN '2020-04-01' AND '2020-04-31' AND purchase_order.product_id='$rs[product_id]'";
$qsqlpurchase_order_bill = mysqli_query($con,$sqlpurchase_order_bill);
$rspurchase_order_bill = mysqli_fetch_array($qsqlpurchase_order_bill);
$profit[$loopcount] = $profit[$loopcount] . $rspurchase_order_bill[0] . ",";
//Jan
$sqlpurchase_order_bill = "SELECT IFNULL(sum(purchase_order.purchase_amt),0) FROM purchase_order_bill INNER JOIN purchase_order ON purchase_order_bill.purchase_order_id=purchase_order.purchase_order_id WHERE purchase_order_bill.paid_date BETWEEN '2020-05-01' AND '2020-05-31' AND purchase_order.product_id='$rs[product_id]'";
$qsqlpurchase_order_bill = mysqli_query($con,$sqlpurchase_order_bill);
$rspurchase_order_bill = mysqli_fetch_array($qsqlpurchase_order_bill);
$profit[$loopcount] = $profit[$loopcount] . $rspurchase_order_bill[0] . ",";
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