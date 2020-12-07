<html>
<head>
    <title>PHP Test</title>
</head>
<body>
<?php
echo '<p>Uncomment Code to see more</p>';

require_once __DIR__ . '/vendor/autoload.php';
 \Cloudinary::config(array(
    'cloud_name' => 'CLOUD_NAME',
    'api_key' => 'API_KEY',
   'api_secret' => 'API_SECRET'
));

 // Upload API
//$upload = new \Cloudinary\Uploader();
//echo '<pre>';
//print_r($upload->upload("https://cloudinary-training.github.io/cld-php-migration/images/cloudinary_icon_blue.png",
//['public_id'=>'cloudinary_icon_blue']));
//echo '</pre>';


// Admin API
//$api = new \Cloudinary\Api();
//echo '<pre>';
//print_r($api->resources());
//echo '</pre>';
//
//$url =  cloudinary_url(
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
//                "effect"  => "brightness:200",
//            ],
//            ["angle" => 10],
//        ],
//    ]
//);
//echo $url;

//$image = cl_image_tag(
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
//                "effect"  => "brightness:200",
//            ],
//            ["angle" => 10],
//        ],
//    ]
//);

//echo '<pre>';
//echo $image;
//echo '</pre>';

?>
</body>
</html>
