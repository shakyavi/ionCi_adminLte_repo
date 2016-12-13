/**
 * @license Copyright (c) 2003-2012, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.skin = 'bootstrapck';//'moono-light';
    config.allowedContent = true;
    config.stylesSet = 'my_styles';
    config.smiley_path=CKEDITOR.basePath+'plugins/smiley/images/';
    config.smiley_images=['tick.png','cross.png'];
    config.smiley_descriptions=[ '(y)','(n)'];

    config.font_names = 'Exo-Light;Avenir-Light;Arial;Times New Roman;Verdana;';

    
    config.toolbarGroups = [
		{ name: 'tools' },
		{ name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
		{ name: 'links' },
		{ name: 'insert' },
		{ name: 'forms' },
		{ name: 'others' },
//		'/',
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align' ] },
		{ name: 'styles' },
		{ name: 'colors' },
		{ name: 'about' }
	];
    
	config.toolbar_General_user = [
						{ name: 'document', items: [ 'NewPage', 'Preview', '-' ] },
						[ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo'],
                                                { name: 'links', items : [ 'Link','Unlink','Anchor' ] },
						{ name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline', 'FontSize'  ] },
						{ name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] }
					];
                    
	config.toolbar_Simple = [
						{ name: 'document', items: [ 'Source', 'NewPage', 'Preview', '-' ] },
						[ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo'],
                                                { name: 'links', items : [ 'Link','Unlink','Anchor' ] },
						{ name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline', 'FontSize'  ] },
						{ name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] }
					];
};
CKEDITOR.stylesSet.add( 'my_styles', [
    // Block-level styles.
    { name: 'Title', element: 'h2', styles: { color: '' , font: '900 28px Lato' } },
    { name: 'Sub Title',  element: 'h3', styles: { color: '#0AC2CC' , font: '400 18px Lato'} },
]);