function loadJS(file) {
    var jsElm = document.createElement("script"); // DOM: Create the script element
    jsElm.type = "application/javascript"; // set the type attribute
    jsElm.src = file; // make the script element load file
    document.body.appendChild(jsElm); // finally insert the element to the body element in order to load the script
}

function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

function isCharacter(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if ((charCode > 96 && charCode < 123) || (charCode > 64 && charCode < 91) || charCode == 32 || charCode == 9 || charCode == 8 || charCode == 46 || charCode == 37 || charCode == 39) {
        return true;
    }
    return false;

    /*
     Here 
     
     32 is ASCII Code Of 'SPACE'
     9 is ASCII Code Of 'TAB'
     46 is ASCII Code Of 'DEL'
     37 is ASCII Code Of 'LEFT ARROW KEY'
     93 is ASCII Code Of 'RIGHT ARROW KEY'
     
     */
}