/**
 * Auteur: christopher
 * Date: 23/11/2016
 */

$(function () {

    // Toggle Search Box
    var searchBox = $('.SearchBox');
    var searchIcon = $('#toogle-search');

    searchIcon.click(function () {
       if (searchBox.is(':hidden')) {
           searchBox.removeClass('SearchBox--inactive');
       } else {
           searchBox.addClass('SearchBox--inactive');
       }
    });

    // Select 2 setup

    $('.SearchBox-inputField input').select2();

    // Datepicker

});