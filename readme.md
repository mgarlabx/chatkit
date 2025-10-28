# OpenAI Agents

Esse texto contém instruções sobre como criar um chatbot usando as ferramentas da OpenAI.

# Criar um workflow

O primeiro passo é criar um workflow usando o "Agent Builder". O processo usa uma interface nocode e é bastante intuitivo. Esse workflow é o backend do agente e ficará rodando nos servidores da OpenAI.

1. Criar um workflow no [Agent Builder](https://platform.openai.com/agent-builder)
2. Clicar em `</> Code` na parte superior da tela e recuperar o `Workflow ID`.
3. Se quiser uma chave pública, para um determinado domínio, clicar `Add Domain`.
4. Caso contrário, será necessário consultar um endpoint para receber essa chave.

# Cenário 1 - single file

Esse é um cenário minimalista, capaz de criar um chatbot com apenas um arquivo. Nesse cenário é utilizado um arquivo `index.php`, sendo que parte inicial do arquivo é feita a chamada `request` para o endpoint `https://api.openai.com/v1/chatkit/sessions` com o objetivo de gerar uma `client_secret` que será utilizada no frontend. 

No exemplo apresentado, notar que há um único elemento HTML: `<div id='chat-container'></div>`. É nele que irá rodar o chatbot. 

Para instalar, deve-se passar as credenciais através de um arquivo `config.php` com a seguinte estrutura:

```
<?php
$OPENAI_API_KEY = "sk-proj-...";
$CHATKIT_WORKFLOW_ID = "wf_...";
$USER_ID = "lorem-ipsum-....";
?>
```
O valor do `$USER_ID` nesse exemplo é apenas ilustrativo. Em uma aplicação em produção, esse valor deverá de fato variar conforme o usuário. Se for sempre o mesmo, todos usuários irão ter acesso à todas as conversas realizadas, sem privacidade.

Os arquivos `index.php` e `config.php` devem ser carregados em um servidor Apache simples.

# Cenário 2 - multiple files

Nesse cenário, é feita a divisão da aplicação em vários arquivos, para facilitar a expansão do código. 

É preciso também passar as credenciais através do `config.php`, da mesma forma que feito no cenário anterior.

O elemento mais relevante desse cenário é o `config.js`, onde ficarão todas as configurações do chatbot. Ver mais adiante os links de referência com informações sobre como definir os parâmetros dessas configurações.

# Cenário 3 - server / client

Esse cenário implica rodar a aplicação em duas partes: um servidor e um cliente.

O arquivo `server.py` ilustra como criar o servidor. Será necessário criar um arquivo `.env`, com as mesmas credenciais informadas no `config.php` citado anteriormente.

O cliente está no aquivo `index.html`.

# Saiba mais

### Agent builder
- Nocode interface
[https://platform.openai.com/agent-builder](https://platform.openai.com/agent-builder)

### Chatkit
- Tutorial Chatkit
  [https://platform.openai.com/docs/guides/chatkit](https://platform.openai.com/docs/guides/chatkit)

### Backend
- Referência API Chatkit
  [https://platform.openai.com/docs/api-reference/chatkit/sessions/create](https://platform.openai.com/docs/api-reference/chatkit/sessions/create)

### Frontend
- Github chatkit-js
  [https://github.com/openai/chatkit-js](https://github.com/openai/chatkit-js)
- Theming
  [https://platform.openai.com/docs/guides/chatkit-themes](https://platform.openai.com/docs/guides/chatkit-themes)
  [https://openai.github.io/chatkit-js/guides/theming-customization/](https://openai.github.io/chatkit-js/guides/theming-customization/)
  [https://openai.github.io/chatkit-js/api/openai/chatkit/type-aliases/themeoption/](https://openai.github.io/chatkit-js/api/openai/chatkit/type-aliases/themeoption/)
- Icons
[https://openai.github.io/chatkit-js/api/openai/chatkit/type-aliases/chatkiticon/](https://openai.github.io/chatkit-js/api/openai/chatkit/type-aliases/chatkiticon/)
- Chatkit Studio
  [https://chatkit.studio](https://chatkit.studio)
- Chatkit Starter App (Next.js)
  [https://github.com/openai/openai-chatkit-starter-app](https://github.com/openai/openai-chatkit-starter-app)

.
