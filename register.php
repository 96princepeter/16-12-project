<?php include('header.php'); ?>
<div class="cont">	


<?php  
include('dbcon.php');
if(isset($_POST['submit']))
{
	$uname=$_POST['uname'];
	$name=$_POST['name'];
	$email=$_POST['email'];
	$psw=$_POST['psw'];
	$mob=$_POST['mob'];
	

	if(empty($uname))
	{
		$error = "enter your Username !";
		$code = 1;
	}
	else if(empty($name))
	{
		$error = "enter your name !";
		$code = 2;
	}
	else if(!ctype_alpha($name))
	{
	$error = "letters only !";
	$code = 2;
	}
	else if(empty($email))
	{
	$error = "enter your email !";
	$code = 3;
	}
	else if(!preg_match("/^[_.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+.)+[a-zA-Z]{2,6}$/i", $email))
	{
	$error = "not valid email !";
	$code = 3;
	}
	else if(empty($psw))
	{
	$error = "enter password !";
	$code = 4;
	}
	else if(strlen($psw) < 8 )
	{
	$error = "Minimum 8 characters !";
	$code = 4;
	}
	else if(empty($mob))
	{
	$error = "Enter Mobile NO !";
	$code = 5;
	}
	else if(!is_numeric($mob))
	{
	$error = "Numbers only !";
	$code = 5;
	}
	else if(strlen($mob)!=10)
	{
	$error = "10 characters only !";
	$code = 5;
	}
	else
	{
		$error="added";
	}

	
	
	
	$sql="INSERT INTO `users` VALUES ('','$uname','$name','$email','$psw',$mob)";
	
	$sql1="select * from users where email='$email' and u_name='$uname'";	
	
	if(!empty($uname) and !empty($name) and !empty($email) and !empty($psw))
	{
		$result=$con->query($sql1);
		if($result<0)
		{
			if($con->query($sql)== true)
			{
				?> <script> alert("Registration Successful"); 
				document.location.href='index.php'; </script>;<?php
			}
			else
			{
				echo "error ";
				$con->error;
			}
			
		}
		else
		{
			echo '<script type="text/javascript"> alert("User alredy exist"); </script>';
		}	
		$con->close();
	}
}
?>



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


<form  method="POST" onsubmit="return check1()" name="form">
<h1> Registration </h1>

<h1> <?php if(isset($error)){ echo $error; }?> </h1>
<input type="text" name="uname" placeholder="Enter User Name" class="frm" value="<?php if(isset($uname)){
	echo $uname;} ?>"  <?php if(isset($code) && $code == 1){ echo "autofocus"; }  ?> >
<input type="text" name="name" placeholder="Enter name" class="frm" value="<?php if(isset($name)){echo $name;} ?>"  <?php if(isset($code) && $code == 2){ echo "autofocus"; }  ?> >
<input type="email" name="email" placeholder="Enter Email id" class="frm" value="<?php if(isset($email)){
	echo $email;} ?>"  <?php if(isset($code) && $code == 3){ echo "autofocus"; }  ?>  >
<input type="password" name="psw" placeholder="Enter Password" class="frm" value="<?php if(isset($psw)){
	echo $psw;} ?>"  <?php if(isset($code) && $code == 4){ echo "autofocus"; }  ?> >
<input type="number" name="mob" placeholder="Enter Mobile Number" class="frm">
<input type="submit" name="submit" value="send" class="frm-btn">
</form>
</div>

