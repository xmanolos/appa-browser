var databaseData = null;

$(document).ready(function() {
    databaseData = loadDatabaseData();
    
    $('#schemas').on('change', function() {
        buildTree(this.value);
    });
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
}

function addSchema(schemaName) {
    $('#schemas').append('<option value="' + schemaName + '">' + schemaName + '</option>');
}

function addTable(tableId, tableName){
    $('#tables-tree').append(
        '<li>' +
        '   <span>' + tableName + '</span>' +
        '   <ul id="table-' + tableId + '"></ul>' +
        '</li>'
    );
}

function addColumn(tableId, columnId, columnName) {
    $('#tables-tree #table-' + tableId).append(
        '<li id="column-' + columnId + '">' + columnName + '</li>'
    );
}
