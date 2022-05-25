<?php 
include("header.php");
if(isset($_GET['deleteid']))
{
	$sql = "DELETE FROM worker WHERE worker_id='$_GET[deleteid]'";
	if(!mysqli_query($con,$sql))
	{
		echo "<script>alert('Failed to delete record'); </script>";
	}
	else
	{
		if(mysqli_affected_rows($con)  >= 1)
		{
		echo "<script>alert('This record deleted successfully..'); </script>";
		}
	}
}
?>
  <main id="main">


    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container">

        <div class="text-center" data-aos="zoom-in">
		<br><br>
          <h3>View Workers</h3>
        </div>

      </div>
    </section><!-- End Cta Section -->


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">
        <div class="row">
		

          <div class="col-lg-12" data-aos="fade-up" data-aos-delay="100">
            <div class="info mt-4 ">
			
		<center><h4>Registered Workers list...</h4></center><hr>

<?php
							 $sql = "SELECT * FROM worker";
							  $qsql = mysqli_query($con,$sql);
							  if(mysqli_num_rows($qsql)  == 0)
									{
										echo "<center>There is no worker to display!!</center>";
									}
									else
									{
							?>
							<table ID="datatable" class="table table-striped table-bordered"  style="width:100%">
								<THEAD>
							  <tr>
						      <th><strong>Name</strong></th>
						      <th><strong>Address</strong></th>
                                 <th><strong>Contact Number</strong></th>
						      <th><strong>Work Profile</strong></th>						    
						      <th><strong>Date of Birth</strong></th>
						      <th><strong>Login ID</strong></th>
						      <th><strong>Expected Salary</strong></th>
                               <th><strong>Action</strong></th>
						      </tr>
								</THEAD>
								<TBODY>
<?php
							 
							  while($rs = mysqli_fetch_array($qsql))
							  {
	  $sql1 = "SELECT * FROM country WHERE country_id='$rs[country_id]'";
								  $qsql1 = mysqli_query($con,$sql1);
								  $rs1 = mysqli_fetch_array($qsql1);
								
								  $sql2 = "SELECT * FROM state WHERE state_id='$rs[state_id]'";
								  $qsql2 = mysqli_query($con,$sql2);
								  $rs12 = mysqli_fetch_array($qsql2);
								 
								  $sql3 = "SELECT * FROM city WHERE city_id='$rs[city_id]'";
								  $qsql3 = mysqli_query($con,$sql3);
								  $rs13 = mysqli_fetch_array($qsql3);
							  echo "
						    <tr>
						      <td>&nbsp;$rs[name]</td>
						      <td>&nbsp;$rs[address], <br>
						      &nbsp;$rs13[city],<br>
							  &nbsp;$rs12[state],<br>
							  &nbsp;$rs1[country],<br>
						      PIN Code: &nbsp;" . $rs['pincode'] . " </td>
							   <td>&nbsp;$rs[contactno]</td>
						      <td>&nbsp;$rs[work_profile]</td>
						      <td>&nbsp;$rs[date_of_birth]</td>
						      <td>&nbsp;$rs[login_id]</td>
						      <td>&nbsp;$rs[expected_salary]</td>
						      <td>&nbsp; 
							  <a href='worker.php?editid=$rs[worker_id]' class='btn btn-info' style='width: 100%;'>Edit</a> 
							  <a href='viewworker.php?deleteid=$rs[worker_id]' onclick='return delconfirm()' class='btn btn-danger' style='width: 100%;'>Delete</a><br>
<a href='imgworker/$rs[biodata]' class='btn btn-secondary' style='width: 100%;'>Download Bio data</a>							  
							  </td>
					        </tr>";
							  }
							  ?>
								</TBODY>
						  </table>
						<?php
						 }
						?>
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
function delconfirm()
{
	if(confirm("Are you sure you want to delete this record?") == true)
	{
		return true;
	}
	else
	{
		return false;
	}
}
</script>	