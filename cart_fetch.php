<?php
	include 'session.php';
	$conn = $pdo->open();

	$output = array('list'=>'','count'=>0);

	if(isset($_SESSION['user'])){
		try{
			$stmt = $conn->prepare("SELECT *, products.name AS prodname, category.name AS catname FROM cart LEFT JOIN products ON products.id=cart.product_id LEFT JOIN category ON category.id=products.category_id WHERE user_id=:user_id");
			$stmt->execute(['user_id'=>$user['id']]);
			foreach($stmt as $row){
				$output['count']++;
				$image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
				$productname = (strlen($row['prodname']) > 30) ? substr_replace($row['prodname'], '...', 27) : $row['prodname'];
				$output['list'] .= "
					<li>
						<a href='product.php?product=".$row['slug']."'>
							<div class='float-left'>
								<img src='".$image."' class='thumbnail' style='width:20px;' alt='User Image'>
							</div>
							<h4>
		                        <b>".$row['catname']."</b>
		                        <small>&times; ".$row['quantity']."</small>
		                    </h4>
		                    <p>".$productname."</p>
						</a>
					</li>
				";
			}
		}
		catch(PDOException $e){
			$output['message'] = $e->getMessage();
		}
	}
	else{
		if(!isset($_SESSION['cart'])){
			$_SESSION['cart'] = array();
		}

		if(empty($_SESSION['cart'])){
			$output['count'] = 0;
		}
		else{
			foreach($_SESSION['cart'] as $row){
				$output['count']++;
				$stmt = $conn->prepare("SELECT *, products.name AS prodname, category.name AS catname FROM products LEFT JOIN category ON category.id=products.category_id WHERE products.id=:id");
				$stmt->execute(['id'=>$row['productid']]);
				$product = $stmt->fetch();
				$image = (!empty($product['photo'])) ? 'images/'.$product['photo'] : 'images/noimage.jpg';
				$output['list'] .= "
					<li style='list-style:none;max-height:200px;overflow-x:hidden;'>
						<a href='product.php?product=".$product['slug']."' style='padding:10 10 10 10px;display:block;border-bottom:1px solid  #cccccc;text-decoration:none;'>
							<div class='pull-left' style='float:left;'>
								<img src='".$image."' class='rounded-circle' style='width:40px;margin:5 0 0 5px;' alt='User Image'>
							</div>
							<h4 style='position:relative;color:black;margin:0 0 0 45px;font-size:15px;padding:0;'>
		                        <b>".$product['catname']."</b>
		                        <small style='float:right;'>&times; ".$row['quantity']."</small>
		                    </h4>
		                    <p style='margin:0 0 0 45px;font-size:12px;color:grey;display:block;white-space:nowrap;padding-bottom:20px;'>".$product['prodname']."</p>
						</a>
					</li>
				";
				
			}
		}
	}

	$pdo->close();
	echo json_encode($output);

?>
