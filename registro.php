<?php
require 'includes/funciones.php';

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
                    <form action="" class="formulario ">
                        <fieldset>
                            <legend>General Information</legend>

                            <label for="UserName">UserName</label>
                            <input type="text" id="UserName" name="UserName" placeholder="User Name" value="<?php echo $segundoNombre; ?>">

                            <label for="FirstName">First Name</label>
                            <input type="text" id="FirstName" name="FirstName" placeholder="First Name" value="<?php echo $primerNombre; ?>">

                            <label for="LastName">LastName</label>
                            <input type="text" id="LastName" name="LastName" placeholder="Last Name" value="<?php echo $primerApellido; ?>">

                            <label for="BirthDate">Birth Date</label>
                            <input type="date" id="BirthDate" name="BirthDate" placeholder="Birth Date" value="<?php echo $fechaN; ?>">

                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" placeholder="Email" value="<?php echo $email; ?>">

                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" placeholder="Password" value="<?php echo $password; ?>">
                        </fieldset>
                        <input type="submit" value="Create" class="button_accept">
                    </form>
                </div>
            </div>
            <div class="button-cont">
                <a href="user.php" class="button"><span class="button_top">Back</span></a>
            </div>
        </div>
    </div>
</div>
<?php incluirTemplate('nav'); ?>
<?php incluirTemplate('footer'); ?>