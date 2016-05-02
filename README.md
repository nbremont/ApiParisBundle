ApiParisBundle
==============

Api Paris Bundle for Symfony2


# Installation


### Step 1: Download ApiParisBundle using composer

Tell composer to require ApiParisBundle by running the command:

``` bash
$ php composer.phar require "jeandejean/apiparisbundle:dev-master"
```

Composer will install the bundle to your project's `vendor/jeandejean/apiparisbundle` directory.


## Step 2: Enable the bundle

Finally, enable the bundle in the kernel:

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...

        new JeanDeJean\Bundle\ApiParisBundle\ApiParisBundle(),
    );
}
```

# How to

## Configuration

### Config
```yml
# config.yml
jean_de_jean_api_paris:
	token: %apiparis_token%

```

### Route
```yml
# routing.yml
_apiparis_demo:
    resource: "@JeanDeJeanApiParisBundle/Controller/"
    type:     annotation
    prefix:   /_apiparis

```

## Example

into controller:

``` php
<?php

public function indexAction()
{
    // ...
    $api = $this->container->get('jean_de_jean_api_paris.api.client');
    $eq_categories = $api->getCommand('equipements_get_categories')->execute();
    $qf_categories = $api->getCommand('quefaire_get_categories')->execute();

    return array(
        "quefaire_categories" => $qf_categories,
        "equipements_categories" => $eq_categories,
    );
}
```


Api {Paris}
========================

Accès à l 'API

L'API Paris Connect permet d'accéder en lecture aux données mises à disposition par Paris Numérique.
L'accès à ces données nécessite :
de disposer d’un compte Paris Connect
d’interroger le serveur https://api.paris.fr:3000
d'être en possession d'un token

Reponse
=======================
La réponse de l'API est au format JSON dont le schéma est le suivant :
status : l'état de la réponse, peut prendre la valeur "success" ou "error".
data : les données de la requête, retourne un objet en cas de succès ou "null" en cas d'erreur.
message : Le détail de l'erreur ou "null" en cas de succès.
Le schéma contient deux entrées supplémentaires en cas de succès :
requestTime : le temps de réponse de la requête
api-version : la version de l'API utilisée.

Exemple: { status: "error", data: null, message: "invalid api_id or secret_key" }


QueFaire
======================


1) get_categories
----------------------------------

Description
Retourne la liste des rubriques (brocante, concert, expositions, etc...)
Retour
le nom et l'identifiant de la catégorie.

Paramètres
 - aucun

Console: https://api.paris.fr:3000/data/1.2/QueFaire/get_categories/?token=


2) get_activities
----------------------------------

Description
Récupère les dernières activites et événements par catégories.
Retour
Retourne les dernières activités et événements.
Paramètres
cid (String), un ou des idenfiants de catégorie (séparés par des virigule, ie. 20,22)
created (Timestamp), date d'ajout de l'événement / activité. Peut prendre les valeurs "0" (récupère l'ensemble des donnnées dans la limite "limit") ou un timestamp
offset (Int), numéro de la ligne à partir duquel récupérer les données.
limit (Int), le nombre d'élément que l'on veut récupérer

Console: https://api.paris.fr:3000/data/1.2/QueFaire/get_activities/?token=&cid=&created=&offset=&limit=


3) search_activities
----------------------------------

Description
Recherche les activites et événements en cours ou à venir par mot clef.
Retour
Retourne les activités et événements ayant "mot clef" dans l'intitulé.
Paramètres
cid (String), un ou des idenfiants de catégorie (séparés par des virigule, ie. 20,22, indiquer "0" pour récupérer effectuer une recherche sur toutes les catégories confondues)
keyword (String), un mot clef
offset (Int), numéro de la ligne à partir duquel récupérer les données.
limit (Int), le nombre d'élément que l'on veut récupérer

Console: https://api.paris.fr:3000/data/1.2/QueFaire/search_activities/?token=&cid=&keyword=&offset=&limit=


4) get_geo_activities
----------------------------------

Description
Recherche les activites et événements en fonction d'un point (lat,lon), d'un rayon et d'une liste de catégories.
Retour
Retourne les dernières activités et événements classées par distance (du plus proche ou plus éloigné).
Paramètres
cid (String), un ou des idenfiants de catégorie (séparés par des virigule, ie. 20,22)
created (Timestamp), date d'ajout de l'événement / activité. Peut prendre les valeurs "0" (récupère l'ensemble des donnnées dans la limite "limit") ou un timestamp
lat (Double), latitude d'un point (WGS 84 - ex. 48.856332)
lon (Double), longitude d'un point (WGS 84 - ex. 2.353453)
radius (Int), rayon de recherche maximum à partir du point spécifié par lat et lon, exprimé en mètre.

Console: https://api.paris.fr:3000/data/1.2/QueFaire/get_geo_activities/?token=&cid=&created=&lat=&lon=&radius=&offset=&limit=


5) get_activity
----------------------------------

Description
Récupère toutes les informations sur un événement donné.
Retour
Retourne un objet contenant l'ensemble des informations sur un événement donné.
Paramètres
id (Int), l'identifiant de l'évenement

Console: https://api.paris.fr:3000/data/1.0/QueFaire/get_activity/?token=&id=


Equipements
======================


1) get_categories
----------------------------------

Description
Retourne la liste des catégories (piscines, parcs et jardins, bibliothèques, etc...)
Retour
le nom et l'identifiant de la catégorie.
Paramètres
 - aucun

Console: https://api.paris.fr:3000/data/1.0/Equipements/get_categories/?token=


2) get_equipements
----------------------------------

Description
Recupère l'ensemble des équipements d'une catégorie donnée.
Retour
le nom, l'adresse et le code postal d'un équipement.
Paramètres
cid (String), un ou des idenfiants de catégorie (séparés par des virigule, ie. 27,29)
offset (Int), l'offset
limit (Int), le nombre d'entrée retourné

Console: https://api.paris.fr:3000/data/1.0/Equipements/get_equipements/?token=&cid=&offset=&limit=


3) get_equipement
----------------------------------

Description
Recupère les informations sur un équipements donnée
Retour
l'ensemble des informations sur un équipement notamment ses heures d'ouverture / fermeture sur les 28 prochains jours (mise à jour en continue).
Paramètres
id (Int), l'identifiant de l'équipement

Console: https://api.paris.fr:3000/data/1.0/Equipements/get_equipement/?token=&id=


4) get_crowd_level
----------------------------------

Description
Retourne l'affluence d'un équipement.
Retour
crowd_level, un indicateur d'affluence allant de 1 à 3 (3 = bondé).
Si aucune information n'est disponible, crowd_level prend la valeur "-1"
Note : l'affluence concerne uniquement les équipements de type "Piscines". Elle est signalée par les utilisateurs de l'application IOs "Piscines" et n'est donnée qu'à titre d'information.
Paramètres
id (Int), l'identifiant de l'équipement

Console: https://api.paris.fr:3000/data/1.0/Equipements/get_crowd_level/?token=&id=


More information: https://api.paris.fr/
-
