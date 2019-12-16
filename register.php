<?php include('header.php'); ?>
<div class="cont">	
<script>
 function check()
 {
		var uname=document.forms["form"]["uname"].value;
        var name=document.forms["form"]["name"].value;
        var email=document.forms["form"]["email"].value;
		var psw=document.forms["form"]["psw"].value;
		var mob=document.forms["form"]["mob"].value;
		
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
		
        if(name.value=="")
        {
            alert("Enter a Name");
            document.forms["form"]["name"].focus();
            return false;
        }
        else if(name.length<4)
        {
            alert("Enter a Valied Name");
            document.forms["form"]["name"].focus();
            return false;
        }
		
        var email=document.form.email.value;  
        var atposition=email.indexOf("@");  
        var dotposition=email.lastIndexOf(".");     
        if (atposition<1 || dotposition<atposition+2 || dotposition+2>=email.length)
        {  
            alert("Please enter a valid e-mail address "); 
			document.forms["form"]["email"].focus();			
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
			alert("please enter a Strong Password ");
			document.forms["form"]["psw"].focus();
			return false;
		}
		/*
		if(mob=="" )
		{
			alert("please enter Mobile Number ");
			document.forms["form"]["mob"].focus();
			return false;
		}
		if(loc.length!=10 )
		{
			alert("please enter valied Mobile Number ");
			document.forms["form"]["mob"].focus();
			return false;
		}*/
 }
 
</script>


<form  method="POST" onsubmit="return check()" name="form">
<h1> Registration </h1>
<input type="text" name="uname" placeholder="Enter User Name" class="frm">
<input type="text" name="name" placeholder="Enter name" class="frm">
<input type="email" name="email" placeholder="Enter Email id" class="frm">
<input type="password" name="psw" placeholder="Enter Password" class="frm">
<input type="number" name="mob" placeholder="Enter Mobile Number" class="frm">
<input type="submit" name="submit" value="send" class="frm-btn">
</form>
</div>


<?php  
include('dbcon.php');
if(isset($_POST['submit']))
{
	$uname=$_POST['uname'];
	$name=$_POST['name'];
	$email=$_POST['email'];
	$psw=$_POST['psw'];
	$mob=$_POST['mob'];
	
	
	
	
	
	
	$sql="INSERT INTO `users` VALUES ('','$uname','$name','$email','$psw',$mob)";
	
	$sql1="select * from users where email='$email' and u_name='$uname'";	
	$result=$con->query($sql1);
	
	if($result<0)
	{
		if($con->query($sql)== true)
		{
			echo '<script type="text/javascript"> alert("Registration Successful"); </script>';
		}
		else
		{
			echo "error $sql2";
			$con->error;
		}
	}
	else
	{
		echo '<script type="text/javascript"> alert("User alredy exist"); </script>';
	}	
	$con->close();
}
?>