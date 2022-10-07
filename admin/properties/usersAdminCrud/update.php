<?php
$id = $_GET["id"];
$id = filter_var($id, FILTER_VALIDATE_INT); 

if(!$id){
    header('Location: /admin/indexAdmin.php');
}
require '../../../includes/config/database.php';

$db = conectarDB();

$query = "SELECT * FROM register WHERE idregister = $id";
$result = mysqli_query($db, $query);
$property = mysqli_fetch_assoc($result);
//arreglo con mensajes de errores
$errores = [];

$UserName = $property['UserName'];
$FirstName = $property['FirstName'];
$LastName = $property['LastName'];
$BirthDate = $property['BirthDate'];
$Email = $property['Email'];
$Password = $property['Password'];

//ejecutar e, codigo despues de que el usuario envia el formulario 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $UserName =mysqli_real_escape_string($db,  $_POST['UserName']);
    $FirstName = mysqli_real_escape_string($db, $_POST['FirstName']);
    $LastName = mysqli_real_escape_string($db, $_POST['LastName']);
    $BirthDate = mysqli_real_escape_string($db, $_POST['BirthDate']);
    $Email = mysqli_real_escape_string($db, $_POST['Email']);
    $Password = mysqli_real_escape_string($db, $_POST['Password']);

    if (!$UserName) {
        $errores[] = "Debes añadir un titulo";
    }

    if (!$FirstName) {
        $errores[] = "Debes añadir tu nombre";
    }

    if (!$LastName) {
        $errores[] = "Debes añadir tu apellido";
    }

    if (!$BirthDate) {
        $errores[] = "Debes añadir un fecha de nacimeinto";
    }

    if (!$Email) {
        $errores[] = "Debes añadir un correo";
    }

    if (!$Password) {
        $errores[] = "Debes añadir una contraseña";
    }
    if (empty($errores)) {
        $query = "UPDATE register SET `UserName` = '${UserName}', `FirstName` = '${FirstName}', `LastName` = '${LastName}', `BirthDate` = '${BirthDate}', `Email` = '${Email}', `Password` = '${Password}' WHERE `idregister` = $id";
        echo $query;
        $result = mysqli_query($db, $query);
        //echo $query;
        if($result){
            //redireeccionar
            header("Location:/admin/properties/usersAdmin.php?resultado=2");
        }
    }
}
require '../../../includes/funciones.php';

incluirTemplate('circleMenu');
?>
<div class="container">
    <div id="about" class="crud">
        <div class="content-crud userAdmin">
            <div class="crud-content-text">
                <div class="title-crud">
                    <h2>Register</h2>
                </div>
                <div class="form-create">
                    <?php foreach ($errores as $error) : ?>
                        <div class="alert">
                            <div class="errorAlert">
                                <?php echo $error; ?>
                            </div>
                        </div>

                    <?php endforeach; ?>
                    <form class="formulario " method="POST">
                        <fieldset>
                            <legend>General Information</legend>

                            <label for="UserName">UserName</label>
                            <input type="text" id="UserName" name="UserName" placeholder="User Name" value="<?php echo $UserName ?>">

                            <label for="FirstName">First Name</label>
                            <input type="text" id="FirstName" name="FirstName" placeholder="First Name" value="<?php echo $FirstName ?>">

                            <label for="LastName">LastName</label>
                            <input type="text" id="LastName" name="LastName" placeholder="Last Name" value="<?php echo $LastName ?>">

                            <label for="BirthDate">Birth Date</label>
                            <input type="date" id="BirthDate" name="BirthDate" placeholder="Birth Date" value="<?php echo $BirthDate ?>">

                            <label for="email">Email</label>
                            <input type="email" id="email" name="Email" placeholder="Email" value="<?php echo $Email ?>">

                            <label for="password">Password</label>
                            <input type="password" id="password" name="Password" placeholder="Password" value="<?php echo $Password ?>">
                        </fieldset>
                        
                        <input type="submit" value="Actualizar" class="button_accept">
                    </form>
                </div>
            </div>
            <div class="button-cont">
                <a href="/admin/properties/usersAdmin.php" class="button"><span class="button_top">Back</span></a>
            </div>
        </div>
    </div>
</div>
<?php incluirTemplate('nav'); ?>
<?php incluirTemplate('footer'); ?>