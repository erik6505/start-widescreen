( function( blocks, editor, element ) {
    const el = element.createElement;
    const InnerBlocks = editor.InnerBlocks;
    
    blocks.registerBlockType( 'start-widescreen/citat', {
        title: 'Citat med bild',
        icon: 'format-quote',
        category: 'text',
        edit: function() {
            return el( 'div', { className: 'custom-quote-block' },
                el( InnerBlocks, {
                    allowedBlocks: [ 'core/media-text' ],
                    template: [
                        [ 'core/media-text', {
                            mediaType: 'image',
                            mediaWidth: 15,
                            isStackedOnMobile: false,
                            imageFill: false,
                            focalPoint: { x: 0.52, y: 0.24 },
                            metadata: { name: 'Citat' },
                            className: 'citat',
                            style: {
                                spacing: {
                                    margin: {
                                        top: 'var:preset|spacing|space-xs',
                                        bottom: 'var:preset|spacing|space-xs'
                                    }
                                }
                            },
                            backgroundColor: 'none',
                            textColor: 'dark-1'
                        }, [
                            [ 'core/heading', { 
                                level: 6, 
                                placeholder: 'Citatet',
                                metadata: { name: 'Citatet' }
                            }],
                            [ 'core/paragraph', { 
                                placeholder: 'Namn, Företag',
                                metadata: { name: 'Namnet' },
                                fontSize: 'tiny'
                            }]
                        ]]
                    ],
                    templateLock: false
                } )
            );
        },
        save: function() {
            return el( InnerBlocks.Content );
        }
    } );
} )( window.wp.blocks, window.wp.editor, window.wp.element );