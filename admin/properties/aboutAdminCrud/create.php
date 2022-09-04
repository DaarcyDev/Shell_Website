<?php
require '../../../includes/funciones.php';

incluirTemplate('circleMenu');

?>
<div class="container">
    <div id="about" class="crud">
        <div class="content-crud aboutAdmin">
            <div class="crud-content-text">
                <div class="title-crud">
                    <h2>About Crear</h2>
                </div>
                <div class="form-create">
                    <form action="" class="formulario ">
                        <fieldset>
                            <legend>Informacion General</legend>
                            <label for="Title">Title</label>
                            <input type="text" id="Title" placeholder="Title">
                            <label for="description">Description</label>
                            <textarea id="description" placeholder="Description"></textarea>
                        </fieldset>
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