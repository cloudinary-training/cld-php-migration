<html lang="HTML5">
<head>
    <title>PHP Test</title>
</head>
<body>
<?php
echo '<h1>Cloudinary SDK V1</h1>';

require_once __DIR__ . '/vendor/autoload.php';

use Cloudinary\Api;
use Cloudinary\Uploader;

//Cloudinary::config(
//    [
//        'cloud_name' => 'CLOUD_NAME',
//        'api_key'    => 'API_KEY',
//        'api_secret' => 'API_SECRET',
//    ]
//);
echo Cloudinary::config()["cloud_name"];

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


// Admin API Response
echo '<h2>Admin API Response</h2>';
$api = new Api();

echo '<pre>';
echo json_encode($api->resources(["max_results" => 1]), JSON_PRETTY_PRINT);
echo '</pre>';

echo '<h2>Cloudinary URL</h2>';
$url = cloudinary_url(
    "sample",
    [
        "secure"         => true,
        "transformation" => [
            ["width" => 150, "height" => 150, "gravity" => "face", "crop" => "thumb"],
            ["radius" => 20],
            ["effect" => "sepia"],
            [
                "overlay" => "cloudinary_icon_blue",
                "gravity" => "south_east",
                "x"       => 5,
                "y"       => 5,
                "width"   => 50,
                "effect"  => "brightness:200",
            ],
            ["angle" => 10],
        ],
    ]
);
echo '<h2>Cloudinary URL</h2>';
echo $url;
echo '<br>';

$image = cl_image_tag(
    "sample",
    [
        "secure"         => true,
        "transformation" => [
            ["width" => 150, "height" => 150, "gravity" => "face", "crop" => "thumb"],
            ["radius" => 20],
            ["effect" => "sepia"],
            [
                "overlay" => "cloudinary_icon_blue",
                "gravity" => "south_east",
                "x"       => 5,
                "y"       => 5,
                "width"   => 50,
                "effect"  => "brightness:200",
            ],
            ["angle" => 10],
        ],
    ]
);

echo '<h2>Cloudinary Image</h2>';
echo $image;

?>
</body>
</html>
