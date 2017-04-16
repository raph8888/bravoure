$(document).ready(function () {
    // This WILL work because we are listening on the 'document',
    // for a click on an element with an ID of #test-element
    $(document).on("click", ".menu_icon_img", function () {
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