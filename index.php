<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

	<?php include 'includes/navbar.php'; ?>
	 
	
	  <div class="content-wrapper">

	  <div class="col-12">
					<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		                
		                <div class="carousel-inner">
		                  <div class="item active">
		                    <img src="images/banner1.jpg" alt="mengao">
		                  </div>
		                  <div class="item">
		                    <img src="images/banner2.jpg" alt="neyday">
		                  </div>
		                  <div class="item">
		                    <img src="images/banner3.jpg" alt="black fraude">
		                  </div>
						  <div class="item">
		                    <img src="images/banner4.jpg" alt="peppa">
		                  </div>
		                </div>
		               
		            </div>
					<hr>
				</div>
	    <div class="container">

		
	      <!-- Content Principal -->
	      <section class="content">
	        <div class="row">
				
	        	

				<div class="col-md-9">
	        		<?php
	        			if(isset($_SESSION['error'])){
	        				echo "
	        					<div class='alert alert-danger'>
	        						".$_SESSION['error']."
	        					</div>
	        				";
	        				unset($_SESSION['error']);
	        			}
	        		?>

		       		<?php
		       			$month = date('m');
		       			$conn = $pdo->open();

		       			try{
		       			 	$inc = 3;	
						    $stmt = $conn->prepare("SELECT *, SUM(quantity) AS total_qty FROM details LEFT JOIN sales ON sales.id=details.sales_id LEFT JOIN products ON products.id=details.product_id WHERE MONTH(sales_date) = '$month' GROUP BY details.product_id ORDER BY total_qty DESC LIMIT 9");
						    $stmt->execute();
						    foreach ($stmt as $row) {
						    	$image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
						    	$inc = ($inc == 3) ? 1 : $inc + 1;
	       						if($inc == 1) echo "<div class='row'>";
	       						echo "
	       							<div class='col-sm-4'>
	       								<div class='pee box box-solid'>
		       								<div class='box-body prod-body'>
		       									<img src='".$image."' width='100%' height='230px' class='thumbnail'>
		       									<h5 class='text-center'>".$row['name']."</h5>
		       								</div>
		       								<div class='box-footer'>
											   <h4 class='text-center'>R$ ".number_format($row['price'], 2)."</h4>
											   <a class='pii btn btn-success' role='button' href='product.php?product=".$row['slug']."'> VER </a>
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
							echo "Gatuxas, deu ruim na conexão aqui: " . $e->getMessage();
						}

						$pdo->close();

		       		?> 
	        	</div>
	        	<div class="col-md-3">
	        		<?php include 'includes/sidebar.php'; ?>
	        	</div>
	        </div>
	      </section>
	     
	    </div>
	  </div>
  
  	<?php include 'includes/footer.php'; ?>


</div>

<?php include 'includes/scripts.php'; ?>
</body>
</html>