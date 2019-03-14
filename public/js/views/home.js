var databaseData = null;
var searchTimer = null;
var editor = null; 

$(document).ready(function() {
    databaseData = loadDatabaseData();

    showConnectionInfo();

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

function loadDatabaseData() {
    let completeCallback = function(getResult) {
        databaseData = getResult.responseJSON;

        showSchemas();
    };

    let apiRequest = new ApiRequest();
    apiRequest.setCompleteCallback(completeCallback);
    apiRequest.getToRoute('api.database-data.get');
}

function showSchemas() {
    addSchemaPlaceholder();

    $.each(databaseData.schemas, function(idxSchema, schema) {
        addSchema(schema);
    });
}

function buildTree(schemaName) {
    $('#tables-tree').html('');

    $.each(databaseData.schemas, function(idxSchema, schema) {
        if (schema.name == schemaName) {
            $.each(schema.tables, function(idxTable, table) {
                addTable(idxTable, table.name);

                if(table.columns) {
                    $.each(table.columns, function(idxColumn, column) {
                        addTableColumn(idxTable, idxColumn, column);
                    });
                }
            });

            $.each(schema.views, function(idxView, view) {
                addView(idxView, view.name);

                if(view.columns) {
                    $.each(view.columns, function(idxColumn, column) {
                        addViewColumn(idxView, idxColumn, column);
                    });
                }
            });
        }
    });

    $('.panel-tables-tree').jstree({
        'plugins' : [ 'wholerow', 'search' ]
    });
}

function addSchema(schema) {
    if (schema.available) {
        $('#schemas').append('<option value="' + schema.name + '">' + schema.name + '</option>');
    } else {
        $('#schemas').append('<option disabled value="' + schema.name + '">' + schema.name + '</option>');
    }
}

function addSchemaPlaceholder() {
    $('#schemas').append('<option disabled selected hidden></option>');
}

function addTable(tableId, tableName){
    $('#tables-tree').append(
        '<li data-jstree=\'{"icon":"la la-table"}\'>' + tableName +
        '   <ul id="table-' + tableId + '"></ul>' +
        '</li>'
    );
}

function addView(viewId, viewName){
    $('#views-tree').append(
        '<li data-jstree=\'{"icon":"la la-table"}\'>' + viewName +
        '   <ul id="view-' + viewId + '"></ul>' +
        '</li>'
    );
}

function addTableColumn(tableId, columnId, column) {
    $('#tables-tree #table-' + tableId).append(
        '<li id="column-' + tableId + '-' + columnId + '" data-jstree=\'{"icon":"la la-columns"}\'>' + column.name + ' (' + column.dataType + ')' + '</li>' // TODO: Refactor!
    );
}

function addViewColumn(viewId, columnId, column) {
    $('#views-tree #view-' + viewId).append(
        '<li id="column-' + viewId + '-' + columnId + '" data-jstree=\'{"icon":"la la-columns"}\'>' + column.name + ' (' + column.dataType + ')' + '</li>' // TODO: Refactor!
    );
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
