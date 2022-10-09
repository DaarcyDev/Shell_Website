<?php
$id = $_GET["id"];
$id = filter_var($id, FILTER_VALIDATE_INT); 

if(!$id){
    header('Location: /admin/indexAdmin.php');
}

require '../../../includes/config/database.php';
$db = conectarDB();

//*obtener los datos de la BD
$query = "SELECT * FROM discography WHERE iddiscography = $id";

$result = mysqli_query($db, $query);
$property = mysqli_fetch_assoc($result);


//$property["YtLink"];
$ytLink =  str_replace("iframe",'iframe class="youtube"',$property["YtLink"]);

$SpotifyLink =  str_replace("iframe",'iframe class="spotify"',$property["SpotifyLink"]);



require '../../../includes/funciones.php';

  incluirTemplate('circleMenu');

?>

<div class="container">


  <div id="discography" class="discography2_product">
    <div class="content-discography2_product">
      <div class="discography2_product-content-text">
        <div class="title-discography2_product">
          <h2>discography</h2>
        </div>
      </div>

      <div class="container-all">

        <div class="content-discography disc-info">
          <div class="content-info">
            <h2><?php echo $property['Title']; ?></h2>
            <h2>Sheru!</h2>
            <p>Release: <?php echo $property['Date']; ?></p>
            <p>
              <span>
                <a href="<?php echo $property['StreamLink']; ?>" target="_blank" rel="noopener">Stream the song</a>
              </span>
            </p>
            <p>
              Buy:
              <span">
                <a href="<?php echo $property['SuportLink']; ?>" target="_blank" rel="noopener">Support <?php echo $property['Title']; ?></a>
                </span>
            </p>
          </div>
          <div class="content-img">
            <img class="img-discography" src="/images/<?php echo $property['Image']; ?>" />
          </div>
        </div>
        <div class="content-discography">
          <div class="song">
            <h2>video</h2>
            <?php echo $ytLink; ?>
            <?php echo $SpotifyLink; ?>
            <div class="lyric">
              <h2>lyric</h2>
              <?php echo nl2br($property['Lyric']); ?>
            </div>
          </div>
          <div class="reason">
            <h2>Explain me the song!</h2>
            <div class="elementor-text-editor elementor-clearfix">
            <?php echo nl2br($property['Explain']); ?>
            </div>
          </div>

        </div>
        <?php incluirTemplate('download'); ?>
      </div>
      <div class="button-cont">
        <a href="/admin/properties/discAdmin.php" class="button"><span class="button_top"> Back</span></a>
      </div>
    </div>
  </div>

</div>
<?php incluirTemplate('nav'); ?>
<?php incluirTemplate('footer'); ?>