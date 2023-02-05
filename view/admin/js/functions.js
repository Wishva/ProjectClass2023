$(document).ready(function () {

    //-------------------------------------------------Employee Registration-------------------------------------------

    //refer the form fields 
    let empFnameField = $("#empFirstName");
    let empLnameField = $("#empLastName");
    let empNICField = $("#empNIC");
    let empPhoneField = $("#empPhone");
    let empEmailField = $("#empEmail");
    let empAddressField = $("#empAddress");
   
    $("#empRegistrationForm").submit(function (event) {

        //prevent default events happen when submitting the document 
        event.preventDefault();

        //get the fields values 
        let empFname = empFnameField.val();
        let empLname = empLnameField.val();
        let empNIC = empNICField.val();
        let empPhone = empPhoneField.val();
        let empEmail = empEmailField.val();
        let empAddress = empAddressField.val();

        //error fields 
        let empFnameErrorField = $("#empFirstNameHelp");
        let empLnameErrorField = $("#empLastNameHelp");
        let empNICErrorField = $("#empNICHelp");
        let empPhoneErrorField = $("#empPhoneHelp");
        let empEmailErrorField = $("#empEmailHelp");
        let empAddressErrorField = $("#empAddressHelp");

        $.ajax({
            type: "POST",
            url: "../../controller/EmpDataValidator.php",
            data: {checkEmpRegFlag:1, empFname:empFname, empLname:empLname, empNIC:empNIC, empPhone:empPhone, empEmail:empEmail, empAddress:empAddress},
            success: function (response) {
                console.log(response);
                if(response.includes("invalid first name")){
                    empFnameErrorField.html("Invalid first name");
                    empFnameField.addClass("errorField");
                }
                if(response.includes("invalid last name")){
                    empLnameErrorField.html("Invalid last name");
                    empLnameField.addClass("errorField");
                }
                if(response.includes("invalid NIC")){
                    empNICErrorField.html("Invalid NIC");
                    empNICField.addClass("errorField");
                }
                if(response.includes("invalid Phone")){
                    empPhoneErrorField.html("Invalid Phone");
                    empPhoneField.addClass("errorField");
                }
                if(response.includes("invalid Email")){
                    empEmailErrorField.html("Invalid Email");
                    empEmailField.addClass("errorField");
                }
                if(response.includes("invalid Address")){
                    empAddressErrorField.html("Invalid Address");
                    empAddressField.addClass("errorField");
                }
            }           
        });


    });



});