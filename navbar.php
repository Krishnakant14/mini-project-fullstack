<nav class=" topwidth navbar navbar-expand navbar-dark bg-dark">
  <div>
   <ul class="navbar-nav">
      <li class="nav-item active">
      <button class="openbtn custom-toggler" onclick="openNav()"><span class="navbar-toggler-icon"></span></button> 
      </li>
      <li class="nav-item active">
      <a class="nav-link" style="margin-left:10px;" href="index.php">Ecommerce</a>
      </li>
      <li class="dropdown active">
            <a  href="#" class=" category nav-link dropdown-toggle" data-toggle="dropdown">Category <span class="caret"></span></a>
            <ul class="dropdown-menu dropdown-menu-right">
              <?php
             
                $conn = $pdo->open();
                try{
                  $stmt = $conn->prepare("SELECT * FROM category");
                  $stmt->execute();
                  foreach($stmt as $row){
                    echo "
                      <li><a class='dropdown-item' href='category.php?category=".$row['cat_slug']."'>".$row['name']."</a></li>
                    ";                  
                  }
                }
                catch(PDOException $e){
                  echo "There is some problem in connection: " . $e->getMessage();
                }

                $pdo->close();

              ?>
            </ul>
      </li>

      <div class="search-box">
      <form method="POST" action="search.php">
       <div>
          <input type="text" class="search" name="keyword"  placeholder="Search" required>
          <div class="result"></div>
        <div class="searchbutton">
          <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
        </div>
        </div>
      </form>
      </div>

   </ul>  
  </div>
            
  <div class="topnav" id="myTopnav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">About</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">Contact us</a>
      </li> 
    </ul>  
  </div>
   <div class="cartnav">
     <ul class="navbar-nav">
     <?php
            if(isset($_SESSION['user'])){
              $image = (!empty($user['photo'])) ? 'images/'.$user['photo'] : 'images/profile.jpg';
              echo '
                <li class="dropdown active">
                  <a href="#" class=" nav-link dropdown-toggle" data-toggle="dropdown">
                    <img src="'.$image.'" class="user-image rounded-circle" alt="User Image">
                    <span class="hidden-xs">'.$user['firstname'].' '.$user['lastname'].'</span>
                  </a>
                  <ul class="dropdown-menu dropdown-size dropdown-menu-right bg-light">
                    <!-- User image -->
                    <li>
                      <img src="'.$image.'" class=" dropdown-image rounded-circle mx-auto d-block" alt="User Image">

                      <p style="text-align:center;">
                        '.$user['firstname'].' '.$user['lastname'].'<br>
                        <small>Member since '.date('M. Y', strtotime($user['created_on'])).'</small>
                      </p>
                    </li>
                    <hr>
                    <li>
                      <div class="pull-left">
                        <a href="profile.php" class="btn btn-secondary btn-sm" style="margin-left:10px;">Profile</a>
                      </div>
                      <div class="pull-right">
                        <a href="logout.php" class="btn btn-secondary btn-sm" style="margin-right:10px;">Sign out</a>
                      </div>
                    </li>
                  </ul>
                </li>
              ';
            }
            else{
              echo "
              <li class='nav-item active'>
              <a class='nav-link' href='login.php'>Login</a>
            </li> 
            <li class='nav-item active'>
              <a class='nav-link' href='signup.php'>Sign In</a>
            </li> 
              ";
            }
          ?>


       <li  class="nav-item dropdown messages-menu">
         <a class="nav-link active dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-shopping-cart">Cart</i><span class="badge badge-success cart_count"></span></a> 
         <ul class="dropdown-menu dropdown-menu-right">
              <li class="dropdown-header">You have <span class="cart_count"></span> item(s) in cart</li>
              <div class="dropdown-divider"></div>
              <li>
                <ul class="menu" style="padding-left:0px;" id="cart_menu">
                </ul>
              </li>
              <li class="text-center"><a class="cart-footer" href="cart_view.php">Go to Cart</a></li>
            </ul> 
      </li>
     </ul>
  </div>
                    
  <div id="mySidepanel" class="sidepanel">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
  <a id="demo1" href="#news"></a>
  <a href="#">About</a>
  <a href="#">Services</a>
  <a href="#">Clients</a>
  <a href="#">Contact</a>
  </div>
</nav>
<div class="searchnav bg-dark">
</div>

<?php include 'scripts.php'; ?>
<script>
function opendemo()
{
  document.getElementById('demo1').innerHTML="News";
}
function closedemo()
{
  document.getElementById('demo1').innerHTML="";
}

function openNav() {
  document.getElementById("mySidepanel").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidepanel").style.width = "0";
}

function opennav() {
  var x = document.getElementById("myTopnav");
    x.className = " sidepanel";
}
function backnav()
{
  var x = document.getElementById("myTopnav");
x.className="topnav";
}




function myFunction(x) {
  if (x.matches) { // If media query matches
    opennav()
    opendemo()
  } else {
   backnav()
   closedemo()
  }
}

var x = window.matchMedia("(max-width: 600px)")
myFunction(x) // Call listener function at run time
x.addListener(myFunction) // Attach listener function on state changes


$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("ajaxsearch.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});




</script>

<style>
body {
  font-family: "Lato", sans-serif;
}

.sidepanel  {
  width: 0;
  position: fixed;
  z-index: 1;
  height: 100vh;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidepanel a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidepanel a:hover {
  color: #f1f1f1;
}

.sidepanel .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
}

.openbtn {
  font-size: 20px;
  cursor: pointer;
  background-color: transparent;
  border-style: solid;
  border-color: grey;
  border-width:1px;
  margin-top:2px;
}

.openbtn:hover {
  border-color:white;
}         
.custom-toggler .navbar-toggler-icon { 
  background-image: url( 
"data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgb(255, 255, 255)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 8h24M4 16h24M4 24h24'/%3E%3C/svg%3E"); 
}
.navbar-nav a:hover{
border-color:white;
border-style: solid;
border-width:1px;
}
.navbar-nav a{
  border-color:transparent;
border-style: solid;
border-width:1px;
}
.search {
  width:800px;
  height:40px;
  margin-left:10px;
  box-sizing: border-box;
  border: 2px solid white;
  border-radius: 4px;
  font-size: 16px;
  background-color: white;
  padding: 12px 20px;
  -webkit-transition: width 0.4s ease-in-out;
  transition: width 0.4s ease-in-out;
}
.searchbutton{
  position:relative;
  margin-left:810px;
  margin-top:-40px;
}
.search-box{
        width: 800px;
        height:40px;
        position: relative;
        display: inline-block;
        font-size: 14px;
    }
    .search-box input[type="text"]{
        height: 40px;
        padding: 5px 10px;
        border: 1px solid #CCCCCC;
        font-size: 14px;
    }
    .result{
        position: absolute;        
        z-index: 999;
        top: 100%;
        margin-left:10px;
        background-color:white;
    }
    .search-box input[type="text"], .result{
        width: 100%;
        box-sizing: border-box;
    }
    /* Formatting result items */
    .result p{
        margin: 0;
        padding: 7px 10px;
        border: 1px solid #CCCCCC;
        border-top: none;
        cursor: pointer;
    }
    .result p:hover{
        background: #f2f2f2;
    }
  

@media only screen and (max-width: 1120px) {
  .search-box {
    position:absolute;
    top:70px;
    left:70px;
    width: 300px;
    height:40px;
    display: inline-block;
    font-size: 14px;
  }
  .search{
    width:300px;
  }
.searchnav{
  width:100%;
  height:70px;
}
.searchbutton{
  position:relative;
  margin-left:310px;
  margin-top:-40px;
}

}
.topnav{
  position:absolute;
  right:200px;
}
.cartnav{
  position:absolute;
  right:10px;
}
.dropdown-toggle::after { 
  content: none; 
} 
.badge {
  position:absolute;
  top:2px;
}
.dropdown-menu{
  position:absolute;
  right:50px;
}

.user-image{
height:20px;
width:20px;
}
.dropdown-image{
  height:100px;
  width:80px;
}
.dropdown-size{
  width:300px;
}
.cart-footer{
  font-size:10px;
  color:black;
  
}
.cart-footer:hover {
  text-decoration: none;
  color:black;
}
</style>






