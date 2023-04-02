$(document).ready(function () {

    //-------------------------------------------------Employee Registration-------------------------------------------

    //refer the form fields 
    let empFnameField = $("#empFirstName");
    let empLnameField = $("#empLastName");
    let empNICField = $("#empNIC");
    let empPhoneField = $("#empPhone");
    let empEmailField = $("#empEmail");
    let empAddressField = $("#empAddress");
    let empRoleInfo = $("#empRole");

    //error fields 
    let empFnameErrorField = $("#empFirstNameHelp");
    let empLnameErrorField = $("#empLastNameHelp");
    let empNICErrorField = $("#empNICHelp");
    let empPhoneErrorField = $("#empPhoneHelp");
    let empEmailErrorField = $("#empEmailHelp");
    let empAddressErrorField = $("#empAddressHelp");

    //fetch the employee role
    function getEmpRoleInfo()
    {
        let viewSup = 1;
        empRoleInfo.empty();
        empRoleInfo.append("<option>Loading......</option>");
        $.ajax({
            type: "POST",
            data:{viewSup},
            url: "../../controller/EmpRoleController.php",
            dataType: "json",
            success: function (data) {
                empRoleInfo.empty();
                empRoleInfo.append("<option value='0'> -- Select Suitable Role --");
                $.each(data, function (i) {
                    empRoleInfo.append('<option value="' + data[i].roleId + '">' + data[i].roleName +'</option>');
                });
            },
            complete: function () {
            }
        });

    }
    getEmpRoleInfo();
   
    $("#empRegistrationForm").submit(function (event) {

        //prevent default events when submitting the document 
        event.preventDefault();

        //get the fields values 
        let empFname = empFnameField.val();
        let empLname = empLnameField.val();
        let empNIC = empNICField.val();
        let empPhone = empPhoneField.val();
        let empEmail = empEmailField.val();
        let empAddress = empAddressField.val();
        let empRole =  empRoleInfo.val();

        $.ajax({
            type: "POST",
            url: "../../controller/EmpDataValidator.php",
            data: {checkEmpRegFlag:1, empFname:empFname, empLname:empLname, empNIC:empNIC, empPhone:empPhone, empEmail:empEmail, empAddress:empAddress, empRole:empRole},
            success: function (response) {
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
                if(response.includes("invalid Role")){
                    empRoleInfo.addClass("errorField");
                }
                if(response.includes("successfully added")){
                    $.confirm({
                        title: 'Employee Registered!',
                        content: 'The new password will be the NIC',
                        type: 'green',
                        typeAnimated: true,
                        buttons: {
                            close: function () {
                            }
                        }
                    });
                }
                if(response.includes("technicalError")){
                    $.confirm({
                        title: 'Technical error occurred',
                        content: 'Please contact the technical team',
                        type: 'red',
                        typeAnimated: true,
                        buttons: {
                            close: function () {
                            }
                        }
                    });
                }
            }           
        });

    });

    //function for remove errors or add errors click submit
    function addRemoveErrors(inputField,errorField)
    {
        inputField.keypress(function () {
            inputField.removeClass("errorField");
            errorField.removeClass("errorText").html("");
        });

        inputField.keypress(function () {
            inputField.keyup(function () {
                if (inputField.val()) {
                    inputField.removeClass("errorField");
                    errorField.removeClass("errorText").html("");
                    inputField.css("border-color","");
                } else {
                    inputField.addClass("errorField");
                    errorField.addClass("errorText").html("Please fill this field");
                }
            });
        });
    }

    addRemoveErrors(empFnameField, empFnameErrorField);
    addRemoveErrors(empLnameField, empLnameErrorField);
    addRemoveErrors(empNICField, empNICErrorField);
    addRemoveErrors(empPhoneField, empPhoneErrorField);
    addRemoveErrors(empEmailField, empEmailErrorField);
    addRemoveErrors(empAddressField, empAddressErrorField);

    //remove errors of the emp role field
    empRoleInfo.change(function (e) { 
       if($(this).val() > 0){
            $(this).removeClass("errorField");
       }
    });

    //clear button
    $("#empRegClearButton").on("click", function () {
        empFnameField.removeClass("errorField");
        empFnameErrorField.removeClass("errorText").html("");
        empLnameField.removeClass("errorField");
        empLnameErrorField.removeClass("errorText").html("");
        empNICField.removeClass("errorField");
        empNICErrorField.removeClass("errorText").html("");
        empPhoneField.removeClass("errorField");
        empPhoneErrorField.removeClass("errorText").html("");
        empEmailField.removeClass("errorField");
        empEmailErrorField.removeClass("errorText").html("");
        empAddressField.removeClass("errorField");
        empAddressErrorField.removeClass("errorText").html("");
        empRoleInfo.removeClass("errorField");
    });

    //-------------------------------------------------Employee Login-------------------------------------------

    let empLoginButton = $("#empLoginButton");

    let empLoginEmail = $("#empLoginEmail");
    let empLoginPassword = $("#empLoginPassword");

    empLoginButton.on("click",  function () { 
        let empLoginEmailVal = empLoginEmail.val();
        let empLoginPasswordVal = empLoginPassword.val();
        $.ajax({
            type: "POST",
            data:{empLoginCheck:1, empLoginEmailVal:empLoginEmailVal, empLoginPasswordVal:empLoginPasswordVal},
            url: "../../controller/EmpLoginController.php",
            success: function (response) {
                if(response.includes("wrongPassword")){
                    $.confirm({
                        title: 'Oops!',
                        content: 'Please check the password again',
                        type: 'red',
                        typeAnimated: true,
                        buttons: {
                            close: function () {
                            }
                        }
                    });
                }
                if(response.includes("wrongEmail")){
                    $.confirm({
                        title: 'Oops!',
                        content: 'Please check the email again',
                        type: 'red',
                        typeAnimated: true,
                        buttons: {
                            close: function () {
                            }
                        }
                    });
                }
                if(response.includes("systemError")){
                    $.confirm({
                        title: 'Technical error occurred ',
                        content: 'Please contact the developer',
                        type: 'red',
                        typeAnimated: true,
                        buttons: {
                            close: function () {
                            }
                        }
                    });
                }
                if(response.includes("admin")){
                    window.location.href = 'admin.php';
                }
                if(response.includes("manager")){
                    window.location.href = 'manager.php';
                }
            }
        });

     });

});

