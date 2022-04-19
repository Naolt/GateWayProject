var addDevice = document.getElementsByClassName("add_device");
var addBtn = document.getElementsByClassName("addButton");
var correctBtn = document.getElementById("correctBtn");
var closeBtn = document.getElementById("closeBtn");
var ListOfDeviceId = document.getElementsByClassName("device_id");
// might change when the button is clicked so might wanna put it into a function
var lastDeviceId = ListOfDeviceId[ListOfDeviceId.length - 1]
    // all devices container
var deviceList = document.getElementsByClassName("device_list");
// first Device  in the devices container if it exists
var firstDevice = document.getElementsByClassName("device");



function add_device() {
    console.log(addDevice)
    addDevice[0].style.display = "flex"
    addBtn[0].style.display = "none"

}

function verify() {
    // var inputId = document.getElementById("tobe_added_Device_id")
    let inputName = document.getElementById("device_name").value;
    let inputSerial = document.getElementById("device_serial").value;
    let inputEntry = document.getElementById("device_entry").value;


}