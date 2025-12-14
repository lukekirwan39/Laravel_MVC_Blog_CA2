/**
 * @license Copyright (c) 2003-2023, CKSource Holding sp. z o.o. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
    // Disable remote version check to silence console warning about CKEditor 4.22.1
    config.versionCheck = false;
    config.filebrowserBrowseUrl = '/elfinder/ckeditor';
};
