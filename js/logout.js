$(document).ready(function () {
    $(document).on("click", "#btnLogout", function () {
        $.ajax({
            url: "ajaxhandler/logoutAjax.php",
            type: "POST",
            dataType: "json",
            data: { action: "logout" },
            success: function (response) {
                if (response.status === "LOGGED OUT") {
                    alert("You have been logged out.");
                    window.location.href = "login.php"; // Redirect to login
                } else {
                    alert("Logout failed: " + response.status);
                }
            },
            error: function () {
                alert("An error occurred while logging out.");
            }
        });
    });
});
