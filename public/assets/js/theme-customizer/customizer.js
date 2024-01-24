(function (){})();

//live customizer js
$(document).ready(function () {
     
    $("#notes").click(function () {
       if(!$(".notes-container").hasClass('open'))
       {
        $(".notes-container").addClass("open");
        $("#notes").addClass("active");
       }else
       {
        $(".notes-container").removeClass("open");
        $("#notes").removeClass("active");
       }
    });

        
    $("#fields").click(function () {
        if(!$(".fields").hasClass('open'))
        {
         $(".fields").addClass("open");
        
        }else
        {
         $(".fields").removeClass("open");
        
        }
     });

    $(".close-customizer-btn").on('click', function () {
        $(".floated-customizer-panel").removeClass("active");
        $(".customizer-contain").removeClass("open");
        $("#notes").removeClass("active");
    });

    $(".customizer-contain .icon-close").on('click', function () {
        $(".customizer-contain").removeClass("open");
        $("#notes").removeClass("active");
    });
});