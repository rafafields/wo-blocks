( function( blocks, editor, i18n, element, components, _ ) {
	var el = element.createElement;
	var RichText = editor.RichText;
	var MediaUpload = editor.MediaUpload;

	i18n.setLocaleData( window.wo_blocks_card.localeData, 'wo-blocks' );

	blocks.registerBlockType( 'wo-blocks/card', {
		title: i18n.__( 'WO Card', 'wo-blocks' ),
		icon: 'index-card',
		category: 'layout',
		attributes: {
			title: {
				type: 'array',
				source: 'children',
				selector: 'h2',
			},
			mediaID: {
				type: 'number',
			},
			mediaURL: {
				type: 'string',
				source: 'attribute',
				selector: 'img',
				attribute: 'src',
			},
			instructions: {
				type: 'array',
				source: 'children',
				selector: '.steps',
			},
		},
		edit: function( props ) {
			var attributes = props.attributes;

			var onSelectImage = function( media ) {
				return props.setAttributes( {
					mediaURL: media.url,
					mediaID: media.id,
				} );
			};

			return (
				el( 'div', { className: 'wo-block wo-card' },
					el( 'div', { className: 'upload-button' },
						el( MediaUpload, {
							onSelect: onSelectImage,
							type: 'image',
							value: attributes.mediaID,
							render: function( obj ) {
								return el( components.Button, {
										className: attributes.mediaID ? 'image-button' : 'button button-large',
										onClick: obj.open
									},
									! attributes.mediaID ? i18n.__( 'Imagen de la Card', 'wo-blocks' ) : el( 'img', { src: attributes.mediaURL } )
								);
							}
						} )
					),
                    el( 'div', { className: 'card-content' },
                        el( RichText, {
                            tagName: 'h2',
                            inline: true,
                            placeholder: i18n.__( 'Titulo de la card', 'wo-blocks' ),
                            value: attributes.title,
                            onChange: function( value ) {
                                props.setAttributes( { title: value } );
                            },
                        } ),
                        el( RichText, {
                            tagName: 'div',
                            inline: false,
                            placeholder: i18n.__( 'Escribe un texto para la card', 'wo-blocks' ),
                            value: attributes.instructions,
                            onChange: function( value ) {
                                props.setAttributes( { instructions: value } );
                            },
                        } ) 
                    ),
				)
			);
		},
		save: function( props ) {
			var attributes = props.attributes;

			return (
				el( 'div', { className: 'wo-card' },
					
					attributes.mediaURL &&
                    el( 'div', { className: 'card-image' },
                        el( 'img', { src: attributes.mediaURL } ),
                    ),
                   
                   el( 'div', { className: 'card-content' },
                   
                    el( RichText.Content, {
						tagName: 'h2', value: attributes.title
					} ),
					el( RichText.Content, {
						tagName: 'div', className: 'steps', value: attributes.instructions
					} ),
                      
                    )
				
                ) //wo-card
			);
		},
	} );

} )(
	window.wp.blocks,
	window.wp.editor,
	window.wp.i18n,
	window.wp.element,
	window.wp.components,
	window._,
);
