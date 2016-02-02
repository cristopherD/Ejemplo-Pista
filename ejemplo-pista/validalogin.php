<?php
$usuario = $_REQUEST['usuario'];
$pass = $_REQUEST['pass'];
//Conectarnos a la base de datos
$conexion = new mysqli('localhost', 'root', 'Ausias', 'seguridad');
if ($conexion->connect_errno) {
die("Error de conexion: $conexion->connect_error");
}
//evitamos un sql-injection
$usuario = $conexion->real_escape_string($usuario);
$pass = $conexion->real_escape_string($pass);
$sql = "SELECT * "
. "FROM tbl_user "
. "WHERE username='$usuario' AND password=MD5('$pass')";
$result = $conexion->query($sql);
$validado = FALSE;
while ($fila = $result->fetch_assoc()){
//hay un usuario que cumple
$validado = TRUE;
$email=$fila['email'];
$id_user = $fila['clave_usuario'];
}

$conexion->close();

if ($validado) {
echo "El usuario $usuario con $email ha entrado en el sistema <br>";
//Ahora toca buscar las preguntas para ponerlas en pantalla dentro de un form
$sql = "SELECT * "
. "FROM preguntas ";
$result = $conexion->query($sql);
echo '<FORM action="calificar.php" method="post">';
while ($fila = $result->fetch_assoc()) {
//cogemos la pregunta y las opciones
$idp = $fila['id'];
$pregunta = $fila['pregunta'];
$op1 = $fila['opcion1'];
$op2 = $fila['opcion2'];
$op3 = $fila['opcion3'];
//las presentamos
echo '<b>',$pregunta,'</b><br>';
echo "<input type='radio' name='$ipd' value='1'> $op1 <br>";
echo "<input type='radio' name='$ipd' value='2'> $op2 <br>";
echo "<input type='radio' name='$ipd' value='3'> $op3 <br>";

echo "<hr>";
}
echo '<input type="submit" value="corregir">';
echo '</FORM>';
}
else { echo "Usuario o contraseña incorrecto ";}




echo '<FORM action="calificar.php" method="post">';
//añadimos información del usuario
echo "<input type=\"hidden\" name=\"usuario\" value=\"$id\">";
while ($fila = $result->fetch_assoc()) {
    <FORM action="calificar.php" method="post">
<input type="hidden" name="usuario" value="1">
}
