<html lang="HTML5">

<head>
  <title>PHP Test V2 Syntax</title>
  <style>
        body {
            background-color: honeydew;
            color: black;
        }
    </style>
</head>

<body>
  <?php
  echo '<h1>Cloudinary V2 Syntax</h1>';

  require_once __DIR__ . '/vendor/autoload.php';


  // libraries to demo V2 Syntax
  // used to demo new syntax but not required for migration

  use Cloudinary\Cloudinary;
  use Cloudinary\Transformation\Resize;
  use Cloudinary\Transformation\RoundCorners;
  use Cloudinary\Transformation\Adjust;
  use Cloudinary\Transformation\Effect;
  use Cloudinary\Transformation\Overlay;
  use Cloudinary\Transformation\Gravity;
  use Cloudinary\Transformation\ImageTransformation;
  use Cloudinary\Transformation\Delivery;
  use Cloudinary\Transformation\Format;
  use Cloudinary\Transformation\Compass;
  use Cloudinary\Transformation\Source;
  use Cloudinary\Transformation\Position;
  use Cloudinary\Transformation\Quality;
  use Cloudinary\Transformation\Rotate;

  // v2 syntax produces a different looking URL
  echo '<h2>Cloudinary V2 Syntax URL</h2>';
  // Cloudinary constructor

  $cloudinary = new Cloudinary();
  echo $cloudinary->configuration->cloud->cloudName  . "\n";


  $url =  $cloudinary->image('sample')
    ->resize(Resize::thumbnail()->width(150)->height(150)->gravity(Gravity::autoGravity()))
    ->effect(Effect::sepia()->level(80))
    ->roundCorners(RoundCorners::byRadius(20))
    ->adjust(Adjust::opacity(60))
    ->overlay(
      Overlay::source(Source::image('cloudinary_icon_blue')
        ->transformation((new ImageTransformation())
          ->resize(Resize::scale()->width(50))
          ->adjust(Adjust::opacity(80))))
        ->position((new Position())
          ->gravity(Gravity::compass(Compass::southEast()))
          ->offsetX(5)->offsetY(5))
    )
    ->rotate(Rotate::byAngle(10))
    ->delivery(Delivery::format(Format::auto()))
    ->delivery(Delivery::quality(Quality::auto()));

  echo '<h3> URL </h3>';
  echo $url;

  $imageTag =  $cloudinary->imageTag('sample')
    ->resize(Resize::thumbnail()->width(150)->height(150)->gravity(Gravity::autoGravity()))
    ->effect(Effect::sepia()->level(80))
    ->roundCorners(RoundCorners::byRadius(20))
    ->adjust(Adjust::opacity(60))
    ->overlay(
      Overlay::source(Source::image('cloudinary_icon_blue')
        ->transformation((new ImageTransformation())
          ->resize(Resize::scale()->width(50))
          ->adjust(Adjust::opacity(80))))
        ->position((new Position())
          ->gravity(Gravity::compass(Compass::southEast()))
          ->offsetX(5)->offsetY(5))
    )
    ->rotate(Rotate::byAngle(10))
    ->delivery(Delivery::format(Format::auto()))
    ->delivery(Delivery::quality(Quality::auto()));

  echo '<h3>image</h3>';
  echo $imageTag;

  
  ?>
</body>

</html>