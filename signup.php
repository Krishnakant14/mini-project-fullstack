<?php include 'session.php'; ?>
<?php
  if(isset($_SESSION['user'])){
    header('location: index.php');
  }


?>
<?php include 'header.php'; ?>
<body style="background-color:#cceeff;">
<div class="register-box container">
  	<?php
      if(isset($_SESSION['error'])){
        echo "
          <div class='alert alert-danger bg-danger text-center'>
            <p class='text-white'>".$_SESSION['error']."</p> 
          </div>
        ";
        unset($_SESSION['error']);
      }

      if(isset($_SESSION['success'])){
        echo "
          <div class='alert alert-success bg-success text-center'>
            <p class='text-white'>".$_SESSION['success']."</p> 
          </div>
        ";
        unset($_SESSION['success']);
      }
    ?>
  	<div class="register-box-body container-fluid">
    	<p class="bold text-center" style="padding-top:30px;margin-bottom:30px;">Register a new membership</p>

    	<form action="register.php" method="POST">
        <label>Firstname</label>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="firstname" placeholder="Enter Firstname" value="<?php echo (isset($_SESSION['firstname'])) ? $_SESSION['firstname'] : '' ?>" required>
            <i class="fa fa-user form-control-feedback"></i>
          </div>
          <label>Lastname</label>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="lastname" placeholder="Enter Lastname" value="<?php echo (isset($_SESSION['lastname'])) ? $_SESSION['lastname'] : '' ?>"  required>
            <i class="fa fa-user form-control-feedback"></i>
          </div>
          <label>Email Address</label>
      		<div class="form-group has-feedback">
        		<input type="email" class="form-control" name="email" placeholder="Enter Email" value="<?php echo (isset($_SESSION['email'])) ? $_SESSION['email'] : '' ?>" required>
        		<i class="fa fa-envelope form-control-feedback"></i>
      		</div>
              <label>Password</label>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="Enter Password" required>
            <i class="fa fa-lock  form-control-feedback"></i>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="repassword" placeholder="Retype password" required>
            <i class="fa fa-sign-in  form-control-feedback"></i>
          </div>
          <hr>
          			<button type="submit" class="btn btn-primary " name="signup"><i class="fa fa-pencil"></i> Sign Up</button>
    	</form>
      <br>
      <a href="login.php">I already have a membership</a><br>
      <a href="index.php"><i class="fa fa-home"></i> Home</a>
  	</div>
</div>
	
</body>
<style>
.register-box{
    margin-top:40px;
    width:400px;
}
.register-box-body{
    font-weight:bold;
    margin-top:10px;
     box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
     background-color:white;
}
.has-feedback{
    position:relative;
}
.form-control-feedback{
    position: absolute;
    top: 0;
    right: 0;
    z-index: 2;
    display: block;
    width: 34px;
    height: 34px;
    line-height: 34px;
    text-align: center;
    pointer-events: none;
}
</style>
</html>