<?php
// Remplacer YOUR_CLIENT_ID et YOUR_CLIENT_SECRET par votre ID client et votre clé secrète Spotify
$client_id = 'YOUR_CLIENT_ID';
$client_secret = 'YOUR_CLIENT_SECRET';

$search_term = $_POST['search_term'];
$artists = $track['artists'];
foreach ($artists as $artist) {
  echo $artist['name'] . '<br>';
}
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://accounts.spotify.com/api/token');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'grant_type=client_credentials');
curl_setopt($ch, CURLOPT_HTTPHEADER, [
  'Authorization: Basic ' . base64_encode("$client_id:$client_secret")
]);
$response = curl_exec($ch);
curl_close($ch);

$response_data = json_decode($response, true);
$access_token = $response_data['access_token'];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.spotify.com/v1/search?q=' . urlencode($search_term) . '&type=track');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
  'Authorization: Bearer ' . $access_token
]);
$response = curl_exec($ch);
curl_close($ch);

$response_data = json_decode($response, true);

if (count($response_data['tracks']['items']) > 0) {
  $track = $response_data['tracks']['items'][0];
  $track_url = $track['preview_url'];
  ?>
  
  <html>
<body>
    
<head>
<link rel="stylesheet" href="style.css">
</head>

<div class="div">
    
    <h1 id="dream">Tu es entrain d'écouter <?php echo $track['name']; ?></h1>
  <audio controls src="<?php echo $track_url; ?>">
  Votre navigateur ne supporte pas l'élément audio.
  </audio>
  <h5>Je me suis trompé? désolé bb regarde les titres simillaires ci-dessous.</h5>
  
<?php $track_id = $track['id']; ?>

<h2>Pistes similaires:</h2>

<ul>
  <?php
  $api_url = "https://api.spotify.com/v1/recommendations?seed_tracks=$track_id&limit=5";
  $response = file_get_contents($api_url, false, stream_context_create([
      'http' => [
          'proxy' => 'tcp://proxy.example.com:3128',
          'request_fulluri' => true,
          'header' => "Authorization: Bearer $access_token"
      ],
  ]));
  $response_data = json_decode($response, true);
  $similar_tracks = $response_data['tracks'];
  ?>

  <?php foreach ($similar_tracks as $similar_track) : ?>
    <li><?php echo $similar_track['name']; ?></li>
  <?php endforeach; ?>
</ul>
  
  </div>
<footer class="footer">
			<p >Developed by rzayon#6984</p>
		</footer>
</body>
</html>
  <?php
} else {
  echo 'Aucun résultat trouvé';
}

?>
