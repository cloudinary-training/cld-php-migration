<html lang="HTML5">

<head>
    <title>PHP Test</title>
    <style>
    body{
        background-color:antiquewhite;
        color: black;
    }
    </style>
</head>

<body>
    <?php
    echo '<h1>Cloudinary SDK V1</h1>';

    require_once __DIR__ . '/vendor/autoload.php';
    require_once __DIR__ . '/config-v1.php';
    //verify cloud name
    echo Cloudinary::config()["cloud_name"];
   
    use Cloudinary\Api;
    use Cloudinary\Uploader;

    // Upload API
    echo '<h2>Upload API Response</h2>';
    echo '<pre>';
    print_r(
        Uploader::upload(
            "https://cloudinary-training.github.io/cld-php-migration/images/cloudinary_icon_blue.png",
            ['public_id' => 'cloudinary_icon_blue']
        )
    );
    echo '</pre>';


    // Admin API
    echo '<h2>Admin API Response </h2>';
    $api = new Api();
    echo '<pre>';
    echo json_encode($api->resource('cloudinary_icon_blue'), JSON_PRETTY_PRINT);
    echo '</pre>';


    $url = cloudinary_url(
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
    echo '<h2>Cloudinary URL</h2>';
    echo $url;
    echo '<br>';

    $imageTag = cl_image_tag(
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

    echo '<h2>Cloudinary Image</h2>';
    echo '<pre>' . htmlspecialchars($imageTag) . '</pre>';
    echo $imageTag;


    ?>
</body>

</html>