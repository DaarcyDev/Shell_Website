<?php
require '../../../includes/config/database.php';
$db = conectarDB();

$query1 = "SELECT * FROM register";
$result1 = mysqli_query($db, $query1);

//arreglo con mensajes de errores
$errores = [];


$title = "";
$image = "";
$price = "";
$admin = "";

//ejecutar e, codigo despues de que el usuario envia el formulario 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $title = $_POST['title'];
    $image = $_POST['image'];
    $price = $_POST['price'];
    $admin = $_POST['admin'];


    if (!$title) {
        $errores[] = "Debes añadir un titulo";
    }
    // if (!$image) {
    //     $errores[] = "Debes seleccionar un administrador";
    // }
    if (!$price) {
        $errores[] = "Debes añadir un precio";
    }
    if (!$admin) {
        $errores[] = "Debes seleccionar un administrador";
    }


    //revisar que el arreglo este vacio
    if (empty($errores)) {
        $query = "INSERT INTO merch (`Title`, `Image`, `Price`, `admin_idadmin`) VALUES ('$title', '', '$price', '$admin')";

        $result = mysqli_query($db, $query);

        if ($result) {
            //redireeccionar
            header("Location:/admin/properties/merchAdmin.php");
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
                    <form action="/admin/properties/merchAdminCrud/create.php" class="formulario" method="POST">
                        <fieldset>
                            <legend>General Information</legend>
                            <label for="Title">Title</label>
                            <input type="text" id="Title" placeholder="Title" name="title">
                            <label for="image">Image</label>
                            <input type="file" id="image" accept="image/jpeg, image/png" name="image">
                            <label for="price">Price</label>
                            <input type="number" id="price" placeholder="Price" min="1" name="price">
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
                <a href="/admin/properties/merchAdmin.php" class="button"><span class="button_top"> Back</span></a>
            </div>
        </div>
    </div>
</div>
<?php incluirTemplate('nav'); ?>
<?php incluirTemplate('footer'); ?>