# Mage2 Module Bluethink Faq

    ``bluethink/module-faq``


## Main Functionalities
Faq module provide features to create category and faqs under selected categories in admin panel, 
it will show on frontend under {{baseUrl}}/faq

## Installation
\* = in production please use the `--keep-generated` option

### Type 1: Zip file

 - Unzip the zip file in `app/code/Bluethink`
 - Enable the module by running `php bin/magento module:enable Bluethink_Faq`
 - Apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`

### Type 2: Composer

 - Make the module available in a composer repository for example:
    - private repository `repo.magento.com`
    - public repository `packagist.org`
    - public github repository as vcs
 - Add the composer repository to the configuration by running `composer config repositories.repo.magento.com composer https://repo.magento.com/`
 - Install the module composer by running `composer require bluethink/module-faq`
 - enable the module by running `php bin/magento module:enable Bluethink_Faq`
 - apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`


## Configuration
In Admin panel you need to enable this module under store > configuration > Bluethink > Faq
There are few options to enable/disable link on top navigation, menu bar and footer link
There is also option to use seo friendly url for faq module

<img src="https://github.com/abhijeetkumarbluethink/Bluethink/blob/main/faq-readme/configuration.png" alt="Magento FAQ Extension">



## Specifications
In Admin Panel admin user can add/edit/delete/enable/disable new faq's category

<img src="https://github.com/abhijeetkumarbluethink/Bluethink/blob/main/faq-readme/admin-category.png" alt="Magento FAQ Extension">

Admin user can add/edit/delete/enable/disable new faq under selected category

<img src="https://github.com/abhijeetkumarbluethink/Bluethink/blob/main/faq-readme/admin-faq.png" alt="Magento FAQ Extension">

On frontend you are able to see faq page on {{baseUrl}}/faq and enabled link

<img src="https://github.com/abhijeetkumarbluethink/Bluethink/blob/main/faq-readme/faq-main.png" alt="Magento FAQ Extension">

Faq Category page

<img src="https://github.com/abhijeetkumarbluethink/Bluethink/blob/main/faq-readme/faq-category.png" alt="Magento FAQ Extension">

Faq detail page

<img src="https://github.com/abhijeetkumarbluethink/Bluethink/blob/main/faq-readme/faq.png" alt="Magento FAQ Extension">

