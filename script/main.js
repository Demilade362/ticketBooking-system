const locale = document.querySelector('#Locale');
const price = document.querySelector('#price');



locale.addEventListener('click', () => {
    if (locale.value === 'Ketu') {
        price.value = 700;
    } else if (locale.value === 'Lekki') {
        price.value = 2000;
    } else if (locale.value === 'Apapa') {
        price.value = 6000;
    } else if (locale.value === 'Ikorodu') {
        price.value = 200;
    } else if (locale.value === 'Victoria-Island') {
        price.value = 4000;
    } else if (locale.value === 'Location-Unset') {
        price.value = 0;
    } else {
        price.value = "You didn't Select Any Location";
    }
})
