<?php
require '../../../includes/funciones.php';

incluirTemplate('circleMenu');

?>
<div class="container">
    <div id="about" class="crud">
        <div class="content-crud merchAdmin">
            <div class="crud-content-text">
                <div class="title-crud">
                    <h2>Merch Create</h2>
                </div>
                <div class="form-create">
                    <form action="" class="formulario ">
                        <fieldset>
                            <legend>General Information</legend>
                            <label for="Title">Title</label>
                            <input type="text" id="Title" placeholder="Title">
                            <label for="image">Image</label>
                            <input type="file" id="image" accept="image/jpeg, image/png ">
                            <label for="price">Price</label>
                            <input type="text" id="price" placeholder="Price">
                        </fieldset>
                        <fieldset>
                            <legend>Specific Information</legend>
                            <label for="color">Colors</label>
                            <input type="text" id="color" placeholder="Color">
                            <label for="size">Sizes</label>
                            <div class="radio">
                                <input type="radio" id="s"  value="s">
                                <label for="s">S</label>
                            </div>
                            <div class="radio">
                                <input type="radio" id="m"  value="m">
                                <label for="m">M</label>
                            </div>
                            <div class="radio">
                                <input type="radio" id="l"  value="l">
                                <label for="l">L</label>
                            </div>
                            <div class="radio">
                                <input type="radio" id="xl"  value="xl">
                                <label for="xl">XL</label>
                            </div>
                        </fieldset>

                    </form>
                </div>
            </div>
            <div class="button-cont">
                <a href="/admin/properties/merchAdmin.php" class="button"><span class="button_top"> Back</span></a>
            </div>
        </div>
    </div>
</div>
<?php incluirTemplate('nav'); ?>
<?php incluirTemplate('footer'); ?>