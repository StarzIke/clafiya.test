<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center"> Clafiya Test API Guide</p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## The Documentation

This App is Hosted on Heroku (Ubuntu server, using nginx server) and the following Authentication endpoints can be tested with Postman.

## User Sign Up
POST Request: https://clafiya-test.herokuapp.com/api/v1/clafiya/register

BODY PARAMS:  name, email, password, password_confirmation


## User Login
POST Request: https://clafiya-test.herokuapp.com/api/v1/clafiya/login

BODY PARAMS: email, password


## Logout 
POST Request: https://clafiya-test.herokuapp.com/api/v1/clafiya/logout


## Get All Users
GET Request: https://clafiya-test.herokuapp.com/api/v1/clafiya/allusers
