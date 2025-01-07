import ThemeSwitcher from './components/ThemeSwitcher';

new ThemeSwitcher();

document.addEventListener("livewire:navigated", () => {
    // Add data-scroll-x to body:
    document.body.setAttribute("data-scroll-x", window.scrollX);
});
