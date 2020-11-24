openMENU = document.querySelector(".header-container__burger");
menuMOBILE = document.querySelector(".mobile-menu");
closeMENU = document.querySelector(".mobile-center__close");

openMENU.onclick = function() {
    menuMOBILE.classList.remove("hide");
}

closeMENU.onclick = function() {
    menuMOBILE.classList.add("hide");
}