<div class="row">
	<div class="box box-solid pee">
	  	<div class="box-header with-border">
	    	<h3 class="box-title"><b>Camisas mais vistas hoje</b></h3>
	  	</div>
	  	<div class="box-body">
	  		<ul id="trending">
	  		<?php
	  			$now = date('Y-m-d');
	  			$conn = $pdo->open();

	  			$stmt = $conn->prepare("SELECT * FROM products WHERE date_view=:now ORDER BY counter DESC LIMIT 9");
	  			$stmt->execute(['now'=>$now]);
	  			foreach($stmt as $row){
	  				echo "<li><a class='see' href='product.php?product=".$row['slug']."'>".$row['name']."</a></li>";
	  			}

	  			$pdo->close();
	  		?>
	    	<ul>
	  	</div>
	</div>


	<div class="box box-solid pee">
	  <figure>
	  <img src="images/banner5.jpg" alt="santos">
	  </figure>
	</div>
</div>

