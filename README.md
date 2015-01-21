# Laravel Container Aware

[![Build Status](https://travis-ci.org/jeremyworboys/containeraware.svg)](https://travis-ci.org/jeremyworboys/containeraware)
[![Total Downloads](https://poser.pugx.org/jeremyworboys/containeraware/downloads.svg)](https://packagist.org/packages/jeremyworboys/containeraware)
[![Latest Stable Version](https://poser.pugx.org/jeremyworboys/containeraware/v/stable.svg)](https://packagist.org/packages/jeremyworboys/containeraware)
[![Latest Unstable Version](https://poser.pugx.org/jeremyworboys/containeraware/v/unstable.svg)](https://packagist.org/packages/jeremyworboys/containeraware)
[![License](https://poser.pugx.org/jeremyworboys/containeraware/license.svg)](https://packagist.org/packages/jeremyworboys/containeraware)

## Introduction

ContainerAware adds a container aware interface, trait and base controller. The service provider will automatically inject an `Illuminate\Container\Container` instance to anything with `JeremyWorboys\ContainerAware\ContainerAware` interface.

The `JeremyWorboys\ContainerAware\ContainerAwareController` also comes with some helper methods for retrieving services from the container and adds method injection into your Laravel 4 controller actions (exactly the same as Laravel 5).

## Installation

Require this package with composer using the following command:

    composer require barryvdh/laravel-ide-helper

After updating composer, add the ServiceProvider to the providers array in app/config/app.php

    'JeremyWorboys\ContainerAware\ContainerAwareServiceProvider',

### License

ContainerAware is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
