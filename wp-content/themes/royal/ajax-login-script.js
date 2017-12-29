jQuery(document).ready(function($) {

    jQuery("#sign-in-button").click(function(e) {
        jQuery(this).text("Authorizing Sourcify account...");
        var user = jQuery("#input-in-email").val();
        var password = jQuery("#input-in-password").val();
        jQuery.ajax({
            type: 'POST',
            dataType: 'json',
            url: '../../wp-admin/admin-ajax.php',
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
                    jQuery("#sign-in-button").text("SIGN IN");
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