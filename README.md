# Test Tech
***********************************************************************

Fournir les objets PHP en utilisant Doctrine correspondant à la demande suivante :

Un utilisateur peut avoir plusieurs comptes bancaires. Un compte bancaire a forcément une seule carte.

Un utilisateur est composé de :

- Nom
- Prénom
- Date de naissance
- Email
- Téléphone

Un compte bancaire :

- IBAN
- BIC
- Un identifiant du compte fourni par notre partenaire bancaire (la référence chez eux)
- Balance (le solde du compte)

Une carte bancaire :

- Un numéro de carte
- Un identifiant de carte fourni par notre partenaire bancaire (la référence chez eux)
- Un statut (actif, fermé, volé)
- Une date d’expiration

***********************************************************************

Fournir le code permettant de créer les données de test suivantes :

Utilisateur numéro 1:

- Nom : Ricciardo
- Prénom : Daniel
- Date de naissance : 1 juillet 1989
- Email : honey.badger@fia.com
- 2 comptes bancaires (données libres)

Utilisateur numéro 2:

- Nom : Gasly
- Prénom : Pierre
- Date de naissance : 7 février 1996
- Email : pierrot-monza2020@fia.com
- 1 compte bancaire (données libres)

Utilisateur numéro 3:

- Nom : Vettel
- Prénom : Sebastian
- Date de naissance : 3 juillet 1987
- Email : babyschumy@fia.com
- 1 compte bancaire (données libres)

***********************************************************************

fournir une classe PHP en respectant les bonnes pratiques de Symfony permettant de faire les requêtes suivantes :

- Sélection d'un utilisateur par email.
- Sélection d'un utilisateur avec son identifiant de compte fourni par notre partenaire bancaire.
- Sélection d'un utilisateur avec son identifiant de sa carte fourni par notre partenaire bancaire.




