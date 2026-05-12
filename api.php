<?php
// Configuración de la conexión
$host = "162.20.101.107";
$dbname = "Baches;
$user = "postgres";
$pass = "1155.Jona";
 
$conn = pg_connect("host=$host dbname=$dbname user=$user password=$pass");
 
if (!$conn) {
    die("Error de conexión.");
}
 
// Recibir datos del formulario
$numero    = $_POST['numero'];
$calle     = $_POST['calle'];
$colonia   = $_POST['colonia'];
$cp        = $_POST['cp'];
$prioridad = $_POST['prioridad'];
$coord_x   = $_POST['x'];
$coord_y   = $_POST['y'];
 
// Preparar la consulta SQL (Usamos la tabla Baches de tu esquema)
$sql = "INSERT INTO Baches (numero, calle, colonia, codigo_POSTAL, prioridad, coordenada_x, coordenada_y) 
        VALUES ($1, $2, $3, $4, $5, $6, $7)";
 
// Ejecutar de forma segura para evitar Inyección SQL
$result = pg_query_params($conn, $sql, array($numero, $calle, $colonia, $cp, $prioridad, $coord_x, $coord_y));
 
if ($result) {
    echo "<h3>¡Bache registrado con éxito!</h3>";
    echo "<a href='registro_bache.html'>Volver al formulario</a>";
} else {
    echo "Error al registrar: " . pg_last_error($conn);
}
 
pg_close($conn);
?>