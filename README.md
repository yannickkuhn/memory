# Jeux de memory
Création d'un jeux de memory avec une partie frontend - HTML/CSS/JS (avec librairie JQuery).   
Création d'une partie backend - PHP7/8    
Utilisation d'ajax pour synchroniser le back et le front.

## Identifiants de base de données
Les identifiants de la base de données seront à indiquer dans le fichier app/class/database/Database.php.   
La ligne concernée :   
__construct($db_name, $db_user = 'root', $db_pass = 'root', $db_host = 'db') {   
On peut y changer la valeur de db_user, db_pass et db_host.

# docker-compose
docker-compose up --build   

## Instructions pour la base de données   
Une fois le serveur lancé (3 instances) :   
Il faut lancer l'URL : http://localhost:8080/app/migrations/CreateTable.php pour créer la table dans la base de données qui s'appelle "memory".   
On peut vérifier la bonne exécution du script en se connectant sur PHPMYADMIN (voir identifiants dans le fichier docker-compose.yml). URL à taper : http://localhost:8000/.
Enfin, on peut lancer l'application memory : http://localhost:8080/public/index.html

# BUILD D'IMAGE (SIMPLE)

## build image docker
docker build -t memory-docker-build .
## run docker image
docker run -d -p 8080:80 memory-docker-build