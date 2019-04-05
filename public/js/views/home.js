var searchTimer = null;
var editor = null;

$(document).ready(function() {
    showConnectionInfo();

    $('#lnk-exit').on('click', function() {
        Disconnection.now();
    });

    $('#run-query').on('click', function() {
        callRunQuery();
    });

    $('.btn-format-query').on('click', function() {
        formatQuery();
    });

    DatabaeDataSearch.init('search', 'database-data');

    setHighLightEditor();
    $('#styleQueryEditor').on('change', changeStyleQueryEditor);
    $('.btn-change-style-query > i').click(showHideStyleQueryEditor);

    changeStyleQueryEditor();
});

function showConnectionInfo() {
    new ConnectionInfo().show('panel-connection');
}

function callRunQuery() {
    if (!editor || !editor.getValue()) {
        return;
    }

    let queryText = editor.getValue();
    let schemaName = $('#schemas').val();
    let schemaCharset = $('#schema-' + schemaName).attr('charset');

    let queryRunner = new QueryRunner();
    queryRunner.setContainer('.panel-show-result');
    queryRunner.setQuery(queryText);
    queryRunner.run(schemaName, schemaCharset);
}

function setHighLightEditor() {
    editor = ace.edit('editorTextQuery');
    editor.setTheme('ace/theme/sqlserver');
    editor.session.setMode('ace/mode/sql');
    editor.renderer.setOption('showPrintMargin', false);
}

function changeStyleQueryEditor(){
    let itemSelected = $('#styleQueryEditor').val();
    editor.setTheme('ace/theme/'+itemSelected);
    $('.style-query-editor').removeClass('show');
}

function showHideStyleQueryEditor() {
    $('.style-query-editor').toggleClass('show');
}

function addSchema(schema) {
    $('#schemas').append('<option id="schema-' + schema.name + '"value="' + schema.name + '" charset="' + schema.charset + '">' + schema.name + '</option>');
}

function addSchemaPlaceholder() {
    $('#schemas').append('<option disabled selected hidden></option>');
}

function formatQuery() {
    if(editor == null) {
        return;
    }

    let successCallback = function(apiResult) {
        if(apiResult) {
            editor.setValue(apiResult.result);
        }
    }

    let errorCallback = function(apiResult) {
        let dialog = new Dialog();
        dialog.useMessage('Failed to format query! Please, try again...');
        dialog.showError();
    }

    let requestValues = {
        sql: editor.getValue(),
        reindent: 1, indent_width: 4,
        keyword_case: 'upper'
    };

    let apiRequest = new ApiRequest();
    apiRequest.setData(requestValues);
    apiRequest.setSuccessCallback(successCallback);
    apiRequest.setErrorCallback(errorCallback);
    apiRequest.disableIncludeToken();
    apiRequest.getToUrl('https://sqlformat.org/api/v1/format', );
}
