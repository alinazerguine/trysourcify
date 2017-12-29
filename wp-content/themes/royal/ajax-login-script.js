jQuery(document).ready(function($) {

    jQuery("#sign-in-button").click(function(e) {
        var user = jQuery("#input-in-email").val();
        var password = jQuery("#input-in-password").val();
        if (user == "") {
            jQuery("#input-in-email").focus();
            return;
        }
        if (password == "") {
            jQuery("#input-in-password").focus();
            return;
        }
        jQuery(this).text("Authorizing Sourcify account...");
        jQuery.ajax({
            type: 'POST',
            dataType: 'json',
            url: '../wp-admin/admin-ajax.php',
            data: {
                'action': 'ajaxlogin', //calls wp_ajax_nopriv_ajaxlogin
                'username': user,
                'password': password
            },
            success: function(data) {
                if (data.login == true) {
                    jQuery("#sign-in-button").text("Success!");
                    if (!chrome.app.isInstalled) {
                        chrome.webstore.install();
                    } else {
                        alert("already Installed!");
                    }
                    // chrome.webstore.install(null, null, () => window.open('https://chrome.google.com/webstore/detail/mgppimcmgneocidmaomcbcidobpkokah', '_blank'));
                } else {
                    alert("Invalid Signin information. Please try again...");
                    jQuery("#sign-in-button").text("SIGN IN");
                    jQuery("#input-in-email").focus();
                }
                // if (data.loggedin == true) {
                //     // alert(data.loggedin);
                //     alert("true");
                //     // document.location.href = jQuery("#redirect-url").val();
                // }
            }
        });
    });
    jQuery("#sign-up-button").click(function(e) {
        var firstname = jQuery("#input-up-fname").val();
        var lastname = jQuery("#input-up-lname").val();
        var username = jQuery("#input-up-email").val();
        var password = jQuery("#input-up-password").val();
        var rpassword = jQuery("#input-up-rpassword").val();
        if (firstname == "" || lastname == "" || username == "" || password == "" || rpassword == "") {
            alert("All fields are requied...");
            jQuery("#input-up-fname").focus();
            return;
        }
        if (password != rpassword) {
            alert("The passwords must match...");
            jQuery("#input-up-password").focus();
            return;
        }
        if (!ValidateEmail(username)) {
            jQuery("#input-up-email").val("");
            jQuery("#input-up-email").focus();
            return;
        }
        jQuery(this).text("Creating Sourcify account...");
        jQuery.ajax({
            type: 'POST',
            dataType: 'json',
            url: '../wp-admin/admin-ajax.php',
            data: {
                'action': 'ajaxsignup', //calls wp_ajax_nopriv_ajaxlogin
                'username': username,
                'firstname': firstname,
                'lastname': lastname,
                'password': password
            },
            success: function(data) {
                if (data.loggedin == true) {
                    jQuery("#sign-up-button").text("Signup Success!");
                    if (!chrome.app.isInstalled) {
                        chrome.webstore.install();
                    } else {
                        alert("already Installed!");
                    }
                    // chrome.webstore.install(null, null, () => window.open('https://chrome.google.com/webstore/detail/mgppimcmgneocidmaomcbcidobpkokah', '_blank'));
                } else {
                    alert("ERROR: " + data.message);
                    jQuery("#sign-up-button").text("SIGN UP FOR FREE");

                }
                // if (data.loggedin == true) {
                //     // alert(data.loggedin);
                //     alert("true");
                //     // document.location.href = jQuery("#redirect-url").val();
                // }
            }
        });
    });
});

function successCallback() {
    window.alert('success');
}

function failureCallback() {
    window.alert('failure');
}

function ValidateEmail(mail) {
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail)) {
        return (true)
    }
    alert("You have entered an invalid email address!")
    return false;
}