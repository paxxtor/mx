"use strict";
CKEDITOR.replace( 'text-box', {
    on: {
        contentDom: function( evt ) {
            // Allow custom context menu only with table elemnts.
            evt.editor.editable().on( 'contextmenu', function( contextEvent ) {
                var path = evt.editor.elementPath();

                if ( !path.contains( 'table' ) ) {
                    contextEvent.cancel();
                }
            }, null, null, 5 );
        }
    },
    // Remove the redundant buttons from toolbar groups defined above.
    removeButtons: 'About,Source,Save,Flash'
 
} );