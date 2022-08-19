<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$address = $_POST['address'];
		$contact = $_POST['contact'];

		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM users WHERE email=:email");
		$stmt->execute(['email'=>$email]);
		$row = $stmt->fetch();

		if($row['numrows'] > 0){
			$_SESSION['error'] = 'Email já cadastrado';
		}
		else{
			$password = password_hash($password, PASSWORD_DEFAULT);
			$now = date('Y-m-d');
			
			try{
				$stmt = $conn->prepare("INSERT INTO users (email, password, firstname, lastname, address, contact_info, status, created_on) VALUES (:email, :password, :firstname, :lastname, :address, :contact, :status, :created_on)");
				$stmt->execute(['email'=>$email, 'password'=>$password, 'firstname'=>$firstname, 'lastname'=>$lastname, 'address'=>$address, 'contact'=>$contact, 'status'=>1, 'created_on'=>$now]);
				$_SESSION['success'] = 'Usuário adicionado com sucesso';

			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Preencha o campo primeiro';
	}

	header('location: users.php');

?>