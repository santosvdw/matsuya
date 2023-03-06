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

function refresh() {
    location.reload();
}

setInterval(refresh, 60000);
