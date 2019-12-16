<?php include('header.php'); ?>
<div class="cont">
<script>
function check()
{
	var uname=document.forms["form"]["uname"].value;
	var psw=document.forms["form"]["psw"].value;
    if(uname.value=="")
    {
        alert("Please Enter User Name");
        document.forms["form"]["uname"].focus();
		return false;
    }
    else if(uname.length<4)
    {
       alert("Enter a Valied User Name");
       document.forms["form"]["uname"].focus();
       return false;
    }
	if(psw=="" )
	{
		alert("please enter Password ");
		document.forms["form"]["psw"].focus();
		return false;
	}
	if(psw.length<6 )
	{
		alert("enter a valied password ");
		document.forms["form"]["psw"].focus();
		return false;
	}
}
</script>


<br><br>
<form name="form"  method="POST" onsubmit="return check()"> 
<table>

<tbody>
<h1> Login </h1>
 <tr>  <td> <input type="text" placeholder="Enter User Name" name="uname" class="frm"> </td> </tr>
 <tr>  <td> <input type="password" placeholder="Enter User Password" name="psw" class="frm"> </td> </tr>
 <tr>  <td> <input type="submit" name="sub" value="Login" class="frm-btn"> 
 <input type="reset" name="reset" value="Reset" class="frm-btn"> </tr> </tbody>

<tfoot> <tr> <td style="text-align:right; font-size:14px";> <a href=""> forget password </a></tr></tfoot>
 </table>
 </form>
 
 </div>
</body>
</html>



<?php

if(isset($_POST["sub"]))
{
  include('dbcon.php');
  session_start();
  $uname=$_POST['uname'];
  $psw=$_POST['psw'];
  $sql="select * from users where u_name='$uname'";
  
  $result=$con->query($sql);
	foreach($result as $row)
	{
		if($row["password"]==$psw)
		{
			
				$_SESSION["sname"]=$row["name"];
				if(isset($_SESSION["sname"]))
				{
				header('location:userhome.php');
				}
		}
		else
		{
			echo '<script type="text/javascript"> alert("User Password Invalid"); </script>';
			$con->error;
			$con->close();			
		}
	}

  }
?>	
 
?> 