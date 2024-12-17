import './bootstrap';
import Alpine from 'alpinejs';
import ThemeSwitcher from './components/ThemeSwitcher';

new ThemeSwitcher();

window.Alpine = Alpine;

Alpine.start();
