<?php
//*validar id 
$id = $_GET["id"];
$id = filter_var($id, FILTER_VALIDATE_INT); 

if(!$id){
    header('Location: /admin/indexAdmin.php');
}

// var_dump($id);

require '../../../includes/config/database.php';
$db = conectarDB();

$query1 = "SELECT * FROM admin";
$result1 = mysqli_query($db, $query1);

//*obtener los datos de la BD
$query = "SELECT * FROM news WHERE idnews = $id";

$result = mysqli_query($db, $query);
$property = mysqli_fetch_assoc($result);
//var_dump($property['Title']);
$errores = [];

// echo "<pre>";
// var_dump($_POST);
// echo "</pre>";
//*editado
$title = $property['Title'];
$image = $property['Image'];
$description = $property['Description'];
$date = date("Y/m/d");
$fire = $property['Fire'];
$messages = $property['Message'];
$descriptionComplete = $property['DescriptionComplete'];
$admin = $property['admin_idadmin'];
 
//ejecutar e, codigo despues de que el usuario envia el formulario 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    echo "<pre>";
    var_dump($_POST);
    echo "</pre>";


    // echo "<pre>";
    // var_dump($_FILES);
    // echo "</pre>";

    //mysqli_real_escape_string es para sanitizar datos y validar datos
    $title = mysqli_real_escape_string($db, $_POST['title']);
    $image = $_FILES['image'];
    $description = mysqli_real_escape_string($db, $_POST['description']);
    $fire = mysqli_real_escape_string($db, $_POST['fire']);
    $messages = mysqli_real_escape_string($db, $_POST['messages']);
    $descriptionComplete = mysqli_real_escape_string($db, $_POST['descriptionComplete']);
    $admin = mysqli_real_escape_string($db, $_POST['admin']);

    //asignar imagenes hacia una variable
    //$image = $_FILES['image'];
    //var_dump($image);

    //exit;


    if (!$title) {
        $errores[] = "Debes añadir un titulo";
    }
    //validar imagen por tamaño
    $size = 1000*1000;
    if($image['size']> $size){
        $errores[] = "La imagen es muy pesada";
    }
    if ($description) {
        if (strlen($description) > 190 && strlen($description) < 50) {
            $errores[] = "Debes añadir una descripcion de menos de 200 caracteres y mas de 50 caracteres";
        }
    } else {
        $errores[] = "Debes añadir una descripcion";
    }
    if (!$fire) {
        $errores[] = "Debes añadir un numero de fire";
    }
    if (!$messages) {
        $errores[] = "Debes añadir un numero de mensajes";
    }
    if ($descriptionComplete) {
        if (strlen($descriptionComplete) < 50) {
            $errores[] = "Debes añadir una descripcion completa de mas de 50 caracteres";
        }
    } else {
        $errores[] = "Debes añadir una descripcion completa";
    }
    if (!$admin) {
        $errores[] = "Debes seleccionar un administrador";
    }
    if (empty($errores)) {

        //subida de archivos

        //crear carpeta
        //*editado
        $imageFolder = '../../../images/';
        if(!is_dir($imageFolder)){
            mkdir($imageFolder);
        }
        $imageName="";
         
        if($image['name']){
            //eliminar imagen
             unlink($imageFolder. $property["Image"]);  
             // //generar un nombre unico
            $imageName = md5(uniqid(rand(),true)). ".jpg";
            //var_dump($imageName);
            //subir la imagen
            move_uploaded_file($image['tmp_name'], $imageFolder . $imageName );
        }else{
            $imageName = $property["Image"];
        }
        

        
        

        //*editado

        $query = "UPDATE news SET `Title` = '${title}', `Image` = '${imageName}', `Description` = '${description}', `Fire` = ${fire}, `Message` = ${messages}, 
                    `DescriptionComplete` = '${descriptionComplete}', `admin_idadmin` = $admin WHERE `idnews` = $id";
        echo $query;
        $result = mysqli_query($db, $query);

        if ($result) {
            //redireeccionar
            header("Location:/admin/properties/newsAdmin.php?resultado=2");
        }
    }
}

require '../../../includes/funciones.php';

incluirTemplate('circleMenu');

?>
<div class="container">
    <div id="about" class="crud">
        <div class="content-crud newsAdmin">
            <div class="crud-content-text">
                <div class="title-crud">
                    <h2>News Update</h2>
                </div>
                <div class="form-create">
                    <?php foreach ($errores as $error) : ?>
                        <div class="alert">
                            <div class="errorAlert">
                                <?php echo $error; ?>
                            </div>
                        </div>

                    <?php endforeach; ?>
                    <form  class="formulario" method="POST" enctype="multipart/form-data">
                        <fieldset>
                            <legend>General Information</legend>
                            <label for="Title">Title</label>
                            <input type="text" id="Title" placeholder="Title" name="title" value="<?php echo $title ?>">
                            <label for="image">Image</label>
                            <input type="file" id="image" accept="image/jpeg, image/png " name="image">
                            <img src="/images/<?php echo $image ?>" class="image-small">
                            <label for="description">Description</label>
                            <textarea id="description" placeholder="description" name="description"><?php echo $description ?></textarea>
                            <label for="date">Date</label>
                            <input type="text" id="date" value="<?php echo $date; ?>" disabled>
                            <label for="fire">Fire</label>
                            <input type="number" id="fire" placeholder="Fire" min="1" name="fire" value="<?php echo $fire ?>">
                            <label for="messages">Number of Messages</label>
                            <input type="number" id="messages" placeholder="Number of Messages" min="1" name="messages" value="<?php echo $messages ?>">

                        </fieldset>
                        <fieldset>
                            <legend>Specific Information</legend>
                            <label for="descriptionComplete">Description Complete</label>
                            <textarea id="descriptionComplete" placeholder="Description Complete" name="descriptionComplete"><?php echo $descriptionComplete ?></textarea>
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
                <a href="/admin/properties/newsAdmin.php" class="button"><span class="button_top"> Back</span></a>
            </div>
        </div>
    </div>
</div>
<?php incluirTemplate('nav'); ?>
<?php incluirTemplate('footer'); ?>