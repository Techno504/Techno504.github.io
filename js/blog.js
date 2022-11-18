let clearButton = document.querySelector('button[type="reset"]');
let submitButton = document.querySelector('button[type="submit"]');
let title = document.querySelector('input');
let content = document.querySelector('textarea');
let titleNum = 0;
let contentNum = 0;

function confirmClear(e)
{
    var confirmation = window.confirm("Are you sure you want to clear the blog post?");

    if (!confirmation)
    {
        e.preventDefault();
    }
}

function checkNotEmpty(e)
{
    if (title.value==="" && content.value==="")
    {
        title.id='required';
        content.id='required';
        titleNum=1;
        contentNum=1;
        e.preventDefault();
    }
    else if (title.value==="")
    {
        title.id='required';
        titleNum=1;
        e.preventDefault();
    }
    else if (content.value==="")
    {
        content.id='required';
        contentNum=1;
        console.log(contentNum);
        e.preventDefault();
    }

    if (title.value!=="" && titleNum===1)
    {
        title.removeAttribute('id');
        titleNum--;
    }
    else if (content.value!=="" && contentNum===1)
    {
        content.removeAttribute('id');
        contentNum--;
    }
}

clearButton.addEventListener('click', confirmClear);
submitButton.addEventListener('click', checkNotEmpty);