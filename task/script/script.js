$(document).ready(function(){
    var name = /^[a-zA-Z]+$/;
    var email_pattern = /^[a-z]+[a-z0-9._]+@[a-z]+\.[a-z]{2,5}$/;
    var phone_pattern = /^[0-9]+$/;
    $("#submit").click(function(){
        var fname = $("#fname").val();
        var lname = $("#lname").val();
        var email = $("#email").val();
        var phone = $("#phone").val();
        if(!fname.match(name)){
            swal({
                title: "Oh,No!",
                text: "Please enter valid first name",
                icon: "warning",
            })
            return false;
        }
        if(!lname.match(name)){
            swal({
                title: "Oh,No!",
                text: "Please enter valid last name",
                icon: "warning",
            })
            return false;
        }
        if(!email.match(email_pattern)){
            swal({
                title: "Oh,No!",
                text: "Please enter valid email",
                icon: "warning",
            })
            return false;
        }
        if(!phone.match(phone_pattern)){
            swal({
                title: "Oh,No!",
                text: "Please enter valid phone",
                icon: "warning",
            })
            return false;
        }
    });
});