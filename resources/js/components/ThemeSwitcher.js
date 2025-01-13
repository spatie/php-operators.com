export default class ThemeSwitcher {
    constructor() {
        this.darkModeBtn = document.querySelector("button[data-mode='dark']");
        this.lightModeBtn = document.querySelector("button[data-mode='light']");

        this.init();
    }

    setInitialState() {
        const rootElement = document.documentElement;
        const prefersDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;
        const storedMode = localStorage.getItem('colorMode');

        // Determine the initial state based on storedMode or system preference
        if (storedMode === 'dark') {
            rootElement.classList.add('dark');
            this.toggleActiveButton(this.darkModeBtn, this.lightModeBtn);
        } else if (storedMode === 'light' || (!storedMode && !prefersDarkMode)) {
            rootElement.classList.remove('dark');
            this.toggleActiveButton(this.lightModeBtn, this.darkModeBtn);
        } else if (prefersDarkMode) {
            rootElement.classList.add('dark');
            this.toggleActiveButton(this.darkModeBtn, this.lightModeBtn);
        }
    }

    toggleActiveButton(activeButton, inactiveButton) {
        activeButton.classList.remove('opacity-20');
        inactiveButton.classList.add('opacity-20');
    }

    toggleMode() {
        const rootElement = document.documentElement;

        // Add event listener for the dark mode button
        this.darkModeBtn.addEventListener('click', () => {
            rootElement.classList.add('dark');
            localStorage.setItem('colorMode', 'dark');
            this.toggleActiveButton(this.darkModeBtn, this.lightModeBtn);
        });

        // Add event listener for the light mode button
        this.lightModeBtn.addEventListener('click', () => {
            rootElement.classList.remove('dark');
            localStorage.setItem('colorMode', 'light');
            this.toggleActiveButton(this.lightModeBtn, this.darkModeBtn);
        });
    }

    init() {
        this.setInitialState();
        this.toggleMode();
    }
}
