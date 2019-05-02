class QueryEditorShortcuts {
    constructor(queryEditor, callback) {
        this.queryEditor = queryEditor;
        this.callback = callback;
    }

    register() {
        let queryEditor = this.queryEditor;
        let callback = this.callback;

        $(window).on("keydown", function(event) {
            if (event.ctrlKey && event.keyCode === 13) {
                if (queryEditor.isFocused()) {
                    event.preventDefault();

                    callback();
                }
            }
        });
    }
}