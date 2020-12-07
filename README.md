# PHP SDK2 Migration

This repo contains code for the PHP SDK2 and SDK2 syntax. There are instructions in this document for migrating from SDK1 to SDK2.  
Because the focus is on migration, a limited number of examples are provided for using the Upload API, Admin API, and transformations.  

The Cloudinary PHP SDK2 provides 2 different methods for supply credentials and instantiate Cloudinary:
1. A **constructor** function will allow for the creation of multiple instances of Cloudinary which enables the developer to access multiple clouds 
within a single script.
2. An **instance** function will allows for the creation of a single instance of Cloudinary.

For the purposes of migration, we will be using the **instance** function to demonstrate SDK2 code.  

The goal of this migration guide is to simplify migration. Therefore, we'll be demonstrating simple techniques for
modifying existing SKD1 code to make it SDK2 compliant.  Cloudinary provides a full training course that looks deeper
into SDK2 syntax. 

## Contents
The files that we'll be focusing on in this migration exercise are:

1. *index-v1.php*  
This is a php web page that relies on SDK1 syntax. Before we upgrade, we'll review the code
 offered in SDK1 that we'll be modifying as part of the migration.
2. *composer.json*    
We'll start with reference to SDK1 Cloudinary package.  We'll uninstall it and install the 
SDK2 Cloudinary package to begin migration. For demonstration purposes, there is a `composer-v1.json` file
and a `composer-v2.json` file.  If you example them, you'll see that the only difference is the 
Cloudinary package.
![SDK1 composer vs SDk2 composer](./images/composer-diff.jpg)
As of this writing, we are in Beta and the only difference between the composer.json files is the Cloudinary
package version: `"cloudinary/cloudinary_php": "*"` vs. `cloudinary/cloudinary_php": ">2.0.0-beta"`.
3. *index-v2.php*    
This is a php page containing the same functionality as *index-v1.php* and will allow use the 
same functionality in SDK2 as SDK1 with just a few code changes.  These changes constitute what  
a developer would need to execute in order to migrate code from SDK1 to SDK2.  

We can move forward and backward by just uninstalling Cloudinary and the Reinstalling which ever SDK
we want to work with.

## Running SDK1 Code as a Baseline 

Before migrating to SDK2 and looking at the syntax, we can note that the composer.json supplied with this 
repo is set up for SDK1.  Let's execute code from SDK1 as a baseline.

To install the PHP SDK execute the following:

```bash
composer install
```

### Running the SDK1 code



## Migrate Cloudinary Using Composer

To upgrade from SDK1 to SDK2, remove Cloudinary and then install the 2.0 Beta.  The require
object will be empty after the `remove` command
.  The object will contain a reference to Cloudinary 2.0
after the `require` command.

```bash
composer remove cloudinary/cloudinary_php
composer require "cloudinary/cloudinary_php:>2.0.0-beta"
```
You can always return to SDK1 by executing the `remove` command and the requiring the SDK1 version
of Cloudinary.

```bash
composer remove cloudinary/cloudinary_php
composer require "cloudinary/cloudinary_php"
```









