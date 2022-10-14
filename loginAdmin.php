<?php
require 'includes/config/database.php';
$db = conectarDB();

$errores = [];

$Email = "";
$Password = "";

//ejecutar e, codigo despues de que el usuario envia el formulario 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $Email = mysqli_real_escape_string($db, filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL));
    $Password = mysqli_real_escape_string($db, $_POST['password']);

    if (!$Email) {
        $errores[] = "Debes añadir un correo";
    }

    if (!$Password) {
        $errores[] = "Debes añadir una contraseña";
    }
    if (empty($errores)) {
        //revisar si el usuario existe
        $query = "SELECT * FROM admin WHERE Email = '${Email}'";
        $result = mysqli_query($db, $query);
        //var_dump($result);
        //entramos dentro del objeto result para ver cuantas rows hay del query que pusimos  
        if($result ->num_rows){
            //revisar si el password es correcto
            $user = mysqli_fetch_assoc($result);
            
            //verificar si el password es correcto o no
            $auth = password_verify($Password,$user['Password']);
            if($auth){
                //el usuario esta autenticado
                session_start();
                //llenar el arreglo de la sesion
                $_SESSION['user'] = $user['UserName'];
                $_SESSION['login'] = True;
                header('Location:admin/indexAdmin.php');
            }else{
                $errores[] = "El password es incorrecto ";
            }
        }else{
            $errores[] = "usuario no existe";
        }
        
        
    }
}


// $query = "INSERT INTO admin ( UserName, Email, Password, Register_idRegister) 
//                 VALUES ('$UserName', '$Email', '$Password', 'idRegister')";
// //$resultado = mysqli_query($db, $query);
// var_dump($query);

require 'includes/funciones.php';

incluirTemplate('circleMenu');

?>
<div class="container">
    <div id="about" class="crud">
        <div class="content-crud userAdmin">
            <div class="crud-content-text">
                <div class="title-crud">
                    <h2>Login</h2>
                </div>
                <div class="form-create">
                    <?php foreach ($errores as $error) : ?>
                        <div class="alert">
                            <div class="errorAlert">
                                <?php echo $error; ?>
                            </div>
                        </div>

                    <?php endforeach; ?>
                    <form method="POST" class="formulario" >
                        <fieldset>
                            <legend>Email y Password</legend>

                            <label for="email">Email</label>
                            <input  type="email" name="email" placeholder="Tu Email" id="email" value="<?php $Email ?>" required>

                            <label for="password">Password</label>
                            <input type="password" name="password" placeholder="Tu Password" id="password" value="<?php $Password ?>" required>
                        </fieldset>

                        <input type="submit" value="Login" class="button_accept">
                        <!-- <a href="/register.php" class="button_accept">registro</a> -->
                    </form>
                </div>
            </div>
            <div class="button-cont">
                <a href="index.php" class="button"><span class="button_top">Back</span></a>
            </div>
        </div>
    </div>
</div>
<?php incluirTemplate('nav'); ?>
<?php incluirTemplate('footer'); ?>