StadeRochelais
==============

## Projet IUT
Ce projet avait pour but, la validation de la montée en compétence sur le framework php mvc Symfony.

 - Mise en oeuvre des valeurs agiles dans le management de l’itération
 - Conversation
 - Mur d'informations
 - Revues
 - Rétrospective
 - Livraison d’une brique exécutable ayant une valeur métier pour le client

## Installation

```shell
git clone git@matteo-raspberry.dynamic-dns.net:matteop/stade-rochelais.git
composer install
php bin/console doctrine:database:create
php bin/console doctrine:schema:update --force
php bin/console doctrine:fixtures:load
php bin/console server:run
```