<html>
<head>
    <title>PHP Test</title>
</head>
<body>
<?php
echo '<p>Hello World</p>';

require_once __DIR__ . '/vendor/autoload.php';
\Cloudinary::config(array(
    'cloud_name' => 'dec-2020-test',
    'api_key' => '552265519859882',
    'api_secret' => 'zrs73txUXMnsO93hWxeiRWpTOFw'
));


echo cl_image_tag(
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
?>
</body>
</html>
