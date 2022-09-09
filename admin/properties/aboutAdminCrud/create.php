<?php
require '../../../includes/funciones.php';

incluirTemplate('circleMenu');

echo "<pre>";
var_dump($_SERVER['REQUEST_METHOD']);
echo "</pre>";

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    echo "<pre>";
    var_dump($_POST);
    echo "</pre>";

    $title = $_POST['Title'];
    $description = $_POST['description'];
    
    $query = "INSERT INTO about (Title, Description, admin_idadmin) VALUES ('$title', '$description', '0')";

    echo $query;
}
?>
<div class="container">
    <div id="about" class="crud">
        <div class="content-crud aboutAdmin">
            <div class="crud-content-text">
                <div class="title-crud">
                    <h2>About Crear</h2>
                </div>
                <div class="form-create">
                    <form action="/admin/properties/aboutAdminCrud/create.php" class="formulario" method="POST">
                        <fieldset>
                            <legend>Informacion General</legend>
                            <label for="Title">Title</label>
                            <input type="text" id="Title" placeholder="Title" name="Title">
                            <label for="description">Description</label>
                            <textarea id="description" placeholder="Description" name="description"></textarea>
                        </fieldset>
                        <input type="submit" value="Crear Propiedad"  class="button_accept">
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