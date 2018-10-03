<html>
	<head></head>
	<body>
		<form action="loginok.php" method="POST">
		
		Email:<input type="text"name="email"/></br>
		Seña:<input type="password" name="sena"/>
		<input type="submit"/>
		
		</form>
	</body>
</html>    
<?php 
if(isset($_GET['msg'])){
	echo "<script>alert('Login e/ou Senha não conferem !');</script>";
}                                                                                                                    
?>