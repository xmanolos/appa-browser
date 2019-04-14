function testConnection() {
    let connectionData = getFormSerialize();

    new TestConnection(connectionData).now();
}

function connect() {
    let connectionData = getFormSerialize();
    
    new Connect(connectionData).now();
}

function validateForm() {
    let formValidation = getForm()[0];
    let valid = formValidation.checkValidity() && getForm().form("is valid");

    if (!valid) {
        formValidation.reportValidity();
    }

    return valid;
}

function loadDrivers() {
    let errorCallback = function() {
        let dialog = new Dialog();
        dialog.useDefaultErrorMessage();
        dialog.showError();
    };

    let successCallback = function(response) {
        let drivers = [];

        $.each(response, function(index, value) {
            let driver = {
                value: value.identifier,
                name: value.name
            };

            drivers.push(driver);
        });

        $("select[name='driver']").dropdown({
            placeholder: "Driver",
            values: drivers
        });
    };

    let apiRequest = new ApiRequest();
    apiRequest.setErrorCallback(errorCallback);
    apiRequest.setSuccessCallback(successCallback);
    apiRequest.getToRoute("drivers.get");
}

function registerRules() {
    getForm().form({
        fields: {
            "database": "empty",
            "host": "empty",
            "port": "empty",
            "username": "empty",
            "password": "empty",
        }
    });
}

function registerEvents() {
    getForm().submit(function(e) {
        e.preventDefault();
    });

    $("button[name='connect']").on("click", function() {
        if (validateForm()) {
            connect();
        }
    });

    $("button[name='test-connection']").on("click", function() {
        if (validateForm()) {
            testConnection();
        }
    });
}

function getFormSerialize() {
    let driver = SemanticExtensions.getDropDownValue("driver");

    let connectionData = getForm().serializeArray();
    connectionData.push({ name: "driver", value: driver});

    return connectionData;
}

function getForm() {
    return $("#form");
}

$(document).ready(function() {
    registerEvents();
    registerRules();
    loadDrivers();
});