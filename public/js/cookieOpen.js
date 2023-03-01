$(document).ready(function() {
    hideCookieBanner();
    function hideCookieBanner() {
        localStorage.setItem("cb_isCookieAccepted", "yes");
        let cookieBanner = document.getElementById("cb-cookie-banner");
        cookieBanner.style.display = "none";
        $.cookie("cookie_save", 1);
    }
});