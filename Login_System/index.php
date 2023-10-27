<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <div>
        <?php
        if(isset($_SESSION['user_id'])){        
        ?>
        <a href="#" class="btn signupbtn"><?= $_SESSION['user_uid'] ?></a>
        <a href="includes/logout.inc.php" class="btn loginbtn">LOGOUT</a>
        <?php
        }
        else{
        ?>
         <a href="#" class="btn signupbtn">SIGNUP</a>
        <a href="#" class="btn loginbtn">LOGIN</a>
    <?php
    }
    ?>


    </div>
<div class="form-structor">
	<div class="signup">
		<h2 class="form-title" id="signup"><span>or</span>Signup</h2>
        <form action="includes/signup.inc.php" method="post">
		<div class="form-holder">
			<input type="text" class="input" placeholder="Name" name="uid"/>
			<input type="email" class="input" placeholder="Email" name="email"/>
			<input type="password" class="input" placeholder="Password" name="pwd"/>
            <input type="password" class="input" placeholder="Repeat Password" name="pwdrepeat"/>
		</div>
		<button class="submit-btn" type="submit" name="submit">SIGN UP</button>
        </form>
	</div>
	<div class="login slide-up">
		<div class="center">
			<h2 class="form-title" id="login"><span>or</span>Log in</h2>
            <form action="includes/login.inc.php" method="post" autocomplete="off">
			<div class="form-holder">
            <input type="text" class="input" placeholder="Name" name="uid"/>
			<input type="password" class="input" placeholder="Password" name="pwd"/>
			</div>
			<button class="submit-btn" type="submit" name="submit">LOGIN</button>
</form>
		</div>
	</div>
</div>
<script src="js/index.js"></script>

</body>
</html>