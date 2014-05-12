

$(function() {
    "use strict";
   
    $(".connectedSortable").sortable({
        placeholder: "sort-highlight",
        connectWith: ".connectedSortable",
        handle: ".box-header, .nav-tabs",
        forcePlaceholderSize: true,
        zIndex: 999999
    }).disableSelection();
    $(".box-header, .nav-tabs").css("cursor","move");
    
    $(".todo-list").sortable({
        placeholder: "sort-highlight",
        handle: ".handle",
        forcePlaceholderSize: true,
        zIndex: 999999
    }).disableSelection();;
  
    $(".textarea").wysihtml5();

    $(".knob").knob();
  
    $(".todo-list").todolist({
        onCheck: function(ele) {
         
        },
        onUncheck: function(ele) {
           
        }
    });

});