# Procédure d'installation de l'environnement de développement (et base de données test)

Démarre le serveur interne Symfony:
se placer à la racine du projet 
(par ex dans mon cas:cd /media/vincent/Dev_Graph/MegaSync/01_Code_Dev/Sans-ordonnance/sans-ordonnance )
php bin/console server:run

# 1)Installer Docker

# 2)Positionnez-vous dans le repertoire racine contenant le Dockerfile (par défaut sans-ordonnance)

# 3)Builder l'image (à partir du Dockerfile):

docker build -t vincent/mysql .
// on nomme l'image souhaitée ("vincent/mysql" est un exemple) et on indique un "." pour spécifier que le Dockerfile est dans le répertoire courant.

# 4)Créer un conteneur pour cette image paramétrer en tant que serveur utf8mb4:

docker run --name medicaments -p3306:3306 -d vincent/mysql --character-set-server=utf8mb4 --collation-server=utf8mb4_unicode_ci

# 5)si le conteneur se crée mais ne démarre pas, démarrez-le:
docker start medicaments

# 6)Exécution/entrer dans le conteneur :

docker exec -it medicaments /bin/bash

-Dans le conteneur (#root@.../#):
# 7)Connectez-vous à la base en tant que root:

mysql -uroot -pOfficedp@69

La base de données est maintenant déployée sur le port 3306.

Quelques opérations utiles:

Dans mysql (mysql>):

show databases; 
use medicaments;
show tables;

-Arrêter/démarrer un conteneur (projet_filmotheque pour l'exemple):

docker start moviedb

docker stop moviedb

-Arrêter les conteneurs:
docker stop $(docker ps -a -q)

-Supprimer les conteneurs:
docker rm $(docker ps -a -q)


Supprimer toutes les images non utilisées:
docker rmi $(docker images -q)


Sortir de la BDD et des conteneur: exit

Afficher tous les conteneurs:
docker ps -a
