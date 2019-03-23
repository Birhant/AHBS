<!DOCTYPE html>
<html lang="en">
	<head>
		<title>
			Sign up
		</title>
	<!--	<meta http-equiv="refresh" content="15" />-->
		<meta charset="utf-8">
		<link rel="stylesheet" href="style.css" type="text/css"/>
	</head>
	<body>
			<?php
		include 'login.php';
		include 'Navigation.php';
		//The error variables
		$nameerr=$fnameerr=$gfnameerr=$emailerr=$usernameerr=$passworderr=$confirmpassworderr=$borninerr=$gendererr=$answererr=$phonenoerr=$actorerr=$questionerr="";
		//The variables
		$username=$password1=$password2=$name=$fname=$gfname=$phoneno=$email=$bornin=$question=$answer=$gender=$actor="";
		$match="";
		$active=$check="0";
		if(isset($_POST["submit"])){
			if(empty($_POST["username"])){
				$usernameerr="Required";
			}
			else{
				$username=test($_POST["username"]);
			}
			if(empty($_POST["password1"])){
				$password1err="Required";
			}
			else{
				$password1=test($_POST["password1"]);
			}

			if(empty($_POST["password2"])){
				$password2err="Required";
			}
			else{
				$password2=test($_POST["password2"]);
			}

			if(empty($_POST["email"])){
				$emailerr="Required";
			}
			else{
				if(!filter_var(test($_POST["email"]), FILTER_VALIDATE_EMAIL)){
			$emailerr="Invalid";}
				else{
				$email=test($_POST["email"]);
				}
			}
			if(empty($_POST["Phone_no"])){
				$phonenoerr="Required";
			}
			else{
				if(!preg_match("/^[0-9]*$/",$_POST["Phone_no"])){
				$phonenoerr="Invalid cell phoneno 0-9";
			}
			else{
				$phoneno=test($_POST["Phone_no"]);
			}
			}
			if(empty($_POST["bornin"])){
				$borninerr="Required";
			}
			else{
				if(!preg_match("/^[0-9]*$/",$_POST["bornin"])){
				$borninerr="Invalid cell phoneno 0-9";
			}
			else{
				$bornin=test($_POST["bornin"]);
			}
			}
			if(empty($_POST["answer"])){
				$answererr="Required";
			}
			else{
				$answer=test($_POST["answer"]);
			}
			if(empty($_POST["name"])){
				$nameerr="Required";
			}
			else{
				if(!preg_match("/^[a-zA-Z]*$/",$_POST["name"])){
			$nameerr="Invalid name";
			}
			else{
				$name=test($_POST["name"]);
			}
			}

			if(empty($_POST["fname"])){
				$fnameerr="Required";
			}
			else{
				if(!preg_match("/^[a-zA-Z]*$/",$_POST["fname"])){
			$fnameerr="Invalid name";
			}
			else{
				$fname=test($_POST["fname"]);
			}
			}
			if(empty($_POST["gfname"])){
				$gfnameerr="Required";
			}
			else{
				if(!preg_match("/^[a-zA-Z]*$/",$_POST["gfname"])){
			$gfnameerr="Invalid name";
			}
			else{
				$gfname=test($_POST["gfname"]);
			}
			}
			if(empty($_POST["gender"])){
				$gendererr="Required";
			}
			else{
				if(!preg_match("/^[a-zA-Z]*$/",$_POST["gender"])){
			$gendererr="Invalid name";
			}
			else{
				$gender=test($_POST["gender"]);
			}
			}
			if($password1!=$password2){
				$passworderr=$confirmpassworderr="Passwords donot match";
			}
			else{
				$password=$password1;
			}
			if($_POST["question"]=="choose"){
				$questionerr="Choose a question";
			}
			else{
				$question=test($_POST["question"]);	
			}	
			if($_POST["activity"]=="choose"){
				$actorerr="Choose an actor";
			}
			else{
				$actor=test($_POST["activity"]);
			}
	echo $username."sd".$_POST["password1"];
	if ($actor=="Customer"){
		header("Location:Home.php")
	}
	else{
		header("Location:Signuprequest.php");
	}
	}
?>

		<button type="button" onclick="document.getElementById('Detail').innerHTML=('This is the page that users can login to their account. If the user don\'t have an account it is possible to create one using Create account link. If you have forgot your password click on forget password then answer the sercurity question exactly like you have wrote while creating an account.')">Detail</button>
		<p id="Detail"><p>
		<section class="content">
		<form action="" method="POST">
			<input type="text" name="name" placeholder="Name" value="<?php echo $name;?>">
			<span class="error">* <?php echo $nameerr;?></span>
			<br/>
			<input type="text" name="fname" placeholder="Father Name" value="<?php echo $fname;?>">
			<span class="error">* <?php echo $fnameerr;?></span>
			<br/>
			<input type="text" name="gfname" placeholder="Grand Father Name" value="<?php echo $gfname;?>">
			<span class="error">* <?php echo $gfnameerr;?></span>
			<br/>
			<input type="text" name="email" placeholder="Email" value="<?php echo $email;?>">
			<span class="error">* <?php echo $emailerr;?></span>
			<br>
			<input type="text" name="Phone_no" placeholder="Phone Number" value="<?php echo $phoneno;?>">
			<span class="error">* <?php echo $phonenoerr;?></span>
			<br>
			<input type="text" name="username" placeholder="username" value="<?php echo $username;?>">
			<span class="error">* <?php echo $usernameerr;?></span>
			<br/>
			<input type="password" name="password1" placeholder="Password">
			<br/>
			<input type="password" name="password2" placeholder="Re-enter Password">
			<br/>
			<label>
				Signup as:
			</label>
			<select type="dropdown" name="activity" value="<?php echo $actor;?>">
				<option value="choose">
					choose
				</option>
				<option value="customer">
					Customer
				</option value="hotel">
				<option>
					Hotel
				</option>
				<option value="service_provider">
					Service provider
				</option>
			</select>
			<span class="error"><?php echo $actorerr;?></span>
			<br/>
			<label>
				Gender
			</label>
			<input type="radio" name="gender" value="male">Male
			<input type="radio" name="gender" value="female">Female
			<span class="error">* <?php echo $gendererr;?></span>
			<br/>
			<label>
				Born in:
			</label>
			<input type="text" name="bornin" placeholder="Year-Month-Date" value="<?php echo $bornin;?>">
			<br/>
			Security question:
			<select type="dropdown" placeholder="security question"  name="question" value="<?php echo $question;?>">
				<option value="choose">
					choose
				</option>
				<option value="My high school nick name?">
					My high school nick name?
				</option>
				<option value="My first pet name?">
					My first pet name?
				</option>
			</select>
			<span class="error"><?php echo $questionerr;?></span>
			<br/>
			<lable>
				Answer:
			</lable>
			<input type="text" name="answer" placeholder="Security question answer" value="<?php echo $answer;?>">
			<span class="error">* <?php echo $answererr;?></span>
				<br/>
			<input type="submit" name="submit" value="submit">
		</form>
		<a href="Sign in.php">Already have an account?</a>
				</section>
			<?php
			echo "<h2>Username</h2>";
			echo $name.$fname.$gfname.$gender.$question;
			?>
		<hr/>
		<?php include'Footer.php';?>
	</body>
</html>
