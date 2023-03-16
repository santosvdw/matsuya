// import './bootstrap';

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

/////// Tijd select

const select = document.querySelector("#tijd");

let datum = document.querySelector("#datum");

// const selectedDatum = new Date(datum.value);

let today = new Date();

let todayMonth = today.getMonth() + 1;
if (todayMonth < 10) {
    todayMonth = `0${todayMonth}`;
}

let todayDate = today.getDate();
if (todayDate < 10) {
    todayDate = `0${todayDate}`;
}

const todayHour = today.getHours();

today = `${today.getFullYear()}-${todayMonth}-${todayDate}`;

const checkIfToday = () => {
    if (today == datum.value) {
        if (todayHour < 11) {
            select.innerHTML = `
            <option name="12:30-15:00" id="12:30-15:00" value="12:30-15:00">12:30-15:00</option>
            <option name="15:00-17:30" id="15:00-17:30" value="15:00-17:30">15:00-17:30</option>
            <option name="17:30-20:00" id="17:30-20:00" value="17:30-20:00">17:30-20:00</option>
            <option name="20:00-22:30" id="20:00-22:30" value="20:00-22:30">20:00-22:30</option>
            `;
        } else if (todayHour >= 20) {
            select.innerHTML = `
                <optgroup label="Je kunt vandaag niet meer reserveren."></optgroup>
                `;
        } else if (todayHour >= 17) {
            select.innerHTML = `
                <option name="20:00-22:30" id="20:00-22:30" value="20:00-22:30">20:00-22:30</option>
                `;
        } else if (todayHour >= 15) {
            select.innerHTML = `
                <option name="17:30-20:00" id="17:30-20:00" value="17:30-20:00">17:30-20:00</option>
                <option name="20:00-22:30" id="20:00-22:30" value="20:00-22:30">20:00-22:30</option>
                `;
        } else if (todayHour >= 13) {
            select.innerHTML = `
                <option name="15:00-17:30" id="15:00-17:30" value="15:00-17:30">15:00-17:30</option>
                <option name="17:30-20:00" id="17:30-20:00" value="17:30-20:00">17:30-20:00</option>
                <option name="20:00-22:30" id="20:00-22:30" value="20:00-22:30">20:00-22:30</option>
                `;
        } else {
            select.innerHTML = `
            <option name="15:00-17:30" id="15:00-17:30" value="15:00-17:30">15:00-17:30</option>
            <option name="17:30-20:00" id="17:30-20:00" value="17:30-20:00">17:30-20:00</option>
            <option name="20:00-22:30" id="20:00-22:30" value="20:00-22:30">20:00-22:30</option>
            `;
        }
    } else {
        select.innerHTML = `
        <option name="12:30-15:00" id="12:30-15:00" value="12:30-15:00">12:30-15:00</option>
        <option name="15:00-17:30" id="15:00-17:30" value="15:00-17:30">15:00-17:30</option>
        <option name="17:30-20:00" id="17:30-20:00" value="17:30-20:00">17:30-20:00</option>
        <option name="20:00-22:30" id="20:00-22:30" value="20:00-22:30">20:00-22:30</option>
        `;
    }
};

select.innerHTML = `
    <option name="12:30-15:00" id="12:30-15:00" value="12:30-15:00">12:30-15:00</option>
    <option name="15:00-17:30" id="15:00-17:30" value="15:00-17:30">15:00-17:30</option>
    <option name="17:30-20:00" id="17:30-20:00" value="17:30-20:00">17:30-20:00</option>
    <option name="20:00-22:30" id="20:00-22:30" value="20:00-22:30">20:00-22:30</option>
`;
// window.onload(checkIfToday());

// setInterval(checkIfToday, 1000);
datum.addEventListener("input", checkIfToday);

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

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();
