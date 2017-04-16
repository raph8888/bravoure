$(document).ready(function () {
    // This WILL work because we are listening on the 'document',
    // for a click on an element with an ID of #test-element
    $(document).on("click", ".mobile_menu_icon", function () {
        $(".overlay").toggle( "slow", function() {
            // Animation complete.
        });
        $(".menu_rectangle").toggle( "slow", function() {
            // Animation complete.
        });
        $(".menu_mobile_links_list").toggle( "slow", function() {
            // Animation complete.
        });
    });
    $(document).on("click", ".overlay", function () {
        $(".overlay").toggle( "slow", function() {
            // Animation complete.
        });
        $(".menu_rectangle").toggle( "slow", function() {
            // Animation complete.
        });
        $(".menu_mobile_links_list").toggle( "slow", function() {
            // Animation complete.
        });
    });
});