$(document).ready(function() {
    let connectionData = getConnectionData();
});

function getConnectionData() {
    let successCallback = function(jsonReturn) {
        console.log(jsonReturn);
        buildTree(jsonReturn);
    };

    ajaxRequestToApi('api.database-data.get', null, successCallback);
}

function buildTree(data) {
    $.each(data.schemas, function(idxSchema, schema) {
        addSchema(schema.name);

        $.each(schema.tables, function(idxTable, table) {
            addTable(idxTable, table.name);

            if(table.columns) {
                $.each(table.columns, function(idxColumn, column) {
                    addColumn(idxTable, idxColumn, column.name);
                });
            }
        });
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
