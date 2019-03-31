$(document).ready(function() {
    loadSchemas();

    $("#schemas").on("change", function() {
        buildTree(this.value);
        saveSchemaSelection(this.value);
    });
});

function loadSchemas() {
    let completeCallback = function(data, bind) {
        schemas = data.responseJSON;

        bind.addSchemaPlaceholder();

        $.each(schemas, function(index, schema) {
            bind.addSchema(schema);
        });

        bind.loadSchemaSelection();
    };

    let apiRequest = new ApiRequest(this);
    apiRequest.setCompleteCallback(completeCallback);
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