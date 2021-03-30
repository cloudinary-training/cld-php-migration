<?php

use Cloudinary\Configuration\Configuration;

Cloudinary::config(
 [
   "cloud" =>
   [
    'cloud_name' => 'CLOUD_NAME',
    'api_key'    => 'API_KEY',
    'api_secret' => 'API_SECRET'
   ]
 ]
);
