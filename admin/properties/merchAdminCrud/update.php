<?php
require '../../../includes/funciones.php';
$auth = autenticate();
if(!$auth){
    header('Location: /');
  }
$id = $_GET["id"];
$id = filter_var($id, FILTER_VALIDATE_INT);

if (!$id) {
    header('Location: /admin/indexAdmin.php');
}


require '../../../includes/config/database.php';
$db = conectarDB();

$query1 = "SELECT * FROM admin";
$result1 = mysqli_query($db, $query1);

//*obtener los datos de la BD
$query = "SELECT * FROM merch WHERE idmerch = $id";

$result = mysqli_query($db, $query);
$property = mysqli_fetch_assoc($result);

// var_dump($property); 
// exit;
//arreglo con mensajes de errores
$errores = [];

// echo "<pre>";
// var_dump($_FILES);
// echo "</pre>";
$title = $property['Title'];
$image = $property['Image'];
$price = $property['Price'];
$admin = $property['admin_idadmin'];
$date = date("Y/m/d");
$description = $property['Description'];
//ejecutar e, codigo despues de que el usuario envia el formulario 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $title = mysqli_real_escape_string($db,  $_POST['title']);
    //usamos el $_FILES para poder ver archivos que vienen del formuario
    $image = $_FILES['image'];
    $price = mysqli_real_escape_string($db, $_POST['price']);
    $admin = mysqli_real_escape_string($db, $_POST['admin']);
    $description = mysqli_real_escape_string($db, $_POST['description']);
    $description = str_replace('\r\n', "\r\n", $description);
    $description = str_replace('\r\n\r\n', "\r\n\r\n", $description);

    if (!$title) {
        $errores[] = "Debes añadir un titulo";
    }

    //validar imagen por tamaño
    $size = 1000 * 1000;
    if ($image['size'] > $size) {
        $errores[] = "La imagen es muy pesada";
    }
    if (!$price) {
        $errores[] = "Debes añadir un precio";
    }
    if (!$admin) {
        $errores[] = "Debes seleccionar un administrador";
    }
    if ($description) {
        if (strlen($description) < 50 ) {
            $errores[] = "Debes añadir una descripcion de mas de 50 caracteres";
        }
    } else {
        $errores[] = "Debes añadir una descripcion";
    }

    //revisar que el arreglo este vacio
    if (empty($errores)) {

        //crear carpeta 
        $imageFolder = '../../../images/';
        if (!is_dir($imageFolder)) {
            mkdir($imageFolder);
        }

        // var_dump($image);
        // exit;
        if ($image["name"]) {
            //eliminar la imagen previa
            unlink($imageFolder . $property["Image"]); 
            //generar un nombre unico
            $imageName = md5(uniqid(rand(), true)) . ".jpg";
            //var_dump($imageName);
            //subir la imagen
            move_uploaded_file($image['tmp_name'], $imageFolder . $imageName);
        } else {
            $imageName = $property["Image"];
        }




        $query = "UPDATE merch SET `Title` = '${title}', `Image` = '${imageName}', `Price` = ${price},
                     `admin_idadmin` = $admin, `Date` = '${date}',`Description` = '${description}' WHERE `idmerch` = $id";
        //echo $query;


        $result = mysqli_query($db, $query);

        if ($result) {
            //redireeccionar
            header("Location:/admin/properties/merchAdmin.php?resultado=2");
        }
    }
}


incluirTemplate('circleMenu');

?>
<div class="container">
    <div id="about" class="crud">
        <div class="content-crud merchAdmin">
            <div class="crud-content-text">
                <div class="title-crud">
                    <h2>Merch Update</h2>
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
                    <form class="formulario" method="POST" enctype="multipart/form-data">
                        <fieldset>
                            <legend>General Information</legend>
                            <label for="Title">Title</label>
                            <input type="text" id="Title" placeholder="Title" name="title" value="<?php echo $title ?>">
                            <label for="image">Image</label>
                            <input type="file" id="image" accept="image/jpeg, image/png " name="image">
                            <img src="/images/<?php echo $image ?>" class="image-small">
                            <label for="price">Price</label>
                            <input type="number" id="price" placeholder="Price" min="1" name="price" value="<?php echo $price ?>">
                            <label for="date">Date</label>
                            <input type="text" id="date" value="<?php echo $date; ?>" disabled>
                            <label for="description">Description</label>
                            <textarea id="description" placeholder="description" name="description"><?php echo $description ?></textarea>
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
                        <input type="submit" value="Actualizar Propiedad" class="button_accept">
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