<html>
<head>
    <title>PHP Test</title>
</head>
<body>
<?php
echo '<p>Hello World</p>';

require_once __DIR__ . '/vendor/autoload.php';

use \Cloudinary\Configuration\Configuration;


Configuration::instance(['account' => ['cloud_name' => 'CLOUD_NAME', 'api_key' => 'API_KEY', 'api_secret' => 'API_SECRET']]);

// do an upload
//use Cloudinary\Api\Upload\UploadApi;
//$upload = new UploadApi();
//
//echo '<pre>';
//echo json_encode($upload->upload('https://cloudinary-training.github.io/cld-advanced-concepts/assets/images/dolphin.jpg'),JSON_PRETTY_PRINT);
//echo '</pre>';

// admin api
//use Cloudinary\Api\Admin\AdminApi;
//$api = new AdminApi();

//echo '<pre>';
//echo json_encode($api->resource('sample'),JSON_PRETTY_PRINT);
//echo '</pre>';

//echo cl_image_tag(''
//    "sample",
//    [
//        "secure" => true,
//        "transformation" => [
//            ["width" => 150, "height" => 150, "gravity" => "face", "crop" => "thumb"],
//            ["radius" => 20],
//            ["effect" => "sepia"],
//            [
//                "overlay" => "cloudinary_icon_blue",
//                "gravity" => "south_east",
//                "x"       => 5,
//                "y"       => 5,
//                "width"   => 50,
//                "opacity" => 60,
//                "effect"  => "brightness:200",
//            ],
//            ["angle" => 10],
//        ],
//    ]
//);

//use Cloudinary\Asset\Media;
//$url = Media::fromParams(
//    "sample",
//    [
//        "secure" => true,
//        "transformation" => [
//            ["width" => 150, "height" => 150, "gravity" => "face", "crop" => "thumb"],
//            ["radius" => 20],
//            ["effect" => "sepia"],
//            [
//                "overlay" => "cloudinary_icon_blue",
//                "gravity" => "south_east",
//                "x"       => 5,
//                "y"       => 5,
//                "width"   => 50,
//                "opacity" => 60,
//                "effect"  => "brightness:200",
//            ],
//            ["angle" => 10],
//        ],
//    ]
//);
//echo $url;

use Cloudinary\Tag\ImageTag;
//
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


// v2 transformation example
$image->scale(100);
echo $image;

?>
</body>
</html>
