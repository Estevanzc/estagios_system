const menu_button = document.getElementById("hamburguer-menu")
const nav_links = document.getElementById("nav-links")

menu_button.addEventListener("click", () => {
    nav_links.classList.toggle("active")
})