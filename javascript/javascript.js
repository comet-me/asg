
// I use timer to auto hide the notification
$(document).ready(function() {
    setTimeout(function() {
    $(".alert").remove();
    }, 2500);
    })