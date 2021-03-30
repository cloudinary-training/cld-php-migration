<html lang="HTML5">

<head>
    <title>PHP Test V2</title>
    <style>
        body {
            background-color: aliceblue;
            color: black;
        }
    </style>
</head>

<body>
    <?php
    echo '<h1>Cloudinary SDK V2</h1>';

    require_once __DIR__ . '/vendor/autoload.php';
    require_once __DIR__ . '/config-v2.php';

    use Cloudinary\Api\Admin\AdminApi;
    use Cloudinary\Api\Upload\UploadApi;
    use Cloudinary\Asset\Media;
    use Cloudinary\Configuration\Configuration;
    use Cloudinary\Tag\ImageTag;

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

  
    echo Configuration::instance()->cloud->cloudName;

    // Upload API
    echo '<h2>Upload API Response</h2>';
    $upload = new UploadApi();
    //
    echo '<pre>';
    echo json_encode(
        $upload->upload('https://cloudinary-training.github.io/cld-php-migration/images/cloudinary_icon_blue.png',
        ['public_id' => 'cloudinary_icon_blue']),
        JSON_PRETTY_PRINT
    );
    echo '</pre>';

    // Admin api
    echo '<h2>Admin API Response</h2>';
    $api = new AdminApi();

    echo '<pre>';
    echo json_encode($api->asset('cloudinary_icon_blue'), JSON_PRETTY_PRINT) . "\n";
    echo '</pre>';

    echo '<h2>Cloudinary URL</h2>';
    $url = Media::fromParams(
        "sample",
        [
            "secure"         => true,
            "transformation" => [
                [
                    "width" => 150,
                    "height" => 150,
                    "gravity" => "auto",
                    "crop" => "thumb",
                    "radius" => 20,
                    "effect" => "sepia:80",
                    "opacity" => 60
                ],
                [
                    "overlay" => "cloudinary_icon_blue",
                    "gravity" => "south_east",
                    "x"       => 5,
                    "y"       => 5,
                    "width"   => 50,
                    "opacity" => 80
                ],
                [
                    "angle" => 10,
                    "fetch_format" =>
                    "auto",
                    "quality" => "auto"
                ],
            ],
        ]
    );
  
    echo $url;

    echo '<h2>Cloudinary Image</h2>';
    $imageTag = ImageTag::fromParams(
        "sample",
        [
            "secure"         => true,
            "transformation" => [
                [
                    "width" => 150,
                    "height" => 150,
                    "gravity" => "auto",
                    "crop" => "thumb",
                    "radius" => 20,
                    "effect" => "sepia:80",
                    "opacity" => 60
                ],
                [
                    "overlay" => "cloudinary_icon_blue",
                    "gravity" => "south_east",
                    "x"       => 5,
                    "y"       => 5,
                    "width"   => 50,
                    "opacity" => 80
                ],
                [
                    "angle" => 10,
                    "fetch_format" =>
                    "auto",
                    "quality" => "auto"
                ],
            ],
        ]
    );

    echo '<pre>' . htmlspecialchars($imageTag) . '</pre>';
    echo $imageTag;
    echo '<br>';

    // v2 transformation example
    echo '<h2>Sneak Peak</h2>';
    echo $image->scale(100);
    echo '<br>';


    ?>
</body>

</html>