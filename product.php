<?php include 'includes/session.php'; ?>
<?php
	$conn = $pdo->open();

	$slug = $_GET['product'];

	try{
		 		
	    $stmt = $conn->prepare("SELECT *, products.name AS prodname, category.name AS catname, products.id AS prodid FROM products LEFT JOIN category ON category.id=products.category_id WHERE slug = :slug");
	    $stmt->execute(['slug' => $slug]);
	    $product = $stmt->fetch();
		
	}
	catch(PDOException $e){
		echo "Filhotas, problema na conexão aqui: " . $e->getMessage();
	}

	// Página de visualização aqui
	$now = date('Y-m-d');
	if($product['date_view'] == $now){
		$stmt = $conn->prepare("UPDATE products SET counter=counter+1 WHERE id=:id");
		$stmt->execute(['id'=>$product['prodid']]);
	}
	else{
		$stmt = $conn->prepare("UPDATE products SET counter=1, date_view=:now WHERE id=:id");
		$stmt->execute(['id'=>$product['prodid'], 'now'=>$now]);
	}

?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

	<?php include 'includes/navbar.php'; ?>
	 
	  <div class="content-wrapper">
	    <div class="container">

	      <!-- Content Principal -->
	      <section class="content">
	        <div class="row">
	        	<div class="col-sm-9">
	        		<div class="callout" id="callout" style="display:none">
	        			<button type="button" class="close"><span aria-hidden="true">&times;</span></button>
	        			<span class="message"></span>
	        		</div>
		            <div class="row">

					<!--Coluna do produto e os botões de quantidade e adicionar no carrinho-->
						
		            	<div class="col-sm-6">

		            		<img src="<?php echo (!empty($product['photo'])) ? 'images/'.$product['photo'] : 'images/noimage.jpg'; ?>" width="100%" class="zoom saa" data-magnify-src="images/large-<?php echo $product['photo']; ?>">

		            		<br><br>

		            		
		            	</div>

						<!-- Coluna das informações do produto -->

		            	<div class="col-sm-6">

		            		<h1 class="page-header"><?php echo $product['prodname']; ?></h1>

		            		<h3><b>R$ <?php echo number_format($product['price'], 2); ?></b></h3>

		            		<p><b>Time:</b> <a href="category.php?category=<?php echo $product['cat_slug']; ?>"><?php echo $product['catname']; ?></a></p>

		            		<p><b>Descrição:</b></p>
							
		            		<p><?php echo $product['description']; ?></p>

							<form class="form-inline" id="productForm">

		            			<div class="form-group">

			            			<div class="input-group puu col-sm-5" style="margin-bottom:2rem;">
			            				
			            				<span class="input-group-btn">
			            					<button type="button" id="minus" class="poo btn btn-success "><i class="fa fa-minus"></i></button>
			            				</span>

							          	<input type="text" name="quantity" id="quantity" class="form-control " value="1">

							            <span class="input-group-btn">
							                <button  type="button" id="add" class="poo btn btn-success "><i class="fa fa-plus"></i>
							                </button>
							            </span>

							            <input type="hidden" value="<?php echo $product['prodid']; ?>" name="id">

							        </div>

			            			

			            		</div>

								<br>

								<?php
									//pegando tamanho pois está em array
									$tamanhos = $product['sizes'];
									//$tamanhos = rtrim($tamanhos, ',');
									$lista_tamanhos = explode(',', $tamanhos);
									//var_dump($lista_tamanhos);
								?>
								
								<div class='form-group col-sm-12' style='margin-left: 1rem;'>
									<label for="tamanho">Tamanho</label>
                                    <select name="tamanho" id="tamanho" class="form-control">
                                        <option value=""></option>
                                        	<?php 
                                                foreach($lista_tamanhos as $string)
												{
                                                    echo '<option value="'.$string.'">'.$string.'</option>';
                                                }
                                                ?>
                                            </select>
								</div>
								
								<button style="margin-top: 3rem;" type="submit" class=" poo btn btn-success btn-lg">Adicionar ao carrinho <i class="fa fa-shopping-cart car_icon"></i></button>
								
								
								

		            		</form>


		            	</div>


		            </div>
					
		            <br>
					<br>
					<hr>
					<br>

					<h3 class="text-center">Mais vendidas do mês</h3>
					<br>
		       		<?php
		       			$month = date('m');
		       			$conn = $pdo->open();

		       			try{
		       			 	$inc = 3;	
						    $stmt = $conn->prepare("SELECT *, SUM(quantity) AS total_qty FROM details LEFT JOIN sales ON sales.id=details.sales_id LEFT JOIN products ON products.id=details.product_id WHERE MONTH(sales_date) = '$month' GROUP BY details.product_id ORDER BY total_qty DESC LIMIT 6");
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
											   <a  class='pii btn btn-success' role='button' href='product.php?product=".$row['slug']."'> VER </a>
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
	        	
				<div class="col-sm-3">
	        		<?php include 'includes/sidebar.php'; ?>
	        	</div>
	        </div>
	      </section>
	     
	    </div>
	  </div>
  	<?php $pdo->close(); ?>

  	<?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
	$('#add').click(function(e){
		e.preventDefault();
		var quantity = $('#quantity').val();
		quantity++;
		$('#quantity').val(quantity);
	});
	$('#minus').click(function(e){
		e.preventDefault();
		var quantity = $('#quantity').val();
		if(quantity > 1){
			quantity--;
		}
		$('#quantity').val(quantity);
	});

});
</script>
</body>
</html>