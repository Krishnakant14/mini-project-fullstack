<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner productinner">


  <div class='carousel-item active'>
  <div class="row">
  <?php
$count=0;
	  			$sql = "SELECT * FROM products WHERE category_id=4";
                  $stmt=$conn->query($sql);
                  $row = $stmt->fetch();
                  echo "
                  <div class='col-sm-2'>
                        <div class='productcard mb-2'>
                       <img class='productcard-img-top' src='images/".$row['photo']."'>
                      <div class='card-body'>
                     <a class='productcard-title stretched-link' href='product.php?product=".$row['slug']."'>".$row['name']."</a>
                     <h6 class='card-ruppes'>&#8377; ".$row['price']."</h6>
                    </div>
                  </div>
                  </div>
                
                  ";
                 
	  			while($row = $stmt->fetch()){
            $count++;
                      echo "
                       <div class='col-sm-2'>
                        <div class='productcard mb-2'>
                       <img class='productcard-img-top' src='images/".$row['photo']."'>
                      <div class='card-body'>
                     <a class='productcard-title stretched-link' href='product.php?product=".$row['slug']."'>".$row['name']."</a>
                     <h6 class='card-ruppes'>&#8377; ".$row['price']."</h6>
                    </div>
                  </div>
                  </div> 
                      ";
                      if($count==5)
          break;
	  			}

	  			
	  		?>
</div>
</div>


<div class='carousel-item ' >
  <div class="row">
  <?php
  $count=0;

	  			$sql = "SELECT * FROM products WHERE category_id=1";
                  $stmt=$conn->query($sql);
                  $row = $stmt->fetch();
                  echo "
                  <div class='col-sm-2'>
                        <div class='productcard mb-2'>
                       <img class='productcard-img-top' src='images/".$row['photo']."'>
                      <div class='card-body'>
                     <a class='productcard-title stretched-link' href='product.php?product=".$row['slug']."'>".$row['name']."</a>
                     <h6 class='card-ruppes'>&#8377; ".$row['price']."</h6>
                    </div>
                  </div>
                  </div>
                
                  ";
                 
	  			while($row = $stmt->fetch()){
            $count++;
                      echo "
                       <div class='col-sm-2'>
                        <div class='productcard mb-2'>
                       <img class='productcard-img-top' src='images/".$row['photo']."'>
                      <div class='card-body'>
                     <a class='productcard-title stretched-link' href='product.php?product=".$row['slug']."'>".$row['name']."</a>
                     <h6 class='card-ruppes'>&#8377; ".$row['price']."</h6>
                    </div>
                  </div>
                  </div> 
                      ";
                      if($count==5)
          break;
	  			}

	  			
	  		?>
</div>
</div>




<div class='carousel-item ' >
  <div class="row">
  <?php
$count=0;
	  			$sql = "SELECT * FROM products WHERE category_id=2";
                  $stmt=$conn->query($sql);
                  $row = $stmt->fetch();
                  echo "
                  <div class='col-sm-2'>
                        <div class='productcard mb-2'>
                       <img class='productcard-img-top' src='images/".$row['photo']."'>
                      <div class='card-body'>
                     <a class='productcard-title stretched-link' href='product.php?product=".$row['slug']."'>".$row['name']."</a>
                     <h6 class='card-ruppes'>&#8377; ".$row['price']."</h6>
                    </div>
                  </div>
                  </div>
                
                  ";
                 
	  			while($row = $stmt->fetch()){
            $count++;
                      echo "
                       <div class='col-sm-2'>
                        <div class='productcard mb-2'>
                       <img class='productcard-img-top' src='images/".$row['photo']."'>
                      <div class='card-body'>
                     <a class='productcard-title stretched-link' href='product.php?product=".$row['slug']."'>".$row['name']."</a>
                     <h6 class='card-ruppes'>&#8377; ".$row['price']."</h6>
                    </div>
                  </div>
                  </div> 
                      ";
                      if($count==5)
          break;
	  			}

	  			
	  		?>
</div>
</div>

        
<div class='carousel-item ' >
  <div class="row">
  <?php
$count=0;
	  			$sql = "SELECT * FROM products WHERE category_id=3";
                  $stmt=$conn->query($sql);
                  $row = $stmt->fetch();
                  echo "
                  <div class='col-sm-2'>
                        <div class='productcard'>
                       <img class='productcard-img-top' src='images/".$row['photo']."'>
                      <div class='card-body'>
                     <a class='productcard-title stretched-link' href='product.php?product=".$row['slug']."'>".$row['name']."</a>
                     <h6 class='card-ruppes'>&#8377; ".$row['price']."</h6>
                    </div>
                  </div>
                  </div>
                
                  ";
                 
	  			while($row = $stmt->fetch()){
            $count++;
                      echo "
                       <div class='col-sm-2'>
                        <div class='productcard'>
                       <img class='productcard-img-top' src='images/".$row['photo']."'>
                      <div class='card-body'>
                    <a class='productcard-title stretched-link' href='product.php?product=".$row['slug']."'>".$row['name']."</a>
                    <h6 class='card-ruppes'>&#8377; ".$row['price']."</h6>
                    
                    </div>
                  </div>
                  </div> 
                      ";
                      if($count==5)
          break;
	  			}

	  			
	  		?>
</div>
</div>


  </div>
  <a class="carousel-control-prev previous" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<style>
.productcard{
    width:250px;
    height:380px;
    margin-top:10px;
}
@media screen and (max-width: 600px) {
  .productcard {
    margin-left: 100px;
  }
}
.previous{
    background-color:black;
    width:30px;
    height:40px;
    position:absolute;
    margin-top:200px;
    margin-left:10px;
    
}
.next{
    background-color:black;
    width:30px;
    height:40px;
    position:absolute;
    margin-top:200px;
    margin-right:8px;
}
.row{
    width:100%;
    margin: 0 2px;
}
.productinner{
    border:solid 1px #f2f2f2;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    width:99%;
    height:400px;
    margin-top:40px;
    margin-left:10px;
    background-color:white;
}
.productcard-img-top{
  height:250px;
  width:100%;
}
.productcard-title
{
  font-size:15px;
  text-decoration:none;
  color:black;
}
.productcard-title:hover{
  text-decoration:none;
  color:black;
}
</style>









