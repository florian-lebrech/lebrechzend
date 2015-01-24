Joris Bouland
Florian Le Brech


Tuto installation du projet ZEND
N'oubliez pas de créer la base de donnée grâce au fichier boulandlebrech.sql dans data/cache/boulandlebrech.sql 


Fichier local.php:
Par défaut ce fichier est exclu par git. Pour faire fonctionner la base de données, vous devez ajouter:
 return array(
     'db' => array(
         'username' => 'root',
         'password' => '',
     ),
 );

Fichier pour les Log :
L'emplacement d'écriture des logs dépend de la machine. Il faut utiliser un dossier ne nécessitant pas les droits d'administrateur.
Il faut modifier par exemple la ligne 29 dans le fichier zend_tuto\config\autoload\global.php  comme ceci:
$writer = new Zend\Log\Writer\Stream('C:\xampp'. date('Y-m-d') . '-error.log');

Base de données :
Vous devez ajouter la base de donnée fournie dans le dossier cache.

Autre :
Il peut être nécessaire de cocher la case "Copy files on project open" dans les propriétés du projet.

Tests :
Les tests peuvent être effectués avec 2 comptes: admin (mot de passe: admin) et test (mot de passe: test).

TESTS JSON 

Une fois connecté avec un des deux comptes (admin/admin ou test/test), vous pourrez tester l'utilisation de json en cliquant dans le menu sur toJson (ceci affiche le code json). Ensuite vous pouvez aller voir l'affichage générer a partir du code json en allant dans le menu et affichageJson.



# lebrechzend 
