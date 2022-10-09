<?php
require '../../../includes/config/database.php';
$db = conectarDB();

$query1 = "SELECT * FROM admin";
$result1 = mysqli_query($db, $query1);

$errores = [];
// echo "<pre>";
// var_dump($_POST);
// echo "</pre>";
$title = "";
$image = "";
$singleAlbum = "";
$date = date("Y/m/d");
$ytlink = "";
$spotifylink = "";
$lyric = "";
$explain = "";
$streamLink = "";
$suportLink = "";
$admin = "";


//ejecutar e, codigo despues de que el usuario envia el formulario 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $title = mysqli_real_escape_string($db, $_POST['title']);
    $image =  $_FILES['image'];
    $singleAlbum = mysqli_real_escape_string($db, $_POST['option']);
    //$date = mysqli_real_escape_string($db, $_POST['date']);
    $ytlink = mysqli_real_escape_string($db, $_POST['ytlink']);
    $spotifylink = mysqli_real_escape_string($db, $_POST['spotifylink']);
    $lyric = mysqli_real_escape_string($db, $_POST['lyric']);
    $explain = mysqli_real_escape_string($db, $_POST['explain']);
    $streamLink = mysqli_real_escape_string($db, $_POST['streamLink']);
    $suportLink = mysqli_real_escape_string($db, $_POST['suportLink']);
    $admin = mysqli_real_escape_string($db, $_POST['admin']);

    if (!$title) {
        $errores[] = "Debes añadir un titulo";
    }
    if (!$image['name'] || $image['error']) {
        $errores[] = "Debes añadir una imagen";
    }
    //validar imagen por tamaño
    $size = 1000 * 1000;
    if ($image['size'] > $size) {
        $errores[] = "La imagen es muy pesada";
    }
    if (!$singleAlbum) {
        $errores[] = "Debes seleccionar una opcion";
    }
    if (!$ytlink) {
        $errores[] = "Debes añadir un enlace de Youtube";
    }
    if (!$spotifylink) {
        $errores[] = "Debes añadir un enlace de spotify";
    }
    if ($lyric) {
        if (strlen($lyric) < 50) {
            $errores[] = "Debes añadir una letra de mas de 50 caracteres";
        }
    } else {
        $errores[] = "Debes añadir la letra de la cancion";
    }
    if ($explain) {
        if (strlen($explain) < 50) {
            $errores[] = "Debes añadir una explicacion de mas de 50 carcteres";
        }
    } else {
        $errores[] = "Debes añadir una explicacion de la cancion";
    }
    if (!$streamLink) {
        $errores[] = "Debes añadir un enlace";
    }
    if (!$suportLink) {
        $errores[] = "Debes añadir un enlace";
    }
    if (!$admin) {
        $errores[] = "Debes seleccionar un administrador";
    }
    if (empty($errores)) {

        //crear carpeta 
        $imageFolder = "../../../images/";
        //is_dir se utiliza para comprobar si el archivo especificado es un directorio o no.
        if (!is_dir($imageFolder)) {
            //mkdir es para crear carpetas
            mkdir($imageFolder);
        }

        //generamos un nombre al archivo
        $imageName = md5(uniqid(rand(), true)) . ".jpg";

        //subir la imagen a la carpeta
        move_uploaded_file($image['tmp_name'], $imageFolder . $imageName);

        $query = "INSERT INTO discography (`Title`, `Image`, `SingleAlbum`, `Date`, `YtLink`, `SpotifyLink`, `Lyric`, `Explain`, `admin_idadmin`, `StreamLink`, `SuportLink`) 
                    VALUES ('$title','$imageName', '$singleAlbum', '$date', '$ytlink', '$spotifylink', '$lyric', '$explain', '$admin', '$streamLink', '$suportLink')";
        //echo $query;
        $result = mysqli_query($db, $query);

        if ($result) {
            //redireeccionar
            header("Location:/admin/properties/discAdmin.php");
        }
    }
}

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
                    <?php foreach ($errores as $error) : ?>
                        <div class="alert">
                            <div class="errorAlert">
                                <?php echo $error; ?>
                            </div>
                        </div>

                    <?php endforeach; ?>
                    <form action="/admin/properties/discAdminCrud/create.php" class="formulario" method="POST" enctype="multipart/form-data">
                        <fieldset>
                            <legend>General Information</legend>
                            <label for="Title">Title</label>
                            <input type="text" id="Title" placeholder="Title" name="title" value="<?php echo $title ?>">
                            <label for="image">Image</label>
                            <input type="file" id="image" accept="image/jpeg, image/png " name="image">
                            <label for="image">Select a Option</label>
                            <select name="option">
                                <option value="sigle">Single</option>
                                <option value="album">Album</option>
                            </select>
                        </fieldset>
                        <fieldset>
                            <legend>Specific Information</legend>
                            <label for="date">Date</label>
                            <input type="text" id="date" value="<?php echo $date; ?>" disabled>
                            <label for="ytlink">Youtube Link</label>
                            <textarea id="ytlink" placeholder="Youtube Link" name="ytlink"> <?php echo $ytlink ?></textarea>
                            <label for="spotilink">Spotify Link</label>
                            <textarea id="spotilink" placeholder="Spotify Link" name="spotifylink"> <?php echo $spotifylink ?></textarea>
                            <label for="lyric">Lyric</label>
                            <textarea id="lyric" placeholder="Lyric" name="lyric"><?php echo $lyric ?></textarea>
                            <label for="explain">Explain</label>
                            <textarea id="explain" placeholder="Explain" name="explain"><?php echo $explain ?></textarea>
                            <label for="Stream Link">Stream Link</label>
                            <input type="text" id="Stream Link" placeholder="Stream Link" name="streamLink"  value="<?php echo $streamLink ?>">
                            <label for="Suport Link">Suport Link</label>
                            <input type="text" id="Suport Link" placeholder="Suport Link" name="suportLink"  value="<?php echo $suportLink ?>">
                        </fieldset>
                        <fieldset>
                            <legend>Admin</legend>
                            <select name="admin">
                                <option value="">-- SELECT --</option>
                                <?php while ($row = mysqli_fetch_assoc($result1)) : ?>
                                    <option <?php echo $admin === $row['idadmin'] ? 'selected' : ''; ?> value="<?php echo $row["idadmin"] ?>"><?php echo $row["UserName"] ?></option>
                                <?php endwhile; ?>
                            </select>
                        </fieldset>
                        <input type="submit" value="Crear Propiedad" class="button_accept">
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