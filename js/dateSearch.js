let goButton = document.querySelector('button[name="searchButton"]');
let monthList = document.querySelector('select');
let datePara = document.querySelector('p[name="dateStore"]');

function returnSelected(e)
{
    e.preventDefault();

    var month = monthList.options[monthList.selectedIndex].value;
    datePara.innerHTML = month;
    console.log(datePara);
}

goButton.addEventListener('click', returnSelected);