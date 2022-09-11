

<?php
require 'includes/funciones.php';

incluirTemplate('circleMenu');

?>
<div class="container">
    <div id="about" class="crud user">
        <div class="content-crud userAdmin">
            <div class="crud-content-text">
                <div class="title-crud">
                    <h2>Login</h2>
                </div>
                <div class="form-create">
                    <form method="POST" class="formulario" novalidate>
                        <fieldset>
                            <legend>Email y Password</legend>

                            <label for="email">E-mail</label>
                            <input required type="email" name="email" placeholder="Tu Email" id="email" value="<?php $correo ?>">

                            <label for="password">Password</label>
                            <input required type="password" name="password" placeholder="Tu Password" id="password">
                        </fieldset>

                        <input type="submit" value="Crear Propiedad"  class="button_accept">
                        <a href="/registro.php" class="button_accept">registro</a>
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