const options = {
    api: {getClientSecret: () => CLIENT_SECRET} 
};

if (typeof theme !== 'undefined') {
    options.theme = theme;
}

if (typeof composer !== 'undefined') {
    options.composer = composer;
}

if (typeof startScreen !== 'undefined') {
    options.startScreen = startScreen;
}

if (typeof header !== 'undefined') {
    options.header = header;
}

if (typeof locale !== 'undefined') {
    options.locale = locale;
}

if (typeof threadItemActions !== 'undefined') {
    options.threadItemActions = threadItemActions;
}

document.addEventListener('DOMContentLoaded', () => {
    const container = document.getElementById('chat-container');
    const chatkit = document.createElement('openai-chatkit');
    chatkit.setOptions(options);
    chatkit.classList.add('h-chat', 'w-chat');
    container.appendChild(chatkit);
});

const fnSettings = () => {
    alert('Settings button clicked');
}

const fnHome = () => {
    alert('Home button clicked');
}

