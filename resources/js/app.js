const openBtn = document.querySelector("#open-button");
const closeBtn = document.querySelector("#close-button");
const menuEl = document.querySelector("#nav-tel-menu");

openBtn.addEventListener("click", () => {
    console.log("open");
    menuEl.classList.add("show");
});

closeBtn.addEventListener("click", () => {
    menuEl.classList.remove("show");
    console.log("close");
});

////// Alert

const alert = document.querySelector(".alert");
const closeAlert = document.querySelector(".alert-x");

closeAlert.addEventListener("click", () => {
    alert.classList.add("hide-alert");
});

const hide = () => {
    alert.classList.add("hide-alert");
};

setTimeout(hide, 7500);
