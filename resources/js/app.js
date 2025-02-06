import "./bootstrap";

document.addEventListener("DOMContentLoaded", function () {
    const currentUrl = window.location.pathname;

    const navLinks = document.querySelectorAll(".nav-link");

    navLinks.forEach((link) => {
        if (link.getAttribute("href") === currentUrl) {
            link.classList.add("active-link");
        }
    });
});
