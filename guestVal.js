document.getElementById("myForm").onsubmit = validate;

document.getElementById("mailingList").addEventListener("click", show);


//////////////////BONUS/////////////////////////////////
function show() {
    //make email format buttons visible if checked
    let mList = document.getElementById("mailingList").checked;
    let buttons = document.getElementById("buttons");
    if (mList == true) {
        buttons.style.display = "block";
    } else {
        buttons.style.display = "none";
    }
}

$("#otherShow").hide();
$(function() {    // Makes sure the code contained doesn't run until
    //     all the DOM elements have loaded

    $('#meet').change(function(){
        if ($("#meet").val() == "other") {
            $('#otherShow').show();
        }
    });

});

//////////////////////////////////////////////////////////


function validate(){
    let flag = true; //set flag

    //clear errors in initial
    let errors = document.getElementsByClassName("error");
    for (let i = 0; i < errors.length; i++) {
        errors[i].style.visibility = "hidden";
    }

    //validate first name
    let fName = document.getElementById("firstName").value;
    if(fName == ""){
        let errFirst = document.getElementById("errFName");
        errFirst.style.visibility = "visible";
        flag = false;
    }

    //validate last name
    let lName = document.getElementById("lastName").value;
    if(lName == ""){
        let errLast = document.getElementById("errLName");
        errLast.style.visibility = "visible";
        flag = false;
    }

    //linkedIn URL validation
    let url = document.getElementById("linkedIn").value;
    if(url != "") {
        if (!url.startsWith("https") && !url.endsWith(".com")) {
            let errurl = document.getElementById("errurl");
            errurl.style.visibility = "visible";
            flag = false;
        }
    }

    //check "How we met" is answered
    let meet = document.getElementById("meet").value;
    if(meet == "none"){
        let errMeet = document.getElementById("errMeet");
        errMeet.style.visibility = "visible";
        flag = false;
    }

    //validate email if mailing list is checked
    let email = document.getElementById("email").value;
    let reg = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    let mList = document.getElementById("mailingList").checked;
    if(mList == true && reg.test(email) == false) {
        let errEmail = document.getElementById("errEmail");
        errEmail.style.visibility = "visible";
        let errMail = document.getElementById("errMEmail");
        errMail.style.visibility = "visible";
        flag = false;
    }
    else if(email != ""){
        if(reg.test(email) == false){
            let errEmail = document.getElementById("errEmail");
            errEmail.style.visibility = "visible";
            flag = false;
        }

    }


    return flag;
}