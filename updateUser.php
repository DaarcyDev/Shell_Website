<?php
require 'includes/funciones.php';

require 'includes/config/database.php';
$id = $_GET["idUser"];
$id = filter_var($id, FILTER_VALIDATE_INT); 

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


    $FirstName = mysqli_real_escape_string($db, $_POST['FirstName']);
    $LastName = mysqli_real_escape_string($db, $_POST['LastName']);
    $BirthDate = mysqli_real_escape_string($db, $_POST['BirthDate']);
    $Password = mysqli_real_escape_string($db, $_POST['Password']);
    $PasswordHash =  password_hash($Password, PASSWORD_DEFAULT);

    // $query = "SELECT * FROM register WHERE Email = '$Email' OR UserName = '${UserName}'";
    // $result = mysqli_query($db, $query);
    // //verificamos si el user exite con un condicional
    // // var_dump($result);
    // if ($result->num_rows) {
    //     // mysql_num_rows <- esta funcion me imprime el numero de registro que encontro 
    //     // si el numero es igual a 0 es porque el registro no exite, en otras palabras ese user no esta en la tabla miembro por lo tanto se puede registrar
    //     $errores[] = "El Email o UserName ya fue registrado ";
    // } 



    if (!$FirstName) {
        $errores[] = "Debes añadir tu nombre";
    }

    if (!$LastName) {
        $errores[] = "Debes añadir tu apellido";
    }

    if (!$BirthDate) {
        $errores[] = "Debes añadir un fecha de nacimeinto";
    }


    if (!$Password) {
        $errores[] = "Debes añadir una contraseña";
    }
    if (empty($errores)) {
        $query = "SELECT * FROM register WHERE idregister = $id";
        $result = mysqli_query($db, $query);
        //entramos dentro del objeto result para ver cuantas rows hay del query que pusimos  
        if ($result->num_rows) {
            //revisar si el password es correcto
            $user = mysqli_fetch_assoc($result);
            //var_dump($user);
            //verificar si el password es correcto o no
            // $auth = password_verify($Password,$user['Password']);
            // var_dump( $auth);
            // exit;
            //echo $PasswordHash , $user['Password'];
            echo $Password, $user['Password'];
            if ($Password == $user['Password']) {
                $query = "UPDATE register SET  `FirstName` = '${FirstName}', `LastName` = '${LastName}', `BirthDate` = '${BirthDate}' WHERE `idregister` = $id";
                $result = mysqli_query($db, $query);

                //echo $query;
                if ($result) {
                    //redireeccionar
                    header("Location:/admin/properties/usersAdmin.php?resultado=2");
                }
            }
        }
        if ($Password != $user['Password']) {
            $query = "UPDATE register SET  `FirstName` = '${FirstName}', `LastName` = '${LastName}', `BirthDate` = '${BirthDate}', `Password` = '${PasswordHash}' WHERE `idregister` = $id";
            echo $query;
            $result = mysqli_query($db, $query);

            //echo $query;
            if ($result) {
                //redireeccionar
                header("Location:/admin/properties/usersAdmin.php?resultado=2");
            }
        }
        
    }
}

incluirTemplate('circleMenu');
?>
<div class="container">
    <div id="about" class="crud">
        <div class="content-crud userAdmin">
            <div class="crud-content-text">
                <div class="title-crud">
                    <h2>Update User</h2>
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
                            <input value="<?php echo $UserName ?>" disabled>

                            <label for="FirstName">First Name</label>
                            <input type="text" id="FirstName" name="FirstName" placeholder="First Name" value="<?php echo $FirstName ?>">

                            <label for="LastName">LastName</label>
                            <input type="text" id="LastName" name="LastName" placeholder="Last Name" value="<?php echo $LastName ?>">

                            <label for="BirthDate">Birth Date</label>
                            <input type="date" id="BirthDate" name="BirthDate" placeholder="Birth Date" value="<?php echo $BirthDate ?>">

                            <label for="email">Email</label>
                            <input  value="<?php echo $Email ?>" disabled>

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