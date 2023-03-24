// import './bootstrap';

const copyright = document.querySelector(".copyright");

copyright.textContent = `Matsuya © ${new Date().getFullYear()}, Alle rechten voorbehouden.`;

const openBtn = document.querySelector("#open-button");
const closeBtn = document.querySelector("#close-button");
const menuEl = document.querySelector("#nav-tel-menu");

openBtn.addEventListener("click", () => {
    menuEl.classList.add("show");
});

closeBtn.addEventListener("click", () => {
    menuEl.classList.remove("show");
});

//
//
//
//
//
//
//
/////// Tijd select

const select = document.querySelector("#tijd");

const datumEl = document.querySelector("#datum");
const tijdEl = document.querySelector("#tijd");

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
    if (today == datumEl.value) {
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

datumEl.addEventListener("input", checkIfToday);

////// Beschikbaarheidcheck

fetch("http://matsuya.test/api/tafels_beschikbaar")
    .then((response) => response.json())
    .then((data) => {
        const { tafels } = data;
        let beschikbaar = false;
        const submitBtn = document.querySelector("#reserveer-submit");
        const errorMsg = document.querySelector("#error-msg-vol");

        const checkForAvailability = () => {
            for (let i = 0; i < tafels.length; i++) {
                const tafels_beschikbaar = tafels[i];
                const { tijd, datum, bezet } = tafels_beschikbaar;

                if (
                    tijd == tijdEl.value &&
                    datum == datumEl.value &&
                    bezet < 20
                ) {
                    available();
                } else if (
                    tijd == tijdEl.value &&
                    datum == datumEl.value &&
                    bezet >= 20
                ) {
                    available(false, bezet);
                }
            }
        };

        const available = (beschikbaar, bezet) => {
            if (beschikbaar === undefined) {
                submitBtn.disabled = false;
                submitBtn.classList.remove("button-red");
                submitBtn.classList.add("button-green");
                errorMsg.innerHTML = "";
            } else {
                submitBtn.disabled = true;
                submitBtn.classList.add("button-red");
                submitBtn.classList.remove("button-green");
                errorMsg.textContent =
                    "Het restaurant zit op dat moment volgeboekt. Probeer een ander tijdstip of een andere dag.";
                datumEl.value = "0000-00-00";
                setTimeout(available, 5000);
            }
        };

        datumEl.addEventListener("input", checkForAvailability);
        tijdEl.addEventListener("input", checkForAvailability);
    })
    .catch((error) => console.error(error));

//
//
//
//
//
//
//
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
