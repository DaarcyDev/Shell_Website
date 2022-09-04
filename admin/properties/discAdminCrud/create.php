<?php
require '../../../includes/funciones.php';

incluirTemplate('circleMenu');

?>
<div class="container">
    <div id="about" class="crud">
        <div class="content-crud discAdmin">
            <div class="crud-content-text">
                <div class="title-crud">
                    <h2>Discography Create</h2>
                </div>
                <div class="form-create">
                    <form action="" class="formulario ">
                        <fieldset>
                            <legend>General Information</legend>
                            <label for="Title">Title</label>
                            <input type="text" id="Title" placeholder="Title">
                            <label for="image">Image</label>
                            <input type="file" id="image" accept="image/jpeg, image/png ">
                            <div class="radio">
                                <input type="radio" id="single" name="option" value="single">
                                <label for="single">single</label>
                            </div>
                            <div class="radio">
                                <input type="radio" id="album" name="option" value="album">
                                <label for="album">album</label>
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend>Specific Information</legend>
                            <label for="date">Date</label>
                            <input type="date" id="date">
                            <label for="ytlink">Youtube Link</label>
                            <textarea id="ytlink" placeholder="Youtube Link"></textarea>
                            <label for="spotilink">Spotify Link</label>
                            <textarea id="spotilink" placeholder="Spotify Link"></textarea>
                            <label for="lyric">Lyric</label>
                            <textarea id="lyric" placeholder="Lyric"></textarea>
                            <label for="explain">Explain</label>
                            <textarea id="explain" placeholder="Explain"></textarea>
                            
                            
                        </fieldset>
                    </form>
                </div>
            </div>
            <div class="button-cont">
                <a href="/admin/properties//discAdmin.php" class="button"><span class="button_top"> Back</span></a>
            </div>
        </div>
    </div>
</div>
<?php incluirTemplate('nav'); ?>
<?php incluirTemplate('footer'); ?>