# SheolFramework #
### Global Architecture ##
* /Api/ *charge automatique les api's* __No Work__
* /App/ *contient toutes les app d'un projet, example : frontend & backend*
* /Config/app.xml *fichier de configuration global, peut être override dans les apps*
* /Config/Lang/ *contient toutes les traductions dans différents langages de manière global*
* /Errors/ *contient toutes les pages d'erreurs, example : 404.php*
* /Lib/ *contient toutes les libs utiles au bon fonctionement du projet*
   * /Lib/Core/ *la lib la plus importante, le coeur du framework*
   * /Lib/Entities/ *les entités des apps* __A pofiner__
   * /Lib/Model/ *les models des apps*
* /Web/ *contient toute la partie visible*
* /Web/bootstrap.php *c'est un peut le méga chargeur du framework !!!*

### APP Architecture ##
* /App/__APP_NAME__/Config/ *contient toutes les config relatifs à l'app*
* /App/__APP_NAME__/Modules/ *contient tous les modules de l'app, plus détaillé en bas*
* /App/__APP_NAME__/Templates/ *contient touts les templates fixe pour chaques modules*

### Make a new module ! ##
* /App/__APP_NAME__/Modules/__MODULE_NAME__/ *notre module.*
* /App/__APP_NAME__/Modules/__MODULE_NAME__/__MODULE_NAME__Controller.php *notre contrôleur.*
* /App/__APP_NAME__/Modules/__MODULE_NAME__/Views/ *les vues du module.*
* /Lib/Model/__MODULE_NAMEManager.php__ *le manager de base pour notre module.*
* /Lib/Model/__MODULE_NAMEManagerPDO.php__ *notre manager utilisant PDO.*
* /Lib/Entity/__MODULE_NAME__.php *la classe représentant un enregistrement pour notre module.*

### TODO ###
- [x] Faire l'architecture du framework.
- [x] Recoder les parties nécessaires.
- [x] Coder quelques examples.
- [x] Clean le projet.
- [x] Tester le Framework.
- [ ] Détailler l'utilisation des formulaires automatiques.
- [ ] Corriger toute la doc.
- [ ] Commenter le code.
- [ ] Améliorer le Framework.
