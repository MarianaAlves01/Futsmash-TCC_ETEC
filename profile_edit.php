<?php
	include 'includes/session.php';

	$conn = $pdo->open();

	if(isset($_POST['edit'])){
		$curr_password = $_POST['curr_password'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$contact = $_POST['contact'];
		$city = $_POST['city'];
		$district = $_POST['district'];
		$cep = $_POST['cep'];
		$address = $_POST['address'];
		$uf = $_POST['uf'];
		if(password_verify($curr_password, $user['password'])){
			

			if($password == $user['password']){
				$password = $user['password'];
			}
			else{
				$password = password_hash($password, PASSWORD_DEFAULT);
			}

			try{
				$stmt = $conn->prepare("UPDATE users SET email=:email, password=:password, firstname=:firstname, lastname=:lastname, contact_info=:contact, city=:city, district=:district, cep=:cep, address=:address, uf=:uf WHERE id=:id");
				$stmt->execute(['email'=>$email, 'password'=>$password, 'firstname'=>$firstname, 'lastname'=>$lastname, 'contact'=>$contact, 'city'=>$city, 'district'=>$district, 'cep'=>$cep, 'address'=>$address, 'uf'=>$uf, 'id'=>$user['id']]);

				$_SESSION['success'] = 'Conta atualizada com sucesso';
			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
			
		}
		else{
			$_SESSION['error'] = 'Senha incorreta';
		}
	}
	else{
		$_SESSION['error'] = 'Preencha tudo primeiro';
	}

	$pdo->close();

	header('location: profile.php');

?>