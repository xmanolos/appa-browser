class QueryEditor {
    constructor(container) {
        this.container = container;
        this.editor = null;
    }

    initialize() {
        this.editor = ace.edit(this.container);
        this.editor.setTheme("ace/theme/sqlserver");
        this.editor.session.setMode("ace/mode/sql");
        this.editor.renderer.setOption("showPrintMargin", false);
    }

    isEmpty() {
        return (this.getAllText() == null) || (this.getAllText() === "");
    }

    isFocused() {
        return this.editor.isFocused();
    }

    getQuery() {
        let selectedText = this.getSelectedText();

        if (selectedText) {
            return selectedText;
        }

        return this.getAllText();
    }

    getSelectedText() {
        return this.editor.getSelectedText();
    }

    getAllText() {
        return this.editor.getValue();
    }

    setText(text) {
        this.editor.setValue(text);
    }
}