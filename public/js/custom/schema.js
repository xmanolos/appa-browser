$(document).ready(function() {
    loadSchemas();

    $("#schemas").on("change", function() {
        buildTree(this.value);
        saveSchemaSelection(this.value);
    });
});

function loadSchemas() {
    let errorCallback = function(response) {
        let dialog = new Dialog();
        dialog.useMessage(response.responseText);
        dialog.showError();
    };

    let successCallback = function(response, bind) {
        let schemas = response;

        bind.addSchemaPlaceholder();

        $.each(schemas, function(index, schema) {
            bind.addSchema(schema);
        });

        bind.loadSchemaSelection();
    };

    let apiRequest = new ApiRequest(this);
    apiRequest.setErrorCallback(errorCallback);
    apiRequest.setSuccessCallback(successCallback);
    apiRequest.getToRoute("api.database-data.schemas.get");
}

function loadSchemaSelection() {
    let successCallback = function(data, bind) {
        if (!data) {
            return;
        }

        setTimeout(function() {
                $("#schemas").val(data);

                bind.buildTree(data);
            }, 500
        );
    };

    let apiRequest = new ApiRequest(this);
    apiRequest.setSuccessCallback(successCallback);
    apiRequest.getToRoute("api.session.selected-schema.load");
}

function buildTree(schema) {
    new DatabaseData(schema).show("database-data");
}

function saveSchemaSelection(schemaValue) {
    let requestData = { "selected-schema": schemaValue };

    let apiRequest = new ApiRequest();
    apiRequest.disableContentType();
    apiRequest.setData(requestData);
    apiRequest.postToRoute("api.session.selected-schema.store");
}