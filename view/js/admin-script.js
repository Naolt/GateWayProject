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