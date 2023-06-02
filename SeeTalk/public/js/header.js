let nav_links = document.querySelector(".menu").childNodes;
let menu = document.querySelector(".menu");
let menu_button = document.querySelector(".menu-button");
let mobile = document.querySelector(".mobile");

for (let i = 1; i < 10; i += 2) {
  if (window.location.href == nav_links[i].href) {
    nav_links[i].classList.toggle("active");
  }
}

menu_button.addEventListener("click", function () {
  menu.classList.toggle("active");
  menu_button.classList.toggle("active");
});
