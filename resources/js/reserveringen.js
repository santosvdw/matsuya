const showBtn = document.querySelector("#laat-reserveringen-zien");
const hideBtn = document.querySelector("#verberg-reserveringen");
const reservTbl = document.querySelector("#verlopen-reserveringen");
let tblShown = false;

showBtn.addEventListener("click", () => {
    reservTbl.classList.add("show");
    showBtn.classList.add("hide");
    hideBtn.classList.remove("hide");
});

hideBtn.addEventListener("click", () => {
    reservTbl.classList.remove("show");
    hideBtn.classList.add("hide");
    showBtn.classList.remove("hide");
});
const alert = document.querySelector(".alert");
const closeAlert = document.querySelector(".alert-x");

closeAlert.addEventListener("click", () => {
    alert.classList.add("hide-alert");
});

const hide = () => {
    alert.classList.add("hide-alert");
};

setTimeout(hide, 7500);

function refresh() {
    location.reload();
}

setInterval(refresh, 60000);
