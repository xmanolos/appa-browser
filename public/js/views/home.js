var queryEditor;

$(document).ready(function() {
    showConnectionInfo();
    showDatabaseData();

    initializeQueryEditor();
    initializeQueryEditorShortcuts();

    registerEvents();

    DatabaeDataSearch.init("search", "database-data");
});

function initializeQueryEditor() {
    queryEditor = new QueryEditor("editorTextQuery");
    queryEditor.initialize();
}

function initializeQueryEditorShortcuts() {
    let queryEditorShortcuts = new QueryEditorShortcuts(queryEditor, callRunQuery);
    queryEditorShortcuts.register();
}

function registerEvents() {
    $("#lnk-exit").on("click", function() {
        Disconnection.now();
    });

    $("#run-query").on("click", function() {
        callRunQuery();
    });

    $(".btn-format-query").on("click", function() {
        formatQuery();
    });
}

function showConnectionInfo() {
    new ConnectionInfo().show("panel-connection");
}

function showDatabaseData() {
    new DatabaseData().show("database-data");
}

function callRunQuery() {
    let queryText = queryEditor.getQuery();

    if (queryText) {
        let schemaName = $("#schemas").val();
        let schemaCharset = $("#schema-" + schemaName).attr("charset");

        let queryRunner = new QueryRunner();
        queryRunner.setContainer(".panel-show-result");
        queryRunner.setQuery(queryText);
        queryRunner.run(schemaName, schemaCharset);
    }
}

function formatQuery() {
    let successCallback = function(apiResult) {
        if(apiResult) {
            queryEditor.setText(apiResult.result);
        }
    };

    let errorCallback = function() {
        let dialog = new Dialog();
        dialog.useMessage("Failed to format query! Please, try again...");
        dialog.showError();
    };

    let requestValues = {
        sql: queryEditor.getAllText(),
        reindent: 1, indent_width: 4,
        keyword_case: "upper"
    };

    let apiRequest = new ApiRequest();
    apiRequest.setData(requestValues);
    apiRequest.setSuccessCallback(successCallback);
    apiRequest.setErrorCallback(errorCallback);
    apiRequest.disableIncludeToken();
    apiRequest.getToUrl("https://sqlformat.org/api/v1/format", );
}
