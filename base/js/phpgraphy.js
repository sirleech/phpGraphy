
function switch_display(id)
{
        document.getElementById(id).style.display = (document.getElementById(id).style.display=='none') ? 'block' : 'none';
}

function switch_display_on(id)
{
        document.getElementById(id).style.display = 'block';
}

function switch_display_off(id)
{
        document.getElementById(id).style.display = 'none';
}


function isEmpty(id)
{

    if (document.getElementById(id).value == "") {
        return true
    } else {
        return false
    }
}

function checkUploadField(warningTxt)
{

    if (isEmpty('firstpicturefield')) {

        document.uploadfields.submit()

    } else {

        if(confirm(warningTxt)) {
            document.uploadfields.submit()
        }
    }

}

