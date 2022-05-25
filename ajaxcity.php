<?php
error_reporting(E_ALL & ~E_NOTICE  &  ~E_STRICT  &  ~E_WARNING);
include("dbconnection.php");
?>
<select name="city" id="city"  
<?php
if($_GET['profile'] != "set")
{
	echo ' class="search_categories form-control" ';
}
else
{
	echo ' class="form-control" ';
}
?> 
>
<option value="">Select</option>
<?php
$sql3 = "SELECT * FROM city where status='Active' ";
if(isset($_GET['id']))
{
$sql3 = $sql3 . " AND state_id='$_GET[id]'";
}
else if(isset($_GET['editid']))
{
	$sql3 = $sql3 . " AND state_id='$rsedit[state_id]'";
}
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
</select>