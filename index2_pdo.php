<?php



include_once ('php/conex_pdo.php');

if(isset($_GET['nombre']))$name=$_GET['nombre'];
if(isset($_GET['apellido']))$lastname=$_GET['apellido'];
if(isset($_GET['edad']))$age=$_GET['edad'];
$accion=$_GET['accion'];

if($accion=='agregar'){
    //Evita la inyeccion SQL

$stmt=$conn->prepare('INSERT INTO students (name,lastname,age)VALUES(?,?,?)');
    $stmt->bind_param('ssi',$name,$lastname,$age);
$stmt->execute();
    $query="Select id FROM students order by id desc limit 1";
$ejecuta=mysqli_query($conn,$query);
$lastid=mysqli_fetch_array($ejecuta);

?>

    <form action="students.php" method="get">
        <input type="submit" value="Volver al menu principal">
        <input type="hidden" name="id" value="<?=$lastid['id'];?>">
        <input type="hidden" name="nombre" value="<?=$name;?>">
        <input type="hidden" name="apellido" value="<?=$lastname;?>">
        <input type="hidden" name="edad" value="<?=$age;?>">
    </form>
    
<?php

    //convertir a querys preparadas el proyecto anterior
}

if($accion=='editar'){
    //Evita la inyeccion SQL
    $id = $_GET['id'];
    $stmt=$conn->prepare('UPDATE students SET name=?,lastname=?,age=? where id=?');
    $stmt->bind_param('ssii',$name,$lastname,$age,$id);
    $stmt->execute();

    //convertir a querys preparadas el proyecto anterior
}

if($accion=='eliminar') {
    $id = $_GET['id'];
    $query="DELETE FROM students WHERE id={$id}";
   if($ejecutar=mysqli_query($conn,$query))echo 'Alumno eliminado con exito';
   else echo 'Ocurrió un error al intentar eliminar';
    /*$stmt = $conn->prepare('DELETE FROM students WHERE id=?');
    $stmt->bind_param('i', $id);
    if ($stmt->execute()) {
        echo "Alumno eliminado con éxito";
    }*/
}

?>
<?php if($accion!='agregar'):?>
<form action="students.php" method="get">
    <input type="submit" value="Volver al menu principal">
    <input type="hidden" name="id" value="">
    <input type="hidden" name="nombre" value="">
    <input type="hidden" name="apellido" value="">
    <input type="hidden" name="edad" value="">
</form>
<?php endif; ?>
