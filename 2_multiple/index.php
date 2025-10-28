<?php

require_once 'config.php';

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://api.openai.com/v1/chatkit/sessions');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Authorization: Bearer ' . $OPENAI_API_KEY,    // config.php
    'OpenAI-Beta: chatkit_beta=v1'
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
    'user' => $USER_ID,                            // config.php
    'workflow' => ['id' => $CHATKIT_WORKFLOW_ID]   // config.php
]));

$response = curl_exec($ch);

$decoded_response = json_decode($response, true);
$CLIENT_SECRET = $decoded_response['client_secret'];

curl_close($ch);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChatKit App</title>
    <script src="https://cdn.platform.openai.com/deployments/chatkit/chatkit.js"></script>
    <script>const CLIENT_SECRET = '<?= $CLIENT_SECRET; ?>';</script>
    <link href="style.css" rel="stylesheet">
</head>

<body>
    <div id="app">
        <h1>ChatKit App</h1>
        <div id="chat-container"></div>
    </div>

    <script type="text/javascript" src="config.js?v=<?= time(); ?>"></script>
    <script type="text/javascript" src="app.js?v=<?= time(); ?>"></script>

</body>

</html>