<?php
require '../../../includes/funciones.php';
$auth = autenticate();
if(!$auth){
    header('Location: /');
  }
require '../../../includes/config/database.php';
$db = conectarDB();

$query1 = "SELECT * FROM admin";
$result1 = mysqli_query($db, $query1);


// echo "<pre>";
// var_dump($_SERVER['REQUEST_METHOD']);
// echo "</pre>";

//arreglo con mensajes de errores
$errores = [];


$description = "";
$admin ="";
$date = date("Y/m/d");

//ejecutar e, codigo despues de que el usuario envia el formulario 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $description = mysqli_real_escape_string($db, $_POST['description']);
    $description = str_replace('\r\n\r\n', "\r\n\r\n", $description);
    $description = str_replace('\r\n', "\r\n", $description);
    $admin = mysqli_real_escape_string($db, $_POST['admin']);

    if ($description) {
        if (strlen($description) > 250 ) {
            $errores[] = "Debes añadir una descripcion de menos de 250 caracteres";
        }
        if (strlen($description) < 50 ) {
            $errores[] = "Debes añadir una descripcion de mas de 50 caracteres";
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
        $query = "INSERT INTO banner (`Description`, `admin_idadmin`, `Date`) VALUES ('$description', '$admin', '$date')";

        //INSERT INTO `shell`.`about` (`Description`, `admin_idadmin`) VALUES ('asd', '2');
        //INSERT INTO about (Description, admin_idadmin) VALUES ('123456789123456789123456789123456789123456789123456', '1')
        //echo $query;
        $result = mysqli_query($db, $query);
        
        if($result){
            //redireeccionar
            header("Location:/admin/properties/bannerAdmin.php");
        }
    }
}

incluirTemplate('circleMenu');


?>
<div class="container">
    <div id="about" class="crud">
        <div class="content-crud aboutAdmin">
            <div class="crud-content-text">
                <div class="title-crud">
                    <h2>Banner Create</h2>
                </div>
                <div class="form-create">
                    <?php foreach ($errores as $error) : ?>
                        <div class="alert">
                            <div class="errorAlert">
                                <?php echo $error; ?>
                            </div>
                        </div>

                    <?php endforeach; ?>
                    <form action="/admin/properties/bannerAdminCrud/create.php" class="formulario" method="POST">
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
                                    <option <?php echo $admin === $row['idadmin'] ? 'selected' : ''; ?> value="<?php echo $row["idadmin"] ?>"><?php echo $row["UserName"] ?></option>
                                <?php endwhile; ?>
                            </select>
                        </fieldset>
                        <input type="submit" value="Crear Propiedad" class="button_accept">
                    </form>
                </div>
            </div>
            <div class="button-cont">
                <a href="../bannerAdmin.php" class="button"><span class="button_top"> Back</span></a>
            </div>
        </div>
    </div>
</div>
<?php incluirTemplate('nav'); ?>
<?php incluirTemplate('footer'); ?>