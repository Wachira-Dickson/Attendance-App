function tryLogin() {
    let un = $("#txtUsername").val();
    let pw = $("#txtPassword").val();

    if (un.trim() !== "" && pw.trim() !== "") {
        $.ajax({
            url: "ajaxhandler/loginAjax.php",
            type: "POST",
            dataType: "json",
            data: {
                user_name: un,
                password: pw,
                action: "verifyUser"
            },
            beforeSend: function () {
                // Optional: show loader or disable button
                    $("#diverror").removeClass("applyerrordiv");
                    $("#lockscreen").addClass("applylockscreen");
                    //$("#errormessage").text("");
            },
            success: function (rv) {
                if (rv.status === "ALL OK") {
                    alert("Login successful!");
                    window.location.href = "attendance.php"; // ✅ Your desired page
                } else {
                    //alert(rv.status);
                    $("#diverror").addClass("applyerrordiv");
                    $("#lockscreen").addClass("applylockscreen");
                    $("#errormessage").text(rv['status']);
                }
            },
            error: function (xhr, status, error) {
                alert("AJAX Error: " + status + "\n" + error);
            }
        });
    } else {
        alert("Username and password must not be empty.");
    }
}

$(document).ready(function () {
    $(document).on("keyup", "input", function () {
        $("#diverror").removeClass("applyerrordiv");
        //$("#errormessage").text("");

        let un = $("#txtUsername").val();
        let pw = $("#txtPassword").val();

        if (un.trim() !== "" && pw.trim() !== "") {
            $("#btnLogin")
                .removeClass("inactivecolor")
                .addClass("activecolor")
                .prop("disabled", false);
        } else {
            $("#btnLogin")
                .removeClass("activecolor")
                .addClass("inactivecolor")
                .prop("disabled", true);
        }
    });

    $("#btnLogin").on("click", function () {
        tryLogin();
    });
});
