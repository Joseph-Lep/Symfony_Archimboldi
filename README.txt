J'ai essayé de refaire un site type Sens-critique mais seulement pour des livres.
Ou l'on peux voir les livres, leurs medium associés et les critiques associées.

3 Users : 
1 - Visiteur : qui à le droit de lecture seulement
2 - Inscrit : qui étends le visiteur + peux crée du nouveau contenu (1 livre ou 1 critique) et faire du CRUD sur ses propres critiques
3 - Admin : Admin

Devoir s'inscrire via un formulaire pour devenir "Inscrit"
Se connecter et se déconnecter

J'ai pu faire. Voir les livres, les critiques. Faire le CRUD associé. Faire EasyAdmin. Et voila c'est tout... Le reste ne marche pas ou plus...

Ce qui marche. 

Entity, Controller et view pour Book
	->/book pour acceder a la page
	->/book/{id} pour acceder a 1 livre
	->/books/crud pour acceder à la liste et au crud des livres


Entity, Controller et view pour Critic
	->/critic pour acceder a la page
	->critic/{id} pour acceder a 1 crtique
	->critic/crud/ Ne marche plus depuis Dimanche

EasyAdmin (/admin)
	-> Amène vers un index
	-> Si un utilisateur est connecté il est forbidden car son rôle n'est pas celui d'un admin

Ce qui ne marche pas.

Je n'ai pas su associé les critiques à un livre
Dans les fichiers Twig afficher des entités en relations.
Le formulaire d'inscription s'arrête au rendu.
Toute la partie User (Page de profil avec ses critiques et ses possibilité de crud sur son contenu généré par lui)
On peux s'authentifier. Mais on a tout de même accès au /crud de tout




  admin                      ANY        ANY      ANY    /admin
  admin_books                ANY        ANY      ANY    /admin/books
  admin_user                 ANY        ANY      ANY    /admin/user
  admin_critic               ANY        ANY      ANY    /admin/critic
  book                       ANY        ANY      ANY    /book
  book_list                  ANY        ANY      ANY    /book/{id}
  app_books_crud_index       GET        ANY      ANY    /books/crud/
  app_books_crud_new         GET|POST   ANY      ANY    /books/crud/new
  app_books_crud_show        GET        ANY      ANY    /books/crud/{id}
  app_books_crud_edit        GET|POST   ANY      ANY    /books/crud/{id}/edit
  app_books_crud_delete      POST       ANY      ANY    /books/crud/{id}
  critic                     ANY        ANY      ANY    /critic
  post_edit                  ANY        ANY      ANY    /critic/{id}/edit
  critic_list                ANY        ANY      ANY    /critic/{id}
  app_critic_crud_index      GET        ANY      ANY    /critic/crud/
  app_critic_crud_new        GET|POST   ANY      ANY    /critic/crud/new
  app_critic_crud_show       GET        ANY      ANY    /critic/crud/{id}
  app_critic_crud_edit       GET|POST   ANY      ANY    /critic/crud/{id}/edit
  app_critic_crud_delete     POST       ANY      ANY    /critic/crud/{id}
  index                      ANY        ANY      ANY    /
  medium                     ANY        ANY      ANY    /medium
  medium_books               ANY        ANY      ANY    /medium/{id}
  app_login                  ANY        ANY      ANY    /login
  app_logout                 ANY        ANY      ANY    /logout
  register                   ANY        ANY      ANY    /register
  user_space                 ANY        ANY      ANY    /user