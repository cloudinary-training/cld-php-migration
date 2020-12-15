<html>
<head>
    <title>PHP Test</title>
</head>
<body>
<?php
echo '<p>SDK2: Uncomment Code to see more</p>';

require_once __DIR__ . '/vendor/autoload.php';

use Cloudinary\Asset\Media;
use Cloudinary\Configuration\Configuration;
use Cloudinary\Api\Upload\UploadApi;
use Cloudinary\Api\Admin\AdminApi;


Configuration::instance(['account' => ['cloud_name' => 'dec-2020-test', 'api_key' => '552265519859882', 'api_secret' => 'zrs73txUXMnsO93hWxeiRWpTOFw']]);
echo Configuration::instance()->account->cloudName;

// Upload API
$upload = new UploadApi();
//
echo '<pre>';
echo json_encode($upload->upload('https://cloudinary-training.github.io/cld-php-migration/images/cloudinary_icon_blue.png'),JSON_PRETTY_PRINT);
echo '</pre>';

// Admin api
$api = new AdminApi();

echo '<pre>';
echo json_encode($api->resource('sample'),JSON_PRETTY_PRINT);
echo '</pre>';


$url = Media::fromParams(
    "sample",
    [
        "secure" => true,
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

use Cloudinary\Tag\ImageTag;
/**
 * @var ImageTag $image
 */
$image = ImageTag::fromParams('sample',[
    "secure" => true,
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
    ]
]);

echo $image;
echo '<br>';

// v2 transformation example
echo $image->scale(100);

?>
</body>
</html>
