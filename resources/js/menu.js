const alert = document.querySelector(".alert");
const closeAlert = document.querySelector(".alert-x");

closeAlert.addEventListener("click", () => {
    alert.classList.add("hide-alert");
});

const hide = () => {
    alert.classList.add("hide-alert");
};

setTimeout(hide, 7500);
