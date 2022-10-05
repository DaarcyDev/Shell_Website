<?php
require '../../../includes/config/database.php';
$db = conectarDB();

$query1 = "SELECT * FROM admin";
$result1 = mysqli_query($db, $query1);

//arreglo con mensajes de errores
$errores = [];

// echo "<pre>";
// var_dump($_FILES);
// echo "</pre>";
$title = "";
$image = "";
$price = "";
$admin = "";

//ejecutar e, codigo despues de que el usuario envia el formulario 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $title = mysqli_real_escape_string($db,  $_POST['title'] );
    //usamos el $_FILES para poder ver archivos que vienen del formuario
    $image = $_FILES['image'];
    $price = mysqli_real_escape_string($db, $_POST['price']);
    $admin = mysqli_real_escape_string($db, $_POST['admin']);


    if (!$title) {
        $errores[] = "Debes añadir un titulo";
    }
    if (!$image['name'] || $image['error']) {
        $errores[] = "Debes añadir una imagen";
    }
    //validar imagen por tamaño
    $size = 1000*1000;
    if($image['size']> $size){
        $errores[] = "La imagen es muy pesada";
    }
    if (!$price) {
        $errores[] = "Debes añadir un precio";
    }
    if (!$admin) {
        $errores[] = "Debes seleccionar un administrador";
    }


    //revisar que el arreglo este vacio
    if (empty($errores)) {

        //crear carpeta 
        $imageFolder = "../../../images/";
        //is_dir se utiliza para comprobar si el archivo especificado es un directorio o no.
        if(!is_dir($imageFolder)){
            //mkdir es para crear carpetas
            mkdir($imageFolder);
        }

        //generamos un nombre al archivo
        $imageName = md5(uniqid(rand(),true)).".jpg";

        //subir la imagen a la carpeta
        move_uploaded_file($image['tmp_name'],$imageFolder . $imageName);
        
        $query = "INSERT INTO merch (`Title`, `Image`, `Price`, `admin_idadmin`) 
                    VALUES ('$title', '$imageName', '$price', '$admin')";

        $result = mysqli_query($db, $query);

        if ($result) {
            //redireeccionar
            header("Location:/admin/properties/merchAdmin.php?resultado=1");
        }
    }
}

require '../../../includes/funciones.php';

incluirTemplate('circleMenu');

?>
<div class="container">
    <div id="about" class="crud">
        <div class="content-crud merchAdmin">
            <div class="crud-content-text">
                <div class="title-crud">
                    <h2>Merch Create</h2>
                </div>
                <div class="form-create">
                    <?php foreach ($errores as $error) : ?>
                        <div class="alert">
                            <div class="errorAlert">
                                <?php echo $error; ?>
                            </div>
                        </div>

                    <?php endforeach; ?>
                    <!-- es necesario poner enctype="multipart/form-data al formulario parar poner imagenes -->
                    <form action="/admin/properties/merchAdminCrud/create.php" class="formulario" method="POST" enctype="multipart/form-data">
                        <fieldset>
                            <legend>General Information</legend>
                            <label for="Title">Title</label>
                            <input type="text" id="Title" placeholder="Title" name="title" value="<?php echo $title ?>">
                            <label for="image">Image</label>
                            <input type="file" id="image" accept="image/jpeg, image/png " name="image">
                            <label for="price">Price</label>
                            <input type="number" id="price" placeholder="Price" min="1" name="price" value="<?php echo $price ?>">
                        </fieldset>
                        <fieldset>
                            <legend>Admin</legend>
                            <select name="admin">
                                <option value="">-- SELECT --</option>
                                <?php while ($row = mysqli_fetch_assoc($result1)) : ?>
                                    <option <?php echo $admin === $row['idadmin'] ? 'selected' : ''; ?> value="<?php echo $row["idadmin"] ?>"><?php echo $row["UserName"] ?></option>
                                <?php endwhile; ?>
                            </select>
                        </fieldset>
                        <input type="submit" value="Crear Propiedad" class="button_accept">
                    </form>
                </div>
            </div>
            <div class="button-cont">
                <a href="/admin/properties/merchAdmin.php" class="button"><span class="button_top"> Back</span></a>
            </div>
        </div>
    </div>
</div>
<?php incluirTemplate('nav'); ?>
<?php incluirTemplate('footer'); ?>