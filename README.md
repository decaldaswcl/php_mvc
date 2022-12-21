# PHP MVC Exemples

These are examples of MVC file structures that can be used as a basis for website designs.

# Requeriments

PHP version 7.4
Composer version 1.10.5 or above

# Installation

#### PHP

Automatic installation

In link https://www.php.net/downloads.php

#### Composer

Automatic installation

In link https://getcomposer.org/download/

# First steps

Choose the folder with the example MVC template you want to use.

In folder create a file name composer.json c

```json
{
    "name": "name/poject-name",
    "description": "Description of your project",    
    "autoload": {
        "psr-4": {
            "App\\":"app/"
        }
    },
    "authors": [
        {
            "name": "yourname",
            "email": "your-email"
        }
    ],
    "require": {
        "php":">=7.3"
    }
}
```

In terminal execute 

```sh
composer install
```


## Simple

This simple exemple MVC structure.

```
simple
├── app
│   ├── Controller
│   │   └── Pages
│   │       ├── Pages.php
│   │       └── Home.php
│   ├── Models
│   │   └── Entity
│   └── Views
│       └── View.php
├── resorces
│   └── views
│       └── pages
│           ├── footer.php
│           ├── header.php
│           ├── home.php
│           └── page.php
└── index.php
```
