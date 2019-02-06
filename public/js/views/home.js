$(document).ready(function() {
    let connectionData = getConnectionData();
});

function getConnectionData() {
    let successCallback = function(jsonReturn) {
        buildTree(jsonReturn);
    };

    ajaxRequestToApi('api.database-data.get', null, successCallback);
}

function buildTree(data) {
    $.each(data.tables, function(idxTable, table) {
        console.log(table.columns);

        addTable(idxTable, table.name);
        if(table.columns) {
            $.each(table.columns, function(idxColumn, column){
                console.log(idxColumn + ' - ' + column.name);
                addColumn(idxTable, idxColumn, column.name);
            });
        }
    });
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
