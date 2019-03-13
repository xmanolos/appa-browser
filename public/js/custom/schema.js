$(document).ready(function () {
   loadSchemaSelection();
});

$('#schemas').on('change', function() {
    saveSchemaSelection(this.value);
});

function loadSchemaSelection() {
    let successCallback = function(data) {
        if (!data) {
            return;
        }

        setTimeout(function() {
                $('#schemas').val(data);
            }, 500
        );
    };

    let apiRequest = new ApiRequest();
    apiRequest.setSuccessCallback(successCallback);
    apiRequest.getToRoute('api.session.schema.load');
}

function saveSchemaSelection(schemaValue) {
    let requestData = { schema: schemaValue };

    let apiRequest = new ApiRequest();
    apiRequest.disableContentType();
    apiRequest.setData(requestData);
    apiRequest.postToRoute('api.session.schema.store');
}