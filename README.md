# PHP SDK2 Migration

## Composer

```bash
composer install
```

## Migrate

Before

```
{
  "name": "cloudinary/cloudinary_php_v1_sample",
  "description": "Cloudinary PHP SDK Sample",
  "type": "project",
  "minimum-stability": "stable",
  "license": "MIT",
  "authors": [
    {
      "name": "Cloudinary",
      "homepage": "https://github.com/cloudinary/cloudinary_php/graphs/contributors"
    }
  ],
  "require": {
    "cloudinary/cloudinary_php": "*"
  }
}


```

to install using phpstorm  

Tools | Composer | Install






```bash
composer remove cloudinary/cloudinary_php
composer require "cloudinary/cloudinary_php:>2.0.0-beta"

```
now composer.json

```
{
  "name": "cloudinary/cloudinary_php_v1_sample",
  "description": "Cloudinary PHP SDK Sample",
  "type": "project",
  "minimum-stability": "stable",
  "license": "MIT",
  "authors": [
    {
      "name": "Cloudinary",
      "homepage": "https://github.com/cloudinary/cloudinary_php/graphs/contributors"
    }
  ],
  "require": {
  }
}
```

after install

```
{
  "name": "cloudinary/cloudinary_php_v1_sample",
  "description": "Cloudinary PHP SDK Sample",
  "type": "project",
  "minimum-stability": "stable",
  "license": "MIT",
  "authors": [
    {
      "name": "Cloudinary",
      "homepage": "https://github.com/cloudinary/cloudinary_php/graphs/contributors"
    }
  ],
  "require": {
    "cloudinary/cloudinary_php": ">2.0.0-beta"
  }
}

```








