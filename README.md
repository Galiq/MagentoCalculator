
# Simple API Calculator For Magento2

## What's inside?

A little preview of API usage, based on simple calculator, with Web API functional test included.

## Usage Instructions

### Installation steps

1. Login to your server instance.

2. Execute command `cd /var/www/Magento/app/code` or
   `cd /var/www/html/Magento/app/code` based on your server Centos or Ubuntu.

3. Make sure you have correct read/write permissions on your Magento root directory.
   Read about them [here](https://magento.stackexchange.com/questions/91870/magento-2-folder-file-permissions).

4. Move the Galik subfolder into the `/app/code` directory of your server.

5. Move to magento root folder by executing command `cd ../../`

7. Execute the following commands to manually install module.

- Execute `php bin/magento module:status`

- You must see Galik_Calculator in the list of disabled modules.

- To enable module execute `php bin/magento module:enable Galik_Calculator`

- Execute `php bin/magento setup:upgrade`

- Optional `php bin/magento setup:static-content:deploy`

- Execute `php bin/magento setup:di:compile`

- Execute `php bin/magento cache:clean`

- Optional. If you are not the owner of Magento files:
  `chmod -R 755 ./`
  `chmod -R 777 var/`
  `chmod -R 777 pub/`
  `chmod -R 777 app/etc`
  `chmod -R 777 generated`

8. Upon successful installation, you are able to use module.

### Sample usage

1. You can manually test API endpoint by sending POST request on `/V1/rce/calculator` url with sample request body:
  `{
   "left": 12.34,
   "right": 56.78,
   "operator": "string",
   "precision": 2
   }`
   
2. You can run Web API functional test by running command:

`vendor/bin/phpunit --config ./dev/tests/api-functional/phpunit_rest.xml ./app/code/Galik/Calculator/Test/`
   
[More info about running tests](https://devdocs.magento.com/guides/v2.3/get-started/web-api-functional-testing.html#howto)

## Requirements

Module requires
* Magento version 2.0 and above
* PHP 7.0 or greater with PHP Soap extension for tests
