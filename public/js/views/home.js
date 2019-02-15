var databaseData = null;
var searchTimer = null;

$(document).ready(function() {
    databaseData = loadDatabaseData();

    $('#schemas').on('change', function() {
        buildTree(this.value);
    });

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


    let element = document.getElementById('teste123');
    var editor = ace.edit(element);
    editor.setTheme("ace/theme/twilight");
    editor.session.setMode("ace/mode/javascript");
});

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
        '<li data-jstree=\'{"icon":"fas fa-th"}\'>' + tableName +
        '   <ul id="table-' + tableId + '"></ul>' +
        '</li>'
    );
}

function addColumn(tableId, columnId, columnName) {
    $('#tables-tree #table-' + tableId).append(
        '<li id="column-' + tableId + '-' + columnId + '" data-jstree=\'{"icon":"fas fa-chevron-right"}\'>' + columnName + '</li>'
    );
}
