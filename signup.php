<?php include 'includes/session.php'; ?>
<?php
  if(isset($_SESSION['user'])){
    header('location: cart_view.php');
  }

?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition register-page">
<div class="register-box">
  	<?php
      if(isset($_SESSION['error'])){
        echo "
          <div class='callout callout-danger text-center'>
            <p>".$_SESSION['error']."</p> 
          </div>
        ";
        unset($_SESSION['error']);
      }

      if(isset($_SESSION['success'])){
        echo "
          <div class='callout callout-success text-center'>
            <p>".$_SESSION['success']."</p> 
          </div>
        ";
        unset($_SESSION['success']);
      }
    ?>
  	<div class="register-box-body">
    	<p class="login-box-msg">Torne-se um membro</p>

    	<form action="register.php" method="POST">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="firstname" placeholder="Nome" value="<?php echo (isset($_SESSION['firstname'])) ? $_SESSION['firstname'] : '' ?>" required>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="lastname" placeholder="Sobrenome" value="<?php echo (isset($_SESSION['lastname'])) ? $_SESSION['lastname'] : '' ?>"  required>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
      		<div class="form-group has-feedback">
        		<input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo (isset($_SESSION['email'])) ? $_SESSION['email'] : '' ?>" required>
        		<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      		</div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="Senha" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="repassword" placeholder="Repita a senha" required>
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
          </div>
          <hr>
      		<div class="row">
    			<div class="col-xs-12">
          			<button type="submit" class="btn btn-success btn-block btn-flat" name="signup"><i class="fa fa-pencil"></i> Criar</button>
        		</div>
      		</div>
    	</form>
      <br>
      <div class="row">
        <div class="col-xs-6">
        <button class="btn btn-block"><a style="color: #076b39;"href="login.php" class="text-center"><i class="fa fa-check"></i> Já tenho conta</a></button>
        </div>
        <div class="col-xs-6">
        <button class="btn btn-block"><a style="color: #076b39;" href="index.php"><i class="fa fa-home"></i> Início</a> </button>
        </div>
   
    </div>     
  	</div>
</div>
	
<?php include 'includes/scripts.php' ?>
</body>
</html>