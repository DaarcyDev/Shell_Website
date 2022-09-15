<?php
require '../../../includes/config/database.php';
$db = conectarDB();

$query1 = "SELECT * FROM register";
$result1 = mysqli_query($db, $query1);

$errores = [];

// echo "<pre>";
// var_dump($_POST);
// echo "</pre>";

$title = "";
$image = "";
$description = "";
$date = date("Y/m/d");
$fire = "";
$messages = "";
$descriptionComplete = "";
$admin = "";
 
//ejecutar e, codigo despues de que el usuario envia el formulario 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //mysqli_real_escape_string es para sanitizar datos y validar datos
    $title = mysqli_real_escape_string($db, $_POST['title']);
    //$image = mysqli_real_escape_string($db, $_POST['image']);
    $description = mysqli_real_escape_string($db, $_POST['description']);
    $fire = mysqli_real_escape_string($db, $_POST['fire']);
    $messages = mysqli_real_escape_string($db, $_POST['messages']);
    $descriptionComplete = mysqli_real_escape_string($db, $_POST['descriptionComplete']);
    $admin = mysqli_real_escape_string($db, $_POST['admin']);

    if (!$title) {
        $errores[] = "Debes añadir un titulo";
    }
    // if (!$image) {
    //     $errores[] = "Debes añadir una imagen";
    // }
    if ($description) {
        if (strlen($description) < 50) {
            $errores[] = "Debes añadir una descripcion de mas de 50 caracteres";
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
        $query = "INSERT INTO news (`Title`, `Image`, `Description`, `Date`, `Fire`, `Message`, `DescriptionComplete`, `admin_idadmin`) 
                    VALUES ('$title','', '$description', '$date', '$fire', '$messages', '$descriptionComplete', '$admin')";
        echo $query;
        $result = mysqli_query($db, $query);

        if ($result) {
            //redireeccionar
            header("Location:/admin/properties/newsAdmin.php");
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
                    <h2>News Crear</h2>
                </div>
                <div class="form-create">
                    <?php foreach ($errores as $error) : ?>
                        <div class="alert">
                            <div class="errorAlert">
                                <?php echo $error; ?>
                            </div>
                        </div>

                    <?php endforeach; ?>
                    <form action="/admin/properties/newsAdminCrud/create.php" class="formulario" method="POST">
                        <fieldset>
                            <legend>General Information</legend>
                            <label for="Title">Title</label>
                            <input type="text" id="Title" placeholder="Title" name="title" value="<?php $title ?>">
                            <label for="image">Image</label>
                            <input type="file" id="image" accept="image/jpeg, image/png ">
                            <label for="description">Description</label>
                            <textarea id="description" placeholder="description" name="description"><?php echo $description ?></textarea>
                            <label for="date">Date</label>
                            <input type="text" id="date" value="<?php echo $date; ?>" disabled>
                            <label for="fire">Fire</label>
                            <input type="number" id="fire" placeholder="Fire" min="1" name="fire" value="<?php $fire ?>">
                            <label for="messages">Number of Messages</label>
                            <input type="number" id="messages" placeholder="Number of Messages" min="1" name="messages" value="<?php $messages ?>">

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
                                    <option <?php echo $admin === $row['idRegister'] ? 'selected' : ''; ?> value="<?php echo $row["idRegister"] ?>"><?php echo $row["UserName"] ?></option>
                                <?php endwhile; ?>
                            </select>
                        </fieldset>
                        <input type="submit" value="Crear Propiedad" class="button_accept">
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