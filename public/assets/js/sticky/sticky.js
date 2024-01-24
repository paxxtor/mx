'use strict';
(function($){

    $.fn.autogrow = function(options)
    {
        return this.filter('.notes').each(function()
        {
            var self         = this;
            var $self        = $(self);
            var minHeight    = $self.height();
            var noFlickerPad = $self.hasClass('autogrow-short') ? 0 : parseInt($self.css('lineHeight')) || 0;
            var shadow = $('<div></div>').css({
                position:    'absolute',
                top:         -10000,
                left:        -10000,
                width:       $self.width(),
                fontSize:    $self.css('fontSize'),
                fontFamily:  $self.css('fontFamily'),
                fontWeight:  $self.css('fontWeight'),
                lineHeight:  $self.css('lineHeight'),
                resize:      'none',
                'word-wrap': 'break-word'
            }).appendTo(document.body);
            var update = function(event)
            {
               console.log(self.dataset.id);
                if(self.dataset.id != '')
                {
                    var datos = {note_id:self.dataset.id ,cl:self.className,val:self.value}
                    $.post(url+"admin/notes/updateNote", datos, function(respuesta) {
                        // Función a ejecutar después de que la solicitud se haya completado exitosamente
                    });
                }
               
                var times = function(string, number)
                {
                    for (var i=0, r=''; i<number; i++) r += string;
                        return r;
                };
                var val = self.value.replace(/</g, '&lt;')
                .replace(/>/g, '&gt;')
                .replace(/&/g, '&amp;')
                .replace(/\n$/, '<br/>&nbsp;')
                .replace(/\n/g, '<br/>')
                .replace(/ {2,}/g, function(space){ return times('&nbsp;', space.length - 1) + ' ' });
                if (event && event.data && event.data.event === 'keydown' && event.keyCode === 13) {
                    val += '<br />';
                }
                shadow.css('width', $self.width());
                shadow.html(val + (noFlickerPad === 0 ? '...' : '')); // Append '...' to resize pre-emptively.
                $self.height(Math.max(shadow.height() + noFlickerPad, minHeight));


               


            }
            $self.change(update).keyup(update).keydown({event:'keydown'},update);
            $(window).resize(update);
            update();
        });
    };
})(jQuery);

var noteZindex = 1;
function deleteNote(){
    $.post(url+"admin/notes/deleteNote", {note_id:$(this).parent().data('id')}, function(respuesta) {
        // Función a ejecutar después de que la solicitud se haya completado exitosamente
        console.log('respuesta '.respuesta);
     
    });
    $(this).parent('.note').hide("puff",{ percent: 133}, 250);
};
function newNote() {
      // Realizar solicitud POST
        $.post(url+"admin/notes/newNote",  function(respuesta) {
            // Función a ejecutar después de que la solicitud se haya completado exitosamente
            console.log(respuesta);
            $(respuesta).hide().appendTo("#board").show("fade", 300).draggable().on('dragstart',
            function(){
                $(this).zIndex(++noteZindex);
            });
            $('.remove').click(deleteNote);
            $('textarea').autogrow();
            $('.note')
        });
    return false; 
};
(function($) {
    "use strict";
    $("#board").height($(document).height());
    $("#add_new").click(newNote);
    $('.remove').click(deleteNote);
    $('textarea').autogrow();
    return false;
})(jQuery);