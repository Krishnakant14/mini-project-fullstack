<h4 style="margin-left:20px;margin-top:20px; ">Recently Viewed item...</h4>

<?php

	$now = date('Y-m-d');
    $conn = $pdo->open();

    $stmt = $conn->prepare("SELECT * FROM products WHERE date_view=:now ORDER BY counter DESC LIMIT 10");
    $stmt->execute(['now'=>$now]);
    $count = $stmt->rowCount();
    if($count<=6){
      echo  "
      <div class='container-fluid recentlyitem'>
      <div class='row'>";
    foreach($stmt as $row){
    
        echo "
        <div class='col-sm-2'>
        <div class='recentlycard'>
          <img class='recentlyimg' src='images/".$row['photo']."'>
        <div class='card-body'>  
        <a class='recentlycard-title stretched-link' href='product.php?product=".$row['slug']."'>".$row['name']."</a>
        <h6 class='card-ruppes'>&#8377; ".$row['price']."</h6>
        </div>
        </div>
        </div>
        ";    
    }
   echo "
   </div>
   </div>"; 
    $pdo->close();
    }
    else{
        $now = date('Y-m-d');
    $conn = $pdo->open();

    $stmt = $conn->prepare("SELECT * FROM products WHERE date_view=:now ORDER BY counter DESC LIMIT 10");
    $stmt->execute(['now'=>$now]);
     $count=0;

        echo"
        <div id='demo' class='carousel slide' data-ride='carousel'>

        <ul class='carousel-indicators'>
          <li data-target='#demo' data-slide-to='0' class='active'></li>
          <li data-target='#demo' data-slide-to='1'></li>
        </ul>
        
        <!-- The slideshow -->
        <div class='carousel-inner recentlyinner'>
        <div class='carousel-item active'>
        <div class='row'>";

        foreach($stmt as $row){
            $count++;
            echo "
          <div class='col-sm-2'>
          <div class='recentlycard'>
            <img class='recentlyimg' src='images/".$row['photo']."'>
          <div class='card-body'>  
          <a class='recentlycard-title stretched-link' href='product.php?product=".$row['slug']."'>".$row['name']."</a>
          <h6 class='card-ruppes'>&#8377; ".$row['price']."</h6>
          </div>
          </div>
          </div>    
          ";
              if($count==6)
                 break;
        }
        echo "
        </div>
        </div>
          <div class='carousel-item'>
          <div class='row'>";
          foreach($stmt as $row){
            $count++;
            echo "
          <div class='col-sm-2'>
          <div class='recentlycard'>
            <img class='recentlyimg' src='images/".$row['photo']."'>
          <div class='card-body'>  
          <a class='recentlycard-title stretched-link' href='product.php?product=".$row['slug']."'>".$row['name']."</a>
          <h6 class='card-ruppes'>&#8377; ".$row['price']."</h6>
          </div>
          </div>
          </div>    
          ";
              if($count==12)
                 break;
        }
          
        echo "
        </div>
        </div>
         
        </div>
        
        <!-- Left and right controls -->
        <a class='carousel-control-prev moveprevious' href='#demo' data-slide='prev'>
          <span class='carousel-control-prev-icon'></span>
        </a>
        <a class='carousel-control-next movenext' href='#demo' data-slide='next'>
          <span class='carousel-control-next-icon'></span>
        </a>
      </div>";
    
    $pdo->close();
    }
?>    

<style>

.moveprevious{
    background-color:black;
    width:30px;
    height:40px;
    position:absolute;
    margin-top:200px;
    margin-left:10px;
    
}
.movenext{
    background-color:black;
    width:30px;
    height:40px;
    position:absolute;
    margin-top:200px;
    margin-right:8px;
}

.recentlyinner{
    border:solid 1px #f2f2f2;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    width:100%;
    height:400px; 
    margin-top:10px;
    background-color:white;
}
.recentlyitem{
    border:solid 1px #f2f2f2;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    width:100%;
    height:400px; 
    margin-top:40px;
    background-color:white;
}
.row {margin: 0 2px;}

.recentlyimg{
    height:250px;
  width:100%;
}
.recentlycard{
    width:250px;
    height:380px;
    margin-top:20px;
}
.recentlycard-title{
    font-size:15px;
  text-decoration:none;
  color:black;
}
.recentlycard-title:hover{
    text-decoration:none;
  color:black;
}
  </style>
