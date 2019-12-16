<?php session_start(); ?>
<?php include('header2.php'); ?>
<center>
<?php 
if($_SESSION["sname"])
{ 
 
?>
<br><br><br>
<h2> Welcome <?php echo $_SESSION["sname"]; ?> </h2>
<br><br><br><br><br><br>
<p> This Page is to allow Edit and Remove Personal Details Only </p>

<h3> <a href="update.php"> Update Details </a> </h3>
<h3> <a href="delete.php"> Remove Details </a> </h3> 
<?php } 
else
{
	echo "login ";
}?>
<?php include('footer.php'); ?>