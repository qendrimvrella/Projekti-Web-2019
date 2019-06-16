$(document).ready(function() {
    
    $("#signup-form").submit(function(event) {

        event.preventDefault();

        var name = $("#name").val();
        var surname = $("#surname").val();
        var email = $("#email").val();
        var password = $("#password").val();
        var passwordRepeat = $("#passwordRepeat").val();
        var gender = '';
        if ($("#genderM").prop('checked')){
            gender = $("#genderM").val();
        }else if ($("#genderF").prop('checked')) {
            gender = $("#genderF").val();
        }
        var country = $("#country").val();
        var birthday = $("#birthday").val();
        var submit = $("#signup-submit-id").val();

        $("#form-message").load("./includes/signup.inc.php", {
            name: name,
            surname: surname,
            email: email,
            password: password,
            passwordRepeat: passwordRepeat,
            gender: gender,
            country: country,
            birthday: birthday,
            submit: submit
        });
    });
});

