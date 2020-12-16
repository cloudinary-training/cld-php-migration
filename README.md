# Cloudinary PHP V2 Migration

## Introduction 

The most significant changes in the Cloudinary PHP V2 SDK are related to creating transformations.  This migration tutorial is provided to help you see how to upgrade without having to make a lot of changes to your existing transformation code.

We’ll start with a baseline web page `index_v1.php`. We’ll execute composer commands to upgrade from V1 to V2. Then we’ll demonstrate the V2 code that will produce the same results as V1 with minimal changes in index_v2.php.

Here’s a mapping of V1 code to V2

| V1  | V2 |
| ------------- | ------------- |
| Cloudinary::config  |Cloudinary\Configuration\Configuration or Configuration::instance|
|\Cloudinary\Uploader::upload()  |(new Cloudinary\Api\Upload\UploadApi())->upload() |
|(new \Cloudinary\Api())->resources() |(new Cloudinary\Api\Admin\AdminApi())->resources()|
|cloudinary_url | Cloudinary\Asset\Media::fromParams()|
|cl_image_tag |Cloudinary\Tag\ImageTag::fromParams() |
|cl_video_tag |Cloudinary\Tag\VideoTag::fromParams() |
|cl_video_thumbnail |Cloudinary\Tag\VideoThumbnail::fromParams()|


You can take the course *Intro to Cloudinary Using PHP V2 SDK* through Cloudinary Training where you'll learn more about the new transformation syntax.  The transformation syntax changes introduce Object Oriented classes that *enhance discoverability in your IDE*.  The syntax also provides *Method Chaining* based on [Fluent Interface Concepts](https://en.wikipedia.org/wiki/Fluent_interface). 

In this video we'll walk you through the upgrade process starting with an V1 PHP web page and ending with an V2 php webpage. During this process we'll look at sample code for using the upload and admin APIs. We’ll also look at creating transformations static *instance* and `fromParams` methods which will allow us use the V1 arrays to create transformations which will make migration to V1 easier.


## Configuration

The Cloudinary PHP V2 provides 2 different methods for supply credentials and instantiate Cloudinary:
1. A **constructor** function will allow for the creation of multiple instances of Cloudinary which enables the developer to access multiple clouds 
within a single script.
2. A static **instance** function will allow for the creation of a single instance of Cloudinary.

For the purposes of migration, we will be using the static **instance** function to demonstrate V2 code.  

The goal of this migration guide is to simplify migration. Therefore, we'll be demonstrating simple techniques for modifying existing V1 code to make it V2 compliant.  Cloudinary provides a full training course that looks deeper into V2 syntax. 


## Course File Contents
The files that we'll be focusing on in this migration exercise are:

1. *index-v1.php*  
This is a php web page that relies on V1 syntax. Before we upgrade, we'll review the code
 offered in V1 that we'll be modifying as part of the migration.
2. *composer.json*    
We'll start with a reference to a V1 Cloudinary package.  We'll uninstall it and install the 
V1 Cloudinary package to begin migration. For demonstration purposes, there is a `composer-v1.json` file and a `composer-v2.json` file.  If you example them, you'll see that the only difference is the Cloudinary package.  

![V1 composer vs V2 composer](./images/composer-diff.jpg)
As of this writing, we are in Beta and the only difference between the composer.json files is the Cloudinary
package version: `"cloudinary/cloudinary_php": "*"` vs. `cloudinary/cloudinary_php": ">2.0.0-beta"`.
3. *index-v2.php*    
This is a php page containing the same functionality as *index-v1.php* and will allow use the 
same functionality in V2 as V1 with just a few code changes.  These changes constitute what  
a developer would need to execute in order to migrate code from V1 to V2.  

We can move forward and backward by just uninstalling Cloudinary and the Reinstalling which ever version we want to work with.
<p align="center">
<img src="images/migration.jpg" alt="Move between V1 and V2" width="800" >
</p>

## Running V1 Code as a Baseline 

Before migrating to V2 and looking at the syntax, we can note that the composer.json supplied with this 
repo is set up for V1.  Let's execute code from V1 as a baseline.

To install the PHP SDK execute the following:

```bash
composer install
```

With the V1 package installed, you should be able to run the `index-v1.php` web page and view in your browser.
This syntax and the functions used should look familiar to a Cloudinary PHP developer and are provided as a baseline for migrating the code.

1. Load dependencies.
```php
require_once __DIR__ . '/vendor/autoload.php';
```
2. Provide Cloudinary credentials.
```php
 \Cloudinary::config(array(
    'cloud_name' => 'CLOUD_NAME',
    'api_key' => 'API_KEY',
   'api_secret' => 'API_SECRET'
));
```
Or,  if you have your export CLOUDINARY_URL in a .env file you can just execute the export 

Contents of .env
```bash
export CLOUDINARY_URL=cloudinary://<api_key>:<api_secret>@<cloud_name>
```

```bash
. ./.env
```
Then, in your Php V2 code you can create the instance without supplying credentials.

```php
Configuration::instance();
```

3. Upload a Cloudinary Logo using the Upload API and view upload response on web page.
```php
$upload = new \Cloudinary\Uploader();
echo '<pre>';
print_r($upload->upload("https://cloudinary-training.github.io/cld-php-migration/images/cloudinary_icon_blue.png",
['public_id'=>'cloudinary_icon_blue']));
echo '</pre>';
```
4. Execute the resources function from the Admin API to view assets in the cloud on the web page.
```php
$api = new \Cloudinary\Api();
echo '<pre>';
print_r($api->resources());
echo '</pre>';
```
5. Generate a URL using the URL helper utility and render the URL string on the web page.
```php
$url =  cloudinary_url(
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
                "effect"  => "brightness:200",
            ],
            ["angle" => 10],
        ],
    ]
);
echo $url;
```
6. Generate an image tag using the image tag helper utility and render the image on the web page.
```php
$image = cl_image_tag(
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
                "effect"  => "brightness:200",
            ],
            ["angle" => 10],
        ],
    ]
);

echo '<pre>';
echo $image;
echo '</pre>';
```

## Migrate From V1 to V2

To upgrade from V1 to V2, remove Cloudinary and then install the 2.0 Beta.  The require
object will be empty after the `remove` command .  The object will contain a reference to Cloudinary 2.0 after the `require` command.

```bash
composer require "cloudinary/cloudinary_php:>2.0.0-beta"
composer update
```  

You can always return to V1 by executing the `remove` command and the requiring the V1 SDK version of Cloudinary.

```bash
composer require "cloudinary/cloudinary_php"
composer update
```

## Running V2 Code

We'll now execute V2 code to look at the different syntax for the same functionality as V1 SDK. This represents our successful code migration.

1. Load dependencies.
```php
require_once __DIR__ . '/vendor/autoload.php';
```
2. Provide Cloudinary credentials and set up instances of Cloudinary.
```php
use \Cloudinary\Configuration\Configuration;
Configuration::instance(['account' => ['cloud_name' => 'CLOUD_NAME', 'api_key' => 'API_KEY', 'api_secret' => 'API_SECRET']]);
```
3. Upload a Cloudinary Logo using the Upload API and view upload response on the web page.  The V2 is object oriented and name-spaced.  You will need to import classes with the `use` command.
```php
use Cloudinary\Api\Upload\UploadApi;
$upload = new UploadApi();
echo '<pre>';
echo json_encode($upload->upload('https://cloudinary-training.github.io/cld-php-migration/images/cloudinary_icon_blue.png'),JSON_PRETTY_PRINT);
echo '</pre>';
```
4. Execute the resources function from the Admin API to view assets in the cloud on the web page.
```php
use Cloudinary\Api\Admin\AdminApi;
$api = new AdminApi();
echo '<pre>';
echo json_encode($api->resource('sample'),JSON_PRETTY_PRINT);
echo '</pre>';
```
5. Generate a URL using the URL helper utility and render the URL string on the web page. The `Media.fromParams` command can be used to generate a URL when you are working with the Cloudinary **instance**.  A *find/replace* in your code will allow updates fromV1 to V2 by replacing `cloudinary_url` with `Media::fromParams`.  Then
you can leave your transformation code spec the same.  
```php
use Cloudinary\Asset\Media;
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
```
6. Generate an image tag using the image tag helper utility and render the image on the web page. You can replace `cl_image_tag` with `ImageTag::fromParams` to create an image tag in V2. In this case you would import the 
`Cloudinary\Tag\ImageTag`.
```php
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
```
7.  The PHP V2 functions return objects that also have functions. This makes it possible to chain your operations.  Chaining using V2 functions creates a natural flow when building transformations.  Because the code is Object Oriented, you IDE can help you with code completion.  You can take the output from a `fromParams` function and chain V2 code.  Once you've migrated, this is a good way to start incorporating new V2 syntax into existing code if you don't want to do a full rewrite, but want to start using V2 syntax.

In this example we chain a `resize` function call on to the result of the image generator above.

```php
$image->scale(100);
echo $image;
```


## Resources:

[Cloudinary source code](https://github.com/cloudinary/cloudinary_php/blob/2.0.0-beta)  
[Migration Guide](https://cloudinary.com/documentation/sdk2_migration)


