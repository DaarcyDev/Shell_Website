<?php
require '../../../includes/funciones.php';

incluirTemplate('circleMenu');

?>
<div class="container">
    <div id="about" class="crud">
        <div class="content-crud newsAdmin">
            <div class="crud-content-text">
                <div class="title-crud">
                    <h2>News Crear</h2>
                </div>
                <div class="form-create">
                    <form action="" class="formulario ">
                        <fieldset>
                            <legend>General Information</legend>
                            <label for="Title">Title</label>
                            <input type="text" id="Title" placeholder="Title">
                            <label for="image">Image</label>
                            <input type="file" id="image" accept="image/jpeg, image/png ">
                            <label for="description">Description</label>
                            <textarea id="description" placeholder="description"></textarea>
                            <label for="date">Date</label>
                            <input type="date" id="date" >
                            <label for="fire">Fire</label>
                            <input type="number" id="fire" placeholder="Fire">
                            <label for="messages">Number of Messages</label>
                            <input type="number" id="messages" placeholder="Number of Messages">
                            
                        </fieldset>
                        <fieldset>
                            <legend>Specific Information</legend>
                            <label for="descriptionComplete">Description Complete</label>
                            <textarea id="descriptionComplete" placeholder="Description Complete"></textarea>
                            
                            
                        </fieldset>
                    </form>
                </div>
            </div>
            <div class="button-cont">
                <a href="/admin/properties/newsAdmin.php" class="button"><span class="button_top"> Back</span></a>
            </div>
        </div>
    </div>
</div>
<?php incluirTemplate('nav'); ?>
<?php incluirTemplate('footer'); ?>