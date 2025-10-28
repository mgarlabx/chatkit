
const locale = 'pt-BR';

const theme = {
    colorScheme: 'light', // 'light', 'dark'
    color: {
        accent: {
            primary: "#2D8CFF", // theme === "dark" ? "#f1f5f9" : "#0f172a",
            level: 2
        }
    },
    radius: 'pill', // 'round', 'pill' 
    density: 'spacious', // 'compact', 'spacious'
    typography: {
        baseSize: 16,
        fontFamily: 'Inter, sans-serif',
        fontSources: [
            {
                family: 'Inter',
                src: 'https://rsms.me/inter/font-files/Inter-Regular.woff2',
                weight: 400,
                style: 'normal'
            }
        ]
    }
};

const composer = {
    placeholder: 'Faça a sua questão...',
    attachments: {
        enabled: false,
        maxCount: 5,
        maxSize: 10485760,
        accept: { "application/txt": [".txt"], "image/*": [".png", ".jpg"] },
        // uploadStrategy: { type: 'hosted' },
    },
    tools: [
        // {
        //     id: 'add-note',
        //     label: 'Add Note',
        //     icon: 'write',
        //     pinned: true,
        // }
    ],
};

const startScreen = {
    greeting: 'Exemplos de perguntas para você começar:',
    prompts: [
        {
            icon: 'circle-question',
            label: 'Qual é a capital da França?',
            prompt: 'Qual é a capital da França?'
        },
        {
            icon: 'circle-question',
            label: 'Onde fica o museu do Louvre?',
            prompt: 'Onde fica o museu do Louvre?'
        },
    ],
};

const header = {
    leftAction: {
        icon: "settings-cog",
        onClick: () => fnSettings(),
    },
    rightAction: {
        icon: "home",
        onClick: () => fnHome(),
    },
};

const threadItemActions = {
    feedback: false,
    retry: false,
};
