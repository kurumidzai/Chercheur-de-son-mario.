Ce code PHP permet de rechercher sur spotify via l'api et de jouer une piste Mario.

Comment l'utiliser?
Rendez-vous sur la section de developper spotify, inscrivez-vous où connectez-vous ensuite vous allez créé une application.
Récupérer le client id et le client secret et remplacez-les à la place de YOUR CLIENT ID et YOUR CLIENT SECRET dans le fichier soundapi.php.
Et voilà ce script vous proposerez uniquement des extraits de sons si vous souhaitez lire le son en entier remplacer la ligne 38 qui est:

$track_url = $track['preview_url'];

par

$track_url = $track['href'] . '?access_token=' . $access_token;

Voili Voilà si vous avez des questions je me ferais un plaisir d'y répondre sur le discord:ylto#3569
