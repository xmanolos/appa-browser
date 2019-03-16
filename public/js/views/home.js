var databaseData = null;
var searchTimer = null;
var editor = null; 

$(document).ready(function() {
    loadSchemas();

    $('#run-query').on('click', function() {
        callRunQuery();
    });

    $('#schemas').on('change', function() {
        buildTree(this.value);
    });

    $('.btn-format-query').click(formatQuery);

    $('#search').keyup(function () {
        if(searchTimer) { clearTimeout(searchTimer); }
        searchTimer = setTimeout(
            function () {
                var textSearch = $('#search').val();
                $('.panel-tables-tree').jstree(true).search(textSearch);
            },
            300
        );
    });

    setHighLightEditor();
    $('#styleQueryEditor').on('change', changeStyleQueryEditor);
    $('.btn-change-style-query > i').click(showHideStyleQueryEditor);

    changeStyleQueryEditor();
});

function loadSchemas() {
    let completeCallback = function(data, bind) {
        schemas = data.responseJSON;

        bind.addSchemaPlaceholder();

        $.each(schemas, function(index, schema) {
            bind.addSchema(schema);
        });
    };

    let apiRequest = new ApiRequest(this);
    apiRequest.setCompleteCallback(completeCallback);
    apiRequest.getToRoute('api.database-data.schemas.get');    
}

function buildTree(schema) {
    new DatabaseData(schema).show('database-data');
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
    /*if (schema.available) {
        $('#schemas').append('<option value="' + schema.name + '">' + schema.name + '</option>');
    } else {
        $('#schemas').append('<option disabled value="' + schema.name + '">' + schema.name + '</option>');
    }*/
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
