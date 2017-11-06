## New Module Declaration

In app/code we should create <Namespace>/<Module>

In M2 all files related to a module should be stored in a single directory.

The first essential file is **registration.php**

```
<?php
\Magento\Framework\Component\ComponentRegistrar::register(
    \Magento\Framework\Component\ComponentRegistrar::MODULE,
    'Aws_SampleModuleDeclaration',
    __DIR__
);
```
We tell Magento our module presents and type which is **MODULE**;
Module name **'Aws_SampleModuleDeclaration'** and root directory **__DIR__**
of our module.

Second required component of the module is general config file **module.xml**.
All module config files should be created under directory named **etc**

```
<?xml version="1.0"?>
<config xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="urn:magento:framework:Module/etc/module.xsd">
    <module name="Aws_SampleModuleDeclaration" setup_version="1.0.0">
        <sequence>
            <module name="Magento_Catalog"/>
        </sequence>
    </module>
</config>

```
The root **\<config>** node has reference to xml namespace and xsd Schema.
Be sure to include those references in all your xml file. Xsd reference used for validation
 and suggestions for node and attribute names.
 "urn:magento:framework:Module/etc/module.xsd" is red, it means 
 that record will not work out of the box and you have to easier mapped manually
 or generate the mapping file for your IDE. Fortunately with help magento command you will be able
 to generate such mapping once and for all xml files in the framework.
 We have to switch to cli
 dev:urn-catalog:generate And path to output file. For PHPStorm is .idea/misc.xml
 
 ```
 php bin/magento dev:urn-catalog:generate .idea/misc.xml
 ```
 
 When mapping file is generated we have the power of xsd autosuggestion.
 And ready to edit a declaration of our module.
 
 The module declaration is done by **\<module>** node. **\<sequence>**
declare dependency of other modules. Magento framework will ensure that
Magento_Catalog is also installed. And what's more important our module
will be loaded later than Magento_Catalog.

After that you should enable module in cli and register in DB.

```
php bin/magento module:enable Aws_SampleModuleDeclaration
```

In app/etc/config.php list of modules stored in sequence. The first module 
in this list will be loaded first and the last module will be load last.
To finalize module registration we have to run db upgrade
```
php bin/magento setup:upgrade
```
To see in DB
```
SELECT * FROM setup_module WHERE module = 'Aws_SampleModuleDeclaration';

```