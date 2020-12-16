<html lang="HTML5">
<head>
    <title>PHP Test</title>
</head>
<body>
<?php
echo '<h1>Cloudinary SDK V2</h1>';

require_once __DIR__ . '/vendor/autoload.php';

use Cloudinary\Api\Admin\AdminApi;
use Cloudinary\Api\Upload\UploadApi;
use Cloudinary\Asset\Media;
use Cloudinary\Configuration\Configuration;
use Cloudinary\Tag\ImageTag;

//Configuration::instance(
//    [
//        'account' => [
//            'cloud_name' => 'CLOUD_NAME',
//            'api_key'    => 'API_KEY',
//            'api_secret' => 'API_SECRET',
//        ],
//    ]
//);
echo Configuration::instance()->account->cloudName;

// Upload API
echo '<h2>Upload API</h2>';
$upload = new UploadApi();
//
echo '<pre>';
echo json_encode(
    $upload->upload('https://cloudinary-training.github.io/cld-php-migration/images/cloudinary_icon_blue.png'),
    JSON_PRETTY_PRINT
);
echo '</pre>';

// Admin api
echo '<h2>Admin API</h2>';
$api = new AdminApi();

echo '<pre>';
echo json_encode($api->resources(['max_results' => 1]), JSON_PRETTY_PRINT) . "\n";
echo '</pre>';

echo '<h2>Cloudinary URL</h2>';
$url = Media::fromParams(
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
                "opacity" => 60,
                "effect"  => "brightness:200",
            ],
            ["angle" => 10],
        ],
    ]
);
echo $url;

/**
 * @var ImageTag $image
 */
$image = ImageTag::fromParams(
    'sample',
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
                "opacity" => 60,
                "effect"  => "brightness:200",
            ],
            ["angle" => 10],
        ],
    ]
);

echo '<h2>Cloudinary Image</h2>';
echo $image;
echo '<br>';

// v2 transformation example
echo '<h2>Sneak Peak</h2>';
echo $image->scale(100);

?>
</body>
</html>
