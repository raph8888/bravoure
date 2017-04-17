$(document).ready(function () {

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

    $(".mobile_menu_icon").hover(function(){
        $(".overlay").show( "slow", function() {
            // Animation complete.
        });
        $(".menu_rectangle").show( "slow", function() {
            // Animation complete.
        });
        $(".menu_mobile_links_list").show( "slow", function() {
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