!function ($) {
    "use strict";
    
    if (window.sessionStorage) {
        var alreadyVisited = sessionStorage.getItem("is_visited") || "light-mode-switch";
        applyTheme(alreadyVisited);
    }

    function applyTheme(theme) {
        switch (theme) {
            case "light-mode-switch":
                $("html").removeAttr("dir").attr("data-bs-theme", "light");
                $("#bootstrap-style").attr("href", "/build/css/bootstrap.min.css");
                $("#app-style").attr("href", "/build/css/app.min.css");
                sessionStorage.setItem("is_visited", "light-mode-switch");
                break;
            case "dark-mode-switch":
                $("html").removeAttr("dir").attr("data-bs-theme", "dark");
                $("#bootstrap-style").attr("href", "/build/css/bootstrap.min.css");
                $("#app-style").attr("href", "/build/css/app.min.css");
                sessionStorage.setItem("is_visited", "dark-mode-switch");
                break;
            case "rtl-mode-switch":
                $("#bootstrap-style").attr("href", "/build/css/bootstrap.min.rtl.css");
                $("#app-style").attr("href", "/build/css/app.min.rtl.css");
                $("html").attr("dir", "rtl").attr("data-bs-theme", "light");
                sessionStorage.setItem("is_visited", "rtl-mode-switch");
                break;
            case "dark-rtl-mode-switch":
                $("#bootstrap-style").attr("href", "/build/css/bootstrap.min.rtl.css");
                $("#app-style").attr("href", "/build/css/app.min.rtl.css");
                $("html").attr("dir", "rtl").attr("data-bs-theme", "dark");
                sessionStorage.setItem("is_visited", "dark-rtl-mode-switch");
                break;
            default:
                console.log("Something wrong with the layout mode.");
        }
        // Set the correct checkbox based on the theme
        $("#light-mode-switch").prop("checked", theme === "light-mode-switch");
        $("#dark-mode-switch").prop("checked", theme === "dark-mode-switch");
    }

    $(document).ready(function () {
        const savedTheme = sessionStorage.getItem("is_visited") || "light-mode-switch";
        applyTheme(savedTheme);

        $("#light-mode-switch").on("change", function () {
            applyTheme("light-mode-switch");
        });

        $("#dark-mode-switch").on("change", function () {
            applyTheme("dark-mode-switch");
        });

        $("#rtl-mode-switch").on("change", function () {
            applyTheme("rtl-mode-switch");
        });

        $("#dark-rtl-mode-switch").on("change", function () {
            applyTheme("dark-rtl-mode-switch");
        });
    });
}(window.jQuery);

