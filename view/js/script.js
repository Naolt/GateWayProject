let addDeviceContainer = document.getElementById('form1');

document.getElementById('burgerMenu').addEventListener('click', resize);


function addDevice() {
    addDeviceContainer.style.display = "block";
}

function resize() {
    let links = document.getElementsByClassName('sidenav-link');
    let sidebar = document.getElementsByClassName('sidebar');
    let mainContent = document.getElementsByClassName('header_body');
    let accountInfo = document.getElementsByClassName('user-profile');
    let systemHeader = document.getElementById('system-name');
    let userProfile = document.getElementsByClassName('user-profile');
    let burgerMenu = document.getElementsByClassName("burger-menu-container");
    for (let i = 0; i < links.length; ++i) {
        links[i].classList.toggle('removeLinks');
    }
    sidebar[0].classList.toggle("collapsed-sidebar");
    mainContent[0].classList.toggle('collapsed-header_body');
    userProfile[0].classList.toggle('collapsed-user-profile');
    systemHeader.classList.toggle('collapsed-system-header');
    burgerMenu[0].classList.toggle('collapsed-burger-menu-container');
}