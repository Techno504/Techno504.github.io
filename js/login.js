let submitButton = document.querySelector('button[type="submit"]');
let email = document.querySelector('input[type="email"]');
let password = document.querySelector('input[type="submit"]');
let emailNum = 0;
let passwordNum = 0;

function checkNotEmpty(e)
{
    if (email.value==="" && password.value==="")
    {
        email.id='required';
        password.id='required';
        emailNum=1;
        passwordNum=1;
        e.preventDefault();
    }
    else if (email.value==="")
    {
        email.id='required';
        emailNum=1;
        e.preventDefault();
    }
    else if (password.value==="")
    {
        password.id='required';
        passwordNum=1;
        console.log(passwordNum);
        e.preventDefault();
    }

    if (email.value!=="" && emailNum===1)
    {
        email.removeAttribute('id');
        emailNum=0;
    }
    else if (password.value!=="" && passwordNum===1)
    {
        password.removeAttribute('id');
        passwordNum=0;
    }
}

submitButton.addEventListener('click', checkNotEmpty);