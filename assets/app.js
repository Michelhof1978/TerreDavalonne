/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';
import './styles/bootstrap/js/bootstrap.bundle.min'
import Filter from './modules/Filter'
import {Datepicker} from 'vanillajs-datepicker'
import fr from "vanillajs-datepicker/locales/fr";
new Filter(document.querySelector('.js-filter'))

/*              DATAPICKER              */

const getDatePickerTitle = elem => {
    // From the label or the aria-label
    const label = elem.nextElementSibling;
    let titleText = '';
    if (label && label.tagName === 'LABEL') {
        titleText = label.textContent;
    } else {
        titleText = elem.getAttribute('aria-label') || '';
    }
    return titleText;
}

const elem = document.querySelector('.datepicker_input');
const datepicker = new Datepicker(elem, {
    locale: 'fr',
    'format': 'mm/dd/yyyy', // UK format
    autohide: true,
    title: getDatePickerTitle(elem),
    clearBtn: true,
    defaultViewDate: '',
    todayBtn: true,
});
if (elem.value.length !== 0){

}
elem.addEventListener('click', () => {
    console.log('ff')
})

function displayContent(event, contentNameID) {

    let content = document.getElementsByClassName("contentClass");
    let totalCount = content.length;

// Loop through the content class
// and hide the tabs first
    for (let count = 0; count < totalCount; count++) {
        content[count].style.display = "none";
    }

    let links = document.getElementsByClassName("linkClass");
    let totalLinks;
    totalLinks = links.length;

// Loop through the links and
// remove the active class
    for (let count = 0; count < totalLinks; count++) {
        links[count].classList.remove("active");
    }

// Display the current tab
    document.getElementById(contentNameID).style.display = "block";

// Add the active class to the current tab
    event.currentTarget.classList.add("active");
}
