<?php
	include 'includes/session.php';

	setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
    date_default_timezone_set('America/Sao_Paulo');

	$id = $_POST['id'];

	$conn = $pdo->open();

	$output = array('list'=>'');

	$stmt = $conn->prepare("SELECT * FROM details LEFT JOIN products ON products.id=details.product_id LEFT JOIN sales ON sales.id=details.sales_id WHERE details.sales_id=:id");
	$stmt->execute(['id'=>$id]);

	$total = 0;
	foreach($stmt as $row){
		$output['transaction'] = $row['pay_id'];
		$output['date'] = strftime('%d de %B de %Y', strtotime($row['sales_date']));
		$subtotal = $row['price']*$row['quantity'];
		$total += $subtotal;
		$output['list'] .= "
			<tr class='prepend_items'>
				<td>".$row['name']."</td>
				<td>R$ ".number_format($row['price'], 2)."</td>
				<td>".$row['size']."</td>
				<td>".$row['quantity']."</td>
				<td>R$ ".number_format($subtotal, 2)."</td>
			</tr>
		";
	}
	
	$output['total'] = '<b>R$ '.number_format($total, 2).'<b>';
	$pdo->close();
	echo json_encode($output);

?>