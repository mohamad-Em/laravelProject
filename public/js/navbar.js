// select the actual navbar
let navbarItems = document.querySelectorAll(".nav-btn");
let href = location.href;

navbarItems.forEach((navbarItem) => {
  if (href.includes(navbarItem.getAttribute("href"))) {
      navbarItem.classList.add("active");
  }
});

//control of the navbar hide / show
let barIcon = document.querySelector(".header-sec .icon i");
let navbar = document.querySelector(".navbar-container");
barIcon.onclick = () => {
  if (navbar.classList.contains("active")) {
    navbar.classList.remove("active");
  } else {
    navbar.classList.add("active");
  }
};
