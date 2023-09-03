<h2 align="center"> 🎵 Chercheur de sons Mario 🎵 </h2> 

Ce code PHP vous permet de rechercher des pistes sur Spotify via son API et de jouer un extrait de la musique Mario.

## 🚀 Comment l'utiliser?

1. Rendez-vous sur la [section développeur de Spotify](https://developer.spotify.com/), connectez-vous ou inscrivez-vous si nécessaire, puis créez une nouvelle application.

2. Récupérez le Client ID et le Client Secret générés pour votre application Spotify.

3. Remplacez les placeholders `YOUR CLIENT ID` et `YOUR CLIENT SECRET` par vos vrais identifiants dans le fichier `soundapi.php`.

4. C'est tout! Le script est maintenant configuré pour vous proposer des extraits de chansons de Mario. Si vous souhaitez jouer la chanson complète, remplacez la ligne 38 qui ressemble à ceci :

   ```php
   $track_url = $track['preview_url'];
   ```
par:
 ```php
   $track_url = $track['href'] . '?access_token=' . $access_token;
```
## ❓ Besoin d'aide?
Si vous avez des questions ou avez besoin d'assistance, n'hésitez pas à me contacter sur Discord à l'adresse : 64a. Je me ferai un plaisir de vous aider !

J'espère que cela vous convient ! Si vous avez d'autres questions ou avez besoin de plus d'aide, n'hésitez pas à demander.


