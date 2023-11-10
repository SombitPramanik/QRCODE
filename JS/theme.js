// Detect the user's browser preference for light or dark mode
const themeSwitcher = document.getElementById("theme-switcher");

if (window.matchMedia) {
    if (window.matchMedia("(prefers-color-scheme: dark)").matches) {
        // User prefers dark mode
        themeSwitcher.classList.remove("light-theme");
        themeSwitcher.classList.add("dark-theme");
    }
}
