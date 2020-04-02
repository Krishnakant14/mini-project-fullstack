<div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  
  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="e-commerce-banner.jpg" alt="Los Angeles">
    </div>
    <div class="carousel-item">
      <img src="la.jpg" alt="Chicago">
    </div>
    <div class="carousel-item">
      <img src="la.jpg" alt="New York" >
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>

<?php
$query = "SELECT name FROM category";
$result=$conn->query($query);
        if ($result) 
        { 
         
            $count = $result->rowCount();
              
        
        } 
?>
      



<section style="margin-top:8px;">
<div class="row">
<?php
while($count>0){
    unset($image);
    unset($name);
    unset($proname);
  $sql="select * from products where category_id=$count" ;
  $namesql="select * from category where id=$count";
  $nameresult=$conn->query($namesql);
  if($nameresult)
  {
    $namerow=$nameresult->fetch();
    $productname=$namerow["name"];
  }
  $result = $conn->query($sql);
  if ($result) 
  {     
    
    while($row = $result->fetch())
    {    
        $image[] =$row["photo"];  
        $name[]=$row["name"];
        $proname[]=$row["slug"];
    }
  }
  else
  echo "0 results";
  $n=array_rand($image,4);






















  echo "
<div class='column'>
    <div class='card'>
      <a href='category.php?category=".$namerow['cat_slug']."' style='color:black;font-weight:bold;'>$productname</a>
      <div class='cardrow'>
      <div class='cardcolumn'>
     
      
      <a href='product.php?product=".$proname[$n[0]]."'><img style='width:100%;height:90%;'src= 'images/".$image[$n[0]]."'></a>
      
      <p style='font-size:10px;'>" .$name[$n[0]]."</p>
    
      </div>
      <div class='cardcolumn'>
      
      
      <a href='product.php?product=".$proname[$n[1]]."'><img style='width:100%;height:90%;'src= 'images/".$image[$n[1]]."'></a>
      
      <p style='font-size:10px;'>" .$name[$n[1]]."</p>
      
      </div>
      </div>

      <div class='cardrow'>
      <div class='cardcolumn'>
      
      <a href='product.php?product=".$proname[$n[2]]."'><img style='width:100%;height:90%;'src= 'images/".$image[$n[2]]."'></a>
      
      <p style='font-size:10px;'>" .$name[$n[2]]."</p>
      
      </div>

      <div class='cardcolumn'>
      
      <a href='product.php?product=".$proname[$n[3]]."'><img style='width:100%;height:90%;'src= 'images/".$image[$n[3]]."'></a>
      
      <p style='font-size:10px;'>" .$name[$n[3]]."</p>
      
      </div>
      </div>

      </div>
      </div>";
      $count--;  
}
?>
      </div>
</section>










<style>
/*.carousel-inner {
      width:100%;
      height:30%;
  }*/
  .carousel-inner img {
      width:100%;
      height:300px;
  }



/* Float four columns side by side */
.column {
  float: left;
  width: 25%;
  padding: 0 10px;
}

/* Remove extra left and right margins, due to padding */
.row {margin: 0 2px;}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive columns */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
    display: block;
    margin-bottom: 20px;
  }
}

/* Style the counter cards */
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 20px;
  text-align: center;

}
.cardrow{
    margin-left:10px; 
}
/*.cardrow:after {
  content: "";
  display: table;
  clear: both;
}*/
.cardcolumn {
  float: left;
  width: 45%;
  height:180px;
  padding: 0 10px;
  margin-left:4px;
  margin-top:2px;
}
.cardcolumn:hover{

 box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
}


</style>