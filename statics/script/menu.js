/**
 * Auteur: christopher
 * Date: 21/11/2016
 * Effet & Responsiveness du menu principal
 */

$(function () {
    var menu = $('.Navbar');
    var items = $('.Navbar-items');
    var burger = $('.Navbar-burger');

    var areItemsActive = false;

    burger.click(function () {
       if (areItemsActive) {
           items.removeClass('Navbar-items--active');
           burger.removeClass('Navbar-burger--active');

           areItemsActive = false;
       } else {
           items.addClass('Navbar-items--active');
           burger.addClass('Navbar-burger--active');

           areItemsActive = true;
       }
    });

    $('body').scrollspy({
        min: 100,
        max: 1000000,
        onEnter: function() {
            menu.addClass('Navbar--grown');
        },
        onLeave: function() {
            menu.removeClass('Navbar--grown');
        }
    });

});