<?php
require '../../../includes/funciones.php';

incluirTemplate('circleMenu');

// echo "<pre>";
// var_dump($_SERVER['REQUEST_METHOD']);
// echo "</pre>";

 //arreglo con mensajes de errores
$errores = [];

$title = "";
$description = "";

//ejecutar e, codigo despues de que el usuario envia el formulario 
if($_SERVER['REQUEST_METHOD'] === 'POST'){
     

    $title = $_POST['Title'];
    $description = $_POST['description'];

    if(!$title){
         $errores[] = "Debes añadir un titulo"; 
    }
    if($description){
        if(strlen($description)<50){
            $errores[] = "Debes añadir una descripcion de mas de 50 carcteres"; 
        }
    }else{
        $errores[] = "Debes añadir una descripcion";
    }
    
    // echo "<pre>";
    // var_dump($errores );
    // echo "</pre>";

    //revisar que el arreglo este vacio
    if(empty($errores)){
        // $query = "INSERT INTO about (Title, Description, admin_idadmin) VALUES ('$title', '$description', '0')";
        // $resultado = mysqli_query($db, $query);
    }

    

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
                    <?php foreach($errores as $error): ?>
                        <div class="alert">
                            <div class="errorAlert">
                                <?php echo $error; ?>
                            </div>
                        </div>
                        
                    <?php endforeach;?>
                    <form action="/admin/properties/aboutAdminCrud/create.php" class="formulario" method="POST">
                        <fieldset>
                            <legend>Informacion General</legend>
                            <label for="Title">Title</label>
                            <input type="text" id="Title" placeholder="Title" name="Title" value="<?php echo $title ?>">
                            <label for="description">Description</label>
                            <textarea id="description" placeholder="Description" name="description"><?php echo $description ?></textarea>
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