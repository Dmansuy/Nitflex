Formation Symfony
========================

Version 3.4 & 4.0  
IPSSI - Février 2018

### Projet Nitflex

Netflix est une application web permettant la visualisation en streaming de films ou séries. Cette application propose des fonctionnalités suivantes :  

* <b>Inscription / Connexion utilisateur (ROLE_USER)</b>  
* <b>Faire une recherche d'un film</b>  
* <b>Lister les films</b> ou séries <b>par catégories</b>   
* Lister les ajouts récents  
* <b>Afficher le détail du film / série</b>    
* <b>Regarder un film / épisode de série</b>    
* <b>Passer à l'épisode suivant</b>    
* <b>Modifier les paramètres / préférences utilisateur</b>    
* Ajouter un pouce sur un film qui vous a plu (ou non)  
* <b>Ajouter / supprimer un film de la liste "à regarder plus tard"</b>  

L'application dispose également d'une interface admin avec les fonctionnalités suivantes :
*<b> CRUD catégorie de film</b>     
*<b> CRUD film</b>     
* CRUD série   
* CRUD saison de la série  
* CRUD épisode de la saison   
* Mettre une liste de film en avant  
* Gestion des utilisateurs (ajout / suppression / bannissement)    
* Gestion des abonnements utilisateurs    
* Import massif de film / série   
 
Les utilisateurs de l'interface admin peuvent avoir des rôles différents et n'accèdent pas à toutes les fonctionnalités, ex :

- ROLE_MARKET (Gestion des utilisateurs / Gestion des abonnements utilisateurs)   
- <b>ROLE_ADMIN</b> (Toutes les fonctionnalités)   
 
Les éléments <b>en gras</b> composent la trame principale à développer dans votre projet. Votre projet devra contenir l'intégralité des éléments vue en cours (gestion des entités, formulaires, services, fixtures, commandes, etc...). Vous devrez également tenir compte des Bonnes Pratiques de Symfony ainsi que la norme PSR-2. Libre à vous d'ajouter autant de fonctionnalités que vous voulez, le but est de vous faire manipuler le framework Symfony. La partie design ne sera pas noté, cependant elle pourra ajouter des points bonus.
