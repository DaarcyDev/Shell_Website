<?php
require 'includes/config/database.php';
$db = conectarDB();



require 'includes/funciones.php';

incluirTemplate('circleMenu');

// echo "<pre>";
// var_dump($_SERVER['REQUEST_METHOD']);
// echo "</pre>";

//arreglo con mensajes de errores
$errores = [];

$UserName = "";
$FirstName = "";
$LastName = "";
$BirthDate = "";
$Email = "";
$Password = "";

//ejecutar e, codigo despues de que el usuario envia el formulario 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $UserName = $_POST['UserName'];
    $FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName'];
    $BirthDate = $_POST['BirthDate'];
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];
    $PasswordHash =  password_hash($Password, PASSWORD_DEFAULT);

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
        $query = "INSERT INTO register ( UserName, FirstName, LastName, BirthDate, Email, Password) 
                VALUES ('$UserName', '$FirstName', '$LastName', '$BirthDate', '$Email', '$PasswordHash')";
        $result = mysqli_query($db, $query);
        //echo $query;
        if($result){
            //redireeccionar
            header("Location:/#contact");
        }
    }
}

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
                    <form action="/register.php" class="formulario " method="POST">
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
                        
                        <input type="submit" value="Create" class="button_accept">
                    </form>
                </div>
            </div>
            <div class="button-cont">
                <a href="/#contact" class="button"><span class="button_top">Back</span></a>
            </div>
        </div>
    </div>
</div>
<?php incluirTemplate('nav'); ?>
<?php incluirTemplate('footer'); ?>