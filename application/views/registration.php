
<!DOCTYPE html>
<html>
 <head>
  <title>user registration system using php mayswl</title>
  <link rel="stylesheet" type="text/css" href="/views/style.css">
 </head>
    <body>
      <div class="header">
      <h2>Register</h2>
      </div>
     <form method="post" action="registration.php">
        <div class="input-group">
		<label>useName</label>
		<input type="text" name="userName">
		</div>
		<div class="input-group">
		<label>email</label>
		<input type="text" name="eamil">
		</div>
		<div class="input-group">
		<label>pass</label>
		<input type="password" name="password">
		</div>
		<div class="input-group">
		<label>confirmPass</label>
		<input type="password" name="confirmPass">
		</div>
		<div class="input-group">
		<button type="submit"name="register" calss="btn" >Register</button>
		</div>
		<p>
		Already a member <a href="login.php">Login</a>
		</p>
     </form>
    </body>
</html>