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
    new ConnectionInfo().show('panel-db-data');
}

function callRunQuery() {
    if (!editor || !editor.getValue()) {
        return;
    }

    let queryText = editor.getValue();

    let queryRunner = new QueryRunner(queryText, 'panel-show-result');
    queryRunner.run();
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
    $('#schemas').append('<option value="' + schema.schemaname + '">' + schema.schemaname + '</option>');
}

function addSchemaPlaceholder() {
    $('#schemas').append('<option disabled selected hidden></option>');
}

function formatQuery() {
    if(editor == null) {
        return;
    }

    let successCallback = function(apiResult) {
        if(response != null) {
            editor.setValue(apiResult.result);
        }
    }

    let errorCallback = function(apiResult) {
        errorDialog('Failed to format query! Please, try again...');
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
