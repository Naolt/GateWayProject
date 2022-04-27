var createbtn = document.getElementById('create-account-btn');
var closebtn = document.getElementById('close-btn')
var createbox = document.getElementsByClassName('create-account-container')[0]
console.log(createbtn)

createbtn.addEventListener('click', openContainer);
closebtn.addEventListener('click', close)


function openContainer() {
    createbox.style.display = 'flex'
}

function close() {
    createbox.style.display = 'none'
}

function openmenu(id) {
    document.getElementById(id).parentNode.children[1].style.display = 'inline-block';
}

function closemenu(id) {
    console.log(document.getElementById(id))
    document.getElementById(id).style.display = 'none'
}


//  live searching]

function getStd(val) {
    let type = document.getElementById('searchby').value;
    var typeNvalue = {
        'type': type,
        'value': val
    }
    var typeNvalueJson = JSON.stringify(typeNvalue);
    console.log(typeof(typeNvalueJson));

    $student = "";
    if (val == "") {
        //  do nothing
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                for (let i = 0; i < document.getElementsByClassName('list-content').length; ++i) {
                    document.getElementsByClassName('list-content')[i].style.display = "none";
                }
                document.getElementsByClassName('list-content-container')[0].innerHTML = this.responseText;

            }
        };
        xmlhttp.open("GET", "../../controller/getStudent.php?q=" + "isempty", true);
        xmlhttp.send();
    } else {
        // create an httpreqest obj
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                for (let i = 0; i < document.getElementsByClassName('list-content').length; ++i) {
                    document.getElementsByClassName('list-content')[i].style.display = "none";
                }
                document.getElementsByClassName('list-content-container')[0].innerHTML = this.responseText;

            }
        };
        xmlhttp.open("GET", "../../controller/getStudent.php?q=" + typeNvalueJson, true);
        xmlhttp.send();
    }


}

function viewProfile(id) {
    console.log(id);
    let realid = id.substring(0, id.length - 1);
    document.cookie = "realid=" + realid + " path=/";
    window.location = '../../controller/view-profile.php';
}

function setAction(action, id) {
    let selecttag = "select-" + id.substring(5);
    console.log(id + " " + selecttag);
    document.getElementById(selecttag).value = action;
    document.getElementById(id).submit();
}