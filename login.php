<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
</head>
<body>

	<?php
	include ("conect.php");
	$commentObject = $conex->query("SELECT * FROM comentarios");

	$commentObject->setFetchMode(PDO::FETCH_OBJ);

	if (isset($_POST['enviar'])) {
		//si presiono enviar se ejecuta estas intrucciones
		$name = htmlspecialchars($_POST['name'],ENT_QUOTES);
		$body = htmlspecialchars($_POST['body'],ENT_QUOTES);

		$insertQuery = $conex->prepare("INSERT INTO comentarios(name,body) VALUES (:name,:body)");

		$insertQuery->execute(
			array(
				'name'=>$name,
				'body'=>$body,

			)
		);
	}

	?>
	<form method="post">
		<h2>Deja tu comentario</h2>
		Nombre: <input type="text" name="name" required>
		<br><br>
		Comentario:
		<br>
		<textarea id="" name="body" rows="10" cols="30"></textarea>
		<br><br>
  		<input type="submit" name="enviar" value="Enviar">
	</form>

	<table border="1">
       <thead>
         <tr>
            <th>Name</th>
            <th>Body</th>
          </tr>
        </thead>
        <tbody>

        <?php



            while($comentarios = $commentObject->fetch()){

                echo  "<tr>";

                echo "<td>$comentarios->name</td>";

                echo "<td>$comentarios->body</td>";

                echo"</tr>";
            }
			?>
       </tbody>
</body>
</html>
