<?php
	include 'includes/session.php';
	$conn = $pdo->open();

	if(isset($_POST['login'])){
		
		$email = $_POST['email'];
		$password = $_POST['password'];

		try{

			$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM users WHERE email = :email");
			$stmt->execute(['email'=>$email]);
			$row = $stmt->fetch();
			if($row['numrows'] > 0){
				if($row['status']){
					if(password_verify($password, $row['password'])){
						if($row['type']){
							$_SESSION['admin'] = $row['id'];
						}
						else{
							$_SESSION['user'] = $row['id'];
						}
					}
					else{
						$_SESSION['error'] = 'Senha incorreta.';
					}
				}
				else{
					$_SESSION['error'] = 'Conta não ativada.';
				}
			}
			else{
				$_SESSION['error'] = 'Email não encontrado.';
			}
		}
		catch(PDOException $e){
			echo "Gente... deu problema nessa joça de novo: " . $e->getMessage();
		}

	}
	else{
		$_SESSION['error'] = 'Insira as credenciais primeiro!';
	}

	$pdo->close();

	header('location: login.php');

?>