<?php 
 $client_id = '511831528146-nt6a4i4mcefmpbqldtb435l1clvmcldn.apps.googleusercontent.com'; // Google client ID
    $client_secret = '2j6dXL_uMIr7rXeFoxcBbfQs'; // Google Client Secret
    //$redirect_url = 'https://dummy.solarhub.id/home/google_login'; // Callback UR
      //$redirect_url = 'https://solarhub.id/home/google_login'; // Callback UR
     $redirect_url = 'http://localhost/solarhub/home/google_login'; // Callback UR
    $gclient = new Google_Client();
$gclient->setClientId($client_id); // Set dengan Client ID
$gclient->setClientSecret($client_secret); // Set dengan Client Secret
$gclient->setRedirectUri($redirect_url); 

$google_oauthv2 = new Google_Oauth2Service($gclient);


 ?>