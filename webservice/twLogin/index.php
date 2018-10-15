<?php
session_start();

require_once "twconfig.php";
require_once "twitteroauth/autoload.php";
use Abraham\TwitterOAuth\TwitterOAuth;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Projeto Login com Twitter</title>
</head>
<body>
<?php
if(isset($_SESSION['tw_access_token']) && !empty($_SESSION['tw_access_token'])) {
    $conn = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $_SESSION['tw_access_token']['oauth_token'], $_SESSION['tw_access_token']['oauth_token_secret']);
    
    $user = $conn->get("account/verify_credentials");

    if(isset($_POST['txt-msg']) && !empty($_POST['txt-msg'])) {

        $conn->post('statuses/update', array(
            'status' => $_POST['txt-msg']
        ));

        echo 'Tweet publicado com sucesso!';
    }

    // print_r($user);

} else {
    echo '<a href="login.php">Login com Twitter</a>';
}
?>
<form action="" method="post">
    <label for="">Escreva um tweet</label><br>
    <textarea type="text" name="txt-msg"></textarea><br><br>
    <input type="submit" value="Enviar">
</form>
</body>
</html>