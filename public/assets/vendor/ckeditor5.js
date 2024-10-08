import {
    ClassicEditor,
    AccessibilityHelp,
    Autosave,
    Bold,
    Essentials,
    Italic,
    Mention,
    Paragraph,
    SelectAll,
    Undo
} from 'https://cdn.ckeditor.com/ckeditor5/43.2.0/ckeditor5.js';

const editorConfig = {
    toolbar: {
        items: ['undo', 'redo', '|', 'selectAll', '|', 'bold', 'italic','|', 'accessibilityHelp'],
        shouldNotGroupWhenFull: false
    },
    placeholder: 'Ecrivez votre article ici!',
    plugins: [AccessibilityHelp, Autosave, Bold, Essentials, Italic, Mention, Paragraph, SelectAll, Undo],
};

ClassicEditor
    .create( document.querySelector( '#content' ), editorConfig )
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );