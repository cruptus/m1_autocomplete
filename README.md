# TP Autoload

Auteur : Elbaz Jérémie

Formation : Master 1 S2I
 
Enseignement : M1INF61

## Environnement 

PHP : `7.1`

MySQL : User `root` & Password `null`

Composer

## Installation

```bash
$ git clone git@github.com:cruptus/m1_autocomplete.git autocomplete
$ cd autocomplete
$ composer install
$ mysql -uroot
mysql> CREATE DATABASE autocomplete
mysql> exit
$ mysql -uroot autocomplete < autocomplete.sql
```

## Lancement 
Lancement sur le port 80
```bash
$ php -S localhost -t public
```
Lancement sur un autre port `[port]`
```bash
$ php -S localhost:[port] -t public
```