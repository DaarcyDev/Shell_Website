<?php
require '../../../includes/config/database.php';
$db = conectarDB();

$query1 = "SELECT * FROM register";
$result1 = mysqli_query($db, $query1);


// echo "<pre>";
// var_dump($_SERVER['REQUEST_METHOD']);
// echo "</pre>";

//arreglo con mensajes de errores
$errores = [];


$description = "";
$admin ="";

//ejecutar e, codigo despues de que el usuario envia el formulario 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $description = $_POST['description'];
    $admin = $_POST['admin'];

    if ($description) {
        if (strlen($description) < 50) {
            $errores[] = "Debes añadir una descripcion de mas de 50 carcteres";
        }
    } else {
        $errores[] = "Debes añadir una descripcion";
    }
    if (!$admin) {
        $errores[] = "Debes seleccionar un administrador";
    }

    // echo "<pre>";
    // var_dump($errores );
    // echo "</pre>";

    //revisar que el arreglo este vacio
    if (empty($errores)) {
        $query = "INSERT INTO about (`Description`, `admin_idadmin`) VALUES ('$description', '$admin')";

        //INSERT INTO `shell`.`about` (`Description`, `admin_idadmin`) VALUES ('asd', '2');
        //INSERT INTO about (Description, admin_idadmin) VALUES ('123456789123456789123456789123456789123456789123456', '1')
        //echo $query;
        $result = mysqli_query($db, $query);
        
        if($result){
            //redireeccionar
            header("Location:/admin/properties/aboutAdmin.php");
        }
    }
}
require '../../../includes/funciones.php';

incluirTemplate('circleMenu');


?>
<div class="container">
    <div id="about" class="crud">
        <div class="content-crud aboutAdmin">
            <div class="crud-content-text">
                <div class="title-crud">
                    <h2>About Crear</h2>
                </div>
                <div class="form-create">
                    <?php foreach ($errores as $error) : ?>
                        <div class="alert">
                            <div class="errorAlert">
                                <?php echo $error; ?>
                            </div>
                        </div>

                    <?php endforeach; ?>
                    <form action="/admin/properties/aboutAdminCrud/create.php" class="formulario" method="POST">
                        <fieldset>
                            <legend>Informacion General</legend>
                            <label for="description">Description</label>
                            <textarea id="description" placeholder="Description" name="description"><?php echo $description ?></textarea>
                        </fieldset>
                        <fieldset>
                            <legend>Admin</legend>
                            <select name="admin">
                                <option value="">-- SELECT --</option>
                                <?php while($row = mysqli_fetch_assoc($result1)): ?>
                                    <option <?php echo $admin === $row['idRegister'] ? 'selected' : ''; ?> value="<?php echo $row["idRegister"] ?>"><?php echo $row["UserName"] ?></option>
                                <?php endwhile; ?>
                            </select>
                        </fieldset>
                        <input type="submit" value="Crear Propiedad" class="button_accept">
                    </form>
                </div>
            </div>
            <div class="button-cont">
                <a href="../aboutAdmin.php" class="button"><span class="button_top"> Back</span></a>
            </div>
        </div>
    </div>
</div>
<?php incluirTemplate('nav'); ?>
<?php incluirTemplate('footer'); ?>