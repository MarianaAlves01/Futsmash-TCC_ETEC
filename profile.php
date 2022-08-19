<?php include 'includes/session.php'; ?>
<?php
	if(!isset($_SESSION['user'])){
		header('location: index.php');
	}

	setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
    date_default_timezone_set('America/Sao_Paulo');
?>
<?php include 'includes/header.php'; ?>
<body class="naa hold-transition layout-top-nav">
<div class="wrapper">

	<?php include 'includes/navbar.php'; ?>
	 
	  <div class="content-wrapper">
	    <div class="container">

	      <!-- Content Principal -->
	      <section class="content">
	        <div class="row">
	        	<div class="col-sm-12">
	        		<?php
	        			if(isset($_SESSION['error'])){
	        				echo "
	        					<div class='callout callout-danger'>
	        						".$_SESSION['error']."
	        					</div>
	        				";
	        				unset($_SESSION['error']);
	        			}

	        			if(isset($_SESSION['success'])){
	        				echo "
	        					<div class='callout callout-success'>
	        						".$_SESSION['success']."
	        					</div>
	        				";
	        				unset($_SESSION['success']);
	        			}
	        		?>
	        		<div class="box box-solid">
					<div class="box-header with-border">
	        				<h4 class="box-title"><i class="fa fa-user"></i> <b>Dados do usuário</b></h4>
	        			</div>
	        			<div class="box-body">
	        				
						<table class="table table-bordered" >
	        					<thead>
									<th>Nome:</th>
	        						<th>Email:</th>
	        						<th>Contato:</th>
									<th>Cidade:</th>
									<th>Bairro:</th>
									<th>CEP:</th>
	        						<th>Endereço:</th>
									<th>UF:</th>
	    							<th>Membro desde:</th>
									<th></th>
	        					</thead>
	        					<tbody>
	        							
	        						<tr>
										<td><?php echo $user['firstname'].' '.$user['lastname']; ?></td>
	        							<td><?php echo $user['email']; ?></h4>
	        							<td><?php echo (!empty($user['contact_info'])) ? $user['contact_info'] : 'N/a'; ?></td>
										<td><?php echo (!empty($user['city'])) ? $user['city'] : 'N/a'; ?></td>
										<td><?php echo (!empty($user['district'])) ? $user['district'] : 'N/a'; ?></td>
										<td><?php echo (!empty($user['cep'])) ? $user['cep'] : 'N/a'; ?></td>
	        							<td><?php echo (!empty($user['address'])) ? $user['address'] : 'N/a'; ?></td>
										<td><?php echo (!empty($user['uf'])) ? $user['uf'] : 'N/a'; ?></td>
	        							<td><?php echo strftime('%d de %B de %Y', strtotime($user['created_on'])); ?></td>
										<td><span class="pull-right">
	        									<a href="#edit" style="color: white;" class="btn noo btn-block" data-toggle="modal"><i class="fa fa-edit"></i> Editar</a>
	        								</span></td>
	        						</tr>
	        						
									</tbody>
	        				</table>
	        		</div>
	        		<div class="box box-solid">
	        			<div class="box-header with-border">
	        				<h4 class="box-title"><i class="fa fa-calendar"></i> <b>Histórico de transação</b></h4>
	        			</div>
	        			<div class="box-body">
	        				<table class="table table-bordered">
	        					<thead>
	        						<th class="hidden"></th>
	        						<th>Data</th>
	        						<th>Transação</th>
	        						<th>Valor</th>
	        						<th>Detalhes</th>
	        					</thead>
	        					<tbody>
	        					<?php
	        						$conn = $pdo->open();

	        						try{
	        							$stmt = $conn->prepare("SELECT * FROM sales WHERE user_id=:user_id ORDER BY sales_date DESC");
	        							$stmt->execute(['user_id'=>$user['id']]);
	        							foreach($stmt as $row){
	        								$stmt2 = $conn->prepare("SELECT * FROM details LEFT JOIN products ON products.id=details.product_id WHERE sales_id=:id");
	        								$stmt2->execute(['id'=>$row['id']]);
	        								$total = 0;
	        								foreach($stmt2 as $row2){
	        									$subtotal = $row2['price']*$row2['quantity'];
	        									$total += $subtotal;
	        								}
											
	        								echo "
	        									<tr>
	        										<td class='hidden'></td>
													
	        										<td>".strftime('%A, %d de %B de %Y', strtotime($row['sales_date']))."</td>
	        										<td>".$row['pay_id']."</td>
	        										<td>R$ ".number_format($total, 2)."</td>
	        										<td><button style='border-radius: 2rem;' class='btn btn-sm btn-flat btn-success transact' data-id='".$row['id']."'><i class='fa fa-search'></i> Ver</button></td>
	        									</tr>
	        								";
	        							}

	        						}
        							catch(PDOException $e){
										echo "Opa opa opa, deu problema na conexão: " . $e->getMessage();
									}

	        						$pdo->close();
	        					?>
	        					</tbody>
	        				</table>
	        			</div>
	        		</div>
	        	</div>

	        </div>
	      </section>
	     
	    </div>
	  </div>
  
  	<?php include 'includes/footer.php'; ?>
  	<?php include 'includes/profile_modal.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
	$(document).on('click', '.transact', function(e){
		e.preventDefault();
		$('#transaction').modal('show');
		var id = $(this).data('id');
		$.ajax({
			type: 'POST',
			url: 'transaction.php',
			data: {id:id},
			dataType: 'json',
			success:function(response){
				$('#date').html(response.date);
				$('#transid').html(response.transaction);
				$('#detail').prepend(response.list);
				$('#total').html(response.total);
			}
		});
	});

	$("#transaction").on("hidden.bs.modal", function () {
	    $('.prepend_items').remove();
	});
});
</script>
</body>
</html>