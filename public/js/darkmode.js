// Function to set the theme based on the stored mode
function setTheme(mode) {
    var themeIcon = document.getElementById("themeIcon");
    var body = document.getElementsByTagName("body")[0];

    if (mode === "dark") {
        themeIcon.setAttribute("class", "bi bi-moon-stars-fill theme-icon-active");
        themeIcon.setAttribute("data-theme-icon-active", "bi-moon-stars-fill");
        body.classList.add("dark-mode");
    } else {
        themeIcon.setAttribute("class", "bi bi-sun-fill theme-icon-active");
        themeIcon.setAttribute("data-theme-icon-active", "bi-sun-fill");
        body.classList.remove("dark-mode");
    }
}

// Check if the mode is stored in localStorage
var savedMode = localStorage.getItem("themeMode");
if (savedMode) {
    setTheme(savedMode);
}

function toggleTheme() {
    var themeIcon = document.getElementById("themeIcon");
    var body = document.getElementsByTagName("body")[0];

    if (themeIcon.getAttribute("data-theme-icon-active") === "bi-sun-fill") {
        themeIcon.setAttribute("class", "bi bi-moon-stars-fill theme-icon-active");
        themeIcon.setAttribute("data-theme-icon-active", "bi-moon-stars-fill");
        body.classList.add("dark-mode");
        localStorage.setItem("themeMode", "dark"); // Save dark mode to localStorage
    } else {
        themeIcon.setAttribute("class", "bi bi-sun-fill theme-icon-active");
        themeIcon.setAttribute("data-theme-icon-active", "bi-sun-fill");
        body.classList.remove("dark-mode");
        localStorage.setItem("themeMode", "light"); // Save light mode to localStorage
    }
}
