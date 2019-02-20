var databaseData = null;
var searchTimer = null;
var editor = null;

$(document).ready(function() {
    databaseData = loadDatabaseData();

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
    let successCallback = function(jsonReturn) {
        databaseData = jsonReturn;

        showSchemas();
    };

    ajaxRequestToApi('api.database-data.get', null, successCallback);
}

function showSchemas() {
    $.each(databaseData.schemas, function(idxSchema, schema) {
        addSchema(schema.name);
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
                        addColumn(idxTable, idxColumn, column.name);
                    });
                }
            });
        }
    });

    $('.panel-tables-tree').jstree({
        "plugins" : [ "wholerow", "search" ]
    });
}

function addSchema(schemaName) {
    $('#schemas').append('<option value="' + schemaName + '">' + schemaName + '</option>');
}

function addTable(tableId, tableName){
    $('#tables-tree').append(
        '<li data-jstree=\'{"icon":"la la-table"}\'>' + tableName +
        '   <ul id="table-' + tableId + '"></ul>' +
        '</li>'
    );
}

function addColumn(tableId, columnId, columnName) {
    $('#tables-tree #table-' + tableId).append(
        '<li id="column-' + tableId + '-' + columnId + '" data-jstree=\'{"icon":"la la-columns"}\'>' + columnName + '</li>'
    );
}

function formatQuery() {
    if(editor == null) {
        return;
    }

    let onSuccess = function(response){
        if(response != null)
            editor.setValue(response.result);
    }


    ajaxRequestToApi(
        'https://sqlformat.org/api/v1/format',
        {
            sql: editor.getValue(),
            reindent: 1,
            indent_width: 4,
            keyword_case: 'upper'
        },
        onSuccess
    );
}
