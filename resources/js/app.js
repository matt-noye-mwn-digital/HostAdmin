import './bootstrap';

$(document).ready(function(){

    //Large Screen Specific JS
    if($(window).width() >= 1081) {
        $('button.sidebarToggler').click(function() {
            $('.sidebarWrapper').toggleClass('open', 1000);
            $('.dashboardMainWrapper').toggleClass('full', 1100);
        });
        $('button.sidebarToggler').click(function() {
            $(this).find('i').toggleClass('fa-times fa-bars');
        });
    }

    // Handle the sidebar menu on small screens
    if ($(window).width() <= 1080) {
        $('.sidebarWrapper').removeClass('open');
        $('.dashboardMainWrapper').addClass('full');
        $('button.sidebarToggler').find('i').removeClass('fa-times');
        $('button.sidebarToggler').find('i').addClass('fa-bars');
        $('button.sidebarToggler').click(function() {
            $(this).find('i').toggleClass('fa-bars fa-times')
            $('.sidebarWrapper').toggleClass('open', 1000);
        });
    }

});
