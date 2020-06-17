/*=========================================================================================
    File Name: wizard-steps.js
    Description: wizard steps page specific js
    ----------------------------------------------------------------------------------------
    Item Name: Apex - Responsive Admin Theme
    Version: 1.0
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

// Wizard tabs with icons setup
$(document).ready( function(){
    $(".icons-tab-steps").steps({
        headerTag: "h6",
        bodyTag: "fieldset",
        transitionEffect: "fade",
        titleTemplate: '<span class="step">#index#</span> #title#',
        labels: {
            finish: 'Save'
        },
        onFinished: function (event, currentIndex) {
            var data = $('.icons-tab-steps').serialize();
            $.ajax({
            type: 'POST',
            url: "/notadinas/tambah",
            data: data,
            success: function() {
                alert("Data Berhasil Disimpan.");
            }
        });
            
        }
    });

    // To select event date
    $('.pickadate').pickadate();
 });