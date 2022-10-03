<?php

//*validar id 
$id = $_GET["id"];
$id = filter_var($id, FILTER_VALIDATE_INT); 

if(!$id){
    header('Location: /admin/indexAdmin.php');
}

require '../../../includes/config/database.php';
$db = conectarDB();

$query1 = "SELECT * FROM register";
$result1 = mysqli_query($db, $query1);

//*obtener los datos de la BD
$query = "SELECT * FROM discography WHERE iddiscography = $id";

$result = mysqli_query($db, $query);
$property = mysqli_fetch_assoc($result);
// var_dump("------------------------".$property['Image']);

$errores = [];
// echo "<pre>";
// var_dump($_POST);
// echo "</pre>";
$title = $property['Title'];
$image = $property['Image'];
$singleAlbum = $property['SingleAlbum'];
$date = date("Y/m/d");
$ytlink = $property['YtLink'];
$spotifylink = $property['SpotifyLink'];
$lyric = $property['Lyric'];
$explain = $property['Explain'];
$admin = $property['admin_idadmin'];


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
    $admin = mysqli_real_escape_string($db, $_POST['admin']);

    if (!$title) {
        $errores[] = "Debes añadir un titulo";
    }
    //validar imagen por tamaño
    $size = 1000*1000;
    if($image['size']> $size){
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
    if (!$admin) {
        $errores[] = "Debes seleccionar un administrador";
    }
    if (empty($errores)) {

        //crear carpeta 
        //*editado
        $imageFolder = '../../../images/';
        if(!is_dir($imageFolder)){
            mkdir($imageFolder);
        }
        $imageName="";
         
        if($image['name']){
            //eliminar imagen
             unlink($imageFolder. $property["Image"]);  
             // //generar un nombre unico
            $imageName = md5(uniqid(rand(),true)). ".jpg";
            //var_dump($imageName);
            //subir la imagen
            move_uploaded_file($image['tmp_name'], $imageFolder . $imageName );
        }else{
            $imageName = $property["Image"];
        }
        //generamos un nombre al archivo
                
        // $query = "INSERT INTO discography (`Title`, `Image`, `SingleAlbum`, `Date`, `YtLink`, `SpotifyLink`, `Lyric`, `Explain`, `admin_idadmin`) 
        //             VALUES ('$title','$imageName', '$singleAlbum', '$date', '$ytlink', '$spotifylink', '$lyric', '$explain', '$admin')";

        $query = "UPDATE discography SET `Title` = '${title}', `Image` = '${imageName}', `SingleAlbum` = '${singleAlbum}', `Date` = ${date}, `YtLink` = '${ytlink}', 
        `SpotifyLink` = '${spotifylink}', `Lyric` = '${lyric}', `Explain` = '${explain}', `admin_idadmin` = $admin WHERE `iddiscography` = $id";
        echo $query;
        // exit;
        $result = mysqli_query($db, $query);
        
        if($result){
            //redireeccionar
            header("Location:/admin/properties/discAdmin.php?resultado=2");
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
                    <h2>Discography Update</h2>
                </div>
                <div class="form-create">
                    <?php foreach ($errores as $error) : ?>
                        <div class="alert">
                            <div class="errorAlert">
                                <?php echo $error; ?>
                            </div>
                        </div>

                    <?php endforeach; ?>
                    <form class="formulario" method="POST" enctype="multipart/form-data">
                        <fieldset>
                            <legend>General Information</legend>
                            <label for="Title">Title</label>
                            <input type="text" id="Title" placeholder="Title" name="title"  value="<?php echo $title ?>">
                            <label for="image">Image</label>
                            <input type="file" id="image" accept="image/jpeg, image/png " name="image">
                            <img src="/images/<?php echo $image ?>" class="image-small">
                            <label for="option">Select a Option</label>
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
                        </fieldset>
                        <fieldset>
                            <legend>Admin</legend>
                            <select name="admin">
                                <option value="">-- SELECT --</option>
                                <?php while($row = mysqli_fetch_assoc($result1)): ?>
                                    <option <?php echo $admin === $row['idRegister'] ? 'selected' : ''; ?> value="<?php echo $row["idRegister"] ?>"><?php echo $row["UserName"] ?></option>
                                <?php endwhile; ?>
                            </select>
                        </fieldset>
                        <input type="submit" value="Actualizar Propiedad" class="button_accept">
                    </form>
                </div>
            </div>
            <div class="button-cont">
                <a href="/admin/properties/discAdmin.php" class="button"><span class="button_top"> Back</span></a>
            </div>
        </div>
    </div>
</div>
<?php incluirTemplate('nav'); ?>
<?php incluirTemplate('footer'); ?>