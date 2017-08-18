<!DOCTYPE html>
<html>
 <head>
  <title>user registration system using php mayswl</title>
  <link rel="stylesheet" type="text/css" href="style.css">
 </head>
    <body>
      <div class="header">
      <h2>Login</h2>
      </div>
     <form method="post" action="login.php">
        <div class="input-group">
		<label>useName</label>
		<input type="text" name="userName">
		</div>
		<div class="input-group">
		<label>pass</label>
		<input type="password" name="pass">
		</div>
	
		<div class="input-group">
		<button type="submit"name="login" calss="btn" >Login</button>
		</div>
		<p>
		Not yet a member? <a href="registration.php">Sign up</a>
		</p>
     </form>
    </body>
</html>