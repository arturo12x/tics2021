<script></script>
<form action="index2_pdo.php" method="GET">

<?php
if(isset($_GET['id']))$id=$_GET['id']; else $id='';
if(isset($_GET['nombre']))$name=$_GET['nombre']; else $name='';
if(isset($_GET['apellido']))$lastname=$_GET['apellido']; else $lastname='';
if(isset($_GET['edad']))$age=$_GET['edad']; else $age='';
?>
    <p>ID (Solo para editar un campo)</p>  <input type="text" name="id" value="<?=$id?>" >
    <p>NOMBRE</p>  <input type="text" name="nombre" value="<?=$name?>" >
    <p>APELLIDO</p>  <input type="text" name="apellido" value="<?=$lastname?>" >
    <p>EDAD</p>  <input type="text" name="edad" value="<?=$age?>"

    <br>
    <br>
    <input type="submit" name="accion"  value="agregar">
    <input type="submit" name="accion"  value="editar">
    <input type="reset">
    <br>
</form>

<form action="index2_pdo.php" method="get">
    <table border="1px">
        <thead style="width: 100%; border: 1px">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Edad</th>
            <th>Eliminar</th>
        </tr>
        </thead>
        <tbody>

        <?php
        include_once ('php/conex_pdo.php');
        $query='SELECT * FROM students order by id desc';
        $ejecutar=mysqli_query($conn,$query);
        while($renglon=mysqli_fetch_assoc($ejecutar)):
            ?>
            <tr>
                <td><?=$renglon['id'];?></td>
                <td><?=$renglon['name'];?></td>
                <td><?=$renglon['lastname'];?></td>
                <td><?=$renglon['age'];?></td>
                <td><button type="submit" name="id" value="<?=$renglon['id'];?>">Eliminar</button>
                    <input type="hidden" name="accion" value="eliminar"></td>
            </tr>
        <?php endwhile;?>
        </tbody>
    </table>

</form>

<div class="row">
    <p id="p001"></p>
    <button value="JAVASCRIPT" onclick="holamundo()">Click aqui</button>
</div>


<script src="js/exercise1.js"></script>
