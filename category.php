<?php include 'session.php'; ?>
<?php include 'header.php'; ?>
<?php
	$slug = $_GET['category'];

	$conn = $pdo->open();

	try{
		$stmt = $conn->prepare("SELECT * FROM category WHERE cat_slug = :slug");
		$stmt->execute(['slug' => $slug]);
		$cat = $stmt->fetch();
		$catid = $cat['id'];
	}
	catch(PDOException $e){
		echo "There is some problem in connection: " . $e->getMessage();
	}

	$pdo->close();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Ecommerce</title>
</head>
<body style="background-color:#f2f2f2;">

	<?php include 'navbar.php'; ?>
	    <div class="container">

		            <h1 class="page-header"><?php echo $cat['name']; ?></h1>
		       		<?php
		       			
		       			$conn = $pdo->open();

		       			try{
		       			 	$inc = 3;	
						    $stmt = $conn->prepare("SELECT * FROM products WHERE category_id = :catid");
						    $stmt->execute(['catid' => $catid]);
						    foreach ($stmt as $row) {
						    	$image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
						    	$inc = ($inc == 3) ? 1 : $inc + 1;
	       						if($inc == 1) echo "<div class='row'>";
								   echo "
	       							<div class='col-sm-4'>
	       								<div class='box'>
		       								<div class='box-img'>
												   <img src='".$image."' width='100%' height='230px' class='thumbnail'>
											</div>
												   <h5><a class='box-name stretched-link' href='product.php?product=".$row['slug']."'>".$row['name']."</a></h5>
												   <br>
												   <hr>
		       								<div class='box-footer'>
		       									<b>	&#8377; ".number_format($row['price'], 2)."</b>
		       								</div>
	       								</div>
									   </div>
	       						";
	       						if($inc == 3) echo "</div>";
						    }
						    if($inc == 1) echo "<div class='col-sm-4'></div><div class='col-sm-4'></div></div>"; 
							if($inc == 2) echo "<div class='col-sm-4'></div></div>";
						}
						catch(PDOException $e){
							echo "There is some problem in connection: " . $e->getMessage();
						}

						$pdo->close();

		       		?> 
	        	</div>
				<?php include 'footer.php';?>
</body>
<style>
.page-header{
	margin-top:20px;
	margin-left:10px;
}
.box{
	height:350px;
	width:300px;
	margin-left:10px;
	margin-bottom:10px;
	background-color:white;
}
.box-img{
	margin:8px 8px 8px 8px;
	
}

.box-name:hover{
	text-decoration:none;
	color:black;
}
.box-name{
	color:black;
    font-size:10px;
	font-weight:bold;
	margin-left:20px;
}
.box-footer{
	margin-left:20px;
	font-size:10px;
}
@media screen and (max-width: 600px) {
  .box {
    margin-left: 100px;
  }
  .page-header{
	  text-align:center;
  }
}
</style>
</html>