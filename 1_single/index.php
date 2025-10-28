<?php
require_once 'config.php';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.openai.com/v1/chatkit/sessions');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Authorization: Bearer ' . $OPENAI_API_KEY,    // config.php
    'OpenAI-Beta: chatkit_beta=v1'
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
    'user' => $USER_ID,                            // config.php
    'workflow' => ['id' => $CHATKIT_WORKFLOW_ID]   // config.php
]));
$CLIENT_SECRET = json_decode(curl_exec($ch), true)['client_secret'];
curl_close($ch);
?>
<div id='chat-container'></div>
<script src='https://cdn.platform.openai.com/deployments/chatkit/chatkit.js'></script>
<script>
    const options = {
        api: {getClientSecret: () => '<?=$CLIENT_SECRET?>'},
        locale: 'pt-BR',
        theme: {colorScheme: 'dark'},
        composer: {placeholder: 'Faça a sua questão...'},
        startScreen: {
            greeting: 'Exemplos de perguntas para você começar:',
            prompts: [
                {icon: 'circle-question', label: 'Qual é a capital da França?', prompt: 'Qual é a capital da França?'},
                {icon: 'circle-question', label: 'Onde fica o museu do Louvre?', prompt: 'Onde fica o museu do Louvre?'},
            ],
        }
    };
    const chatkit = document.createElement('openai-chatkit');
    chatkit.setOptions(options);
    document.getElementById('chat-container').appendChild(chatkit);
</script>
