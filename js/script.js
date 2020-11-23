openMENU = document.querySelector(".header-container__burger");
menuMOBILE = document.querySelector(".mobile-menu");
closeMENU = document.querySelector(".mobile-center__close");

openLOGIN = document.querySelectorAll(".auth");
openREG = document.querySelector(".login__yet")
menuLOGIN = document.querySelector(".login");
menuREG = document.querySelector(".reg");
openLOGIN2 = document.querySelector(".reg__yet");

closeREG = document.querySelector(".reg-center__close");
closeLOGIN = document.querySelector(".login-center__close");

openLOGIN.forEach(function(Item) {
    Item.onclick = function() {
        menuLOGIN.classList.remove("hide");
    }
});

openLOGIN2.onclick = function() {
    menuREG.classList.add('hide');
    menuLOGIN.classList.remove("hide");
}

openREG.onclick = function() {
    menuREG.classList.remove('hide');
    menuLOGIN.classList.add("hide");
}

closeREG.onclick = function() {
    menuREG.classList.add('hide');
}

closeLOGIN.onclick = function() {
    menuLOGIN.classList.add('hide');
}

openLOGIN.forEach(function(Item) {
    Item.onclick = function() {
        menuLOGIN.classList.remove("hide");
    }
});

openMENU.onclick = function() {
    menuMOBILE.classList.remove("hide");
}

closeMENU.onclick = function() {
    menuMOBILE.classList.add("hide");
}