<?php include 'session.php'; ?>
<?php include 'header.php'; ?>
<?php
  if(isset($_SESSION['user'])){
    header('location: index.php');
  }
?>
<body style="background-color:#cceeff;">
<div class="container" style="margin-top:80px;width:400px;">
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
  	<div class="container-fluid" style="font-weight:bold;margin-top:10px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);background-color:white;">
    	<h6 class="bold text-center" style="padding-top:30px;margin-bottom:30px;">Sign in to start your session</h6>

<form action="verify.php" method="POST">
<label>Email address</label>
  <div class="form-group has-feedback">
    <input type="email" class="form-control" name="email" placeholder="Enter email" required >
    <i class="fa fa-envelope form-control-feedback"></i>
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <label>Password</label>
  <div class="form-group has-feedback">
    <input type="password" class="form-control" name="password" placeholder="Password" required>
    <i class="fa fa-lock  form-control-feedback"></i>
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary" name="login"><i class="fa fa-sign-in"></i>Sign In</button>
</form>
      <br>
      <a href="password_forgot.php">I forgot my password</a><br>
      <a href="signup.php" class="text-center">Register a new membership</a><br>
      <a href="index.php"><i class="fa fa-home"></i> Home</a>
  	</div>
</div>
</body>
<style>
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