
ClassicEditor
    .create( document.querySelector( '#editor' ), {
        // The language code is defined in the https://en.wikipedia.org/wiki/ISO_639-1 standard.
        language: {
            // The UI will be English.
            ui: 'en',

            // But the content will be edited in Arabic.
            content: 'ar'
        }
    }  )
    .then( editor => {
        window.editor = editor;
    } )
    .catch( error => {
        console.error( err.stack );
    } );
