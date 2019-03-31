function testConnection() {
    let connectionData = $("#form").serialize();
    
    new TestConnection(connectionData).now();
}

function connect() {
    let connectionData = $("#form").serialize();
    
    new Connect(connectionData).now();
}

function validateForm() {
    let valid = $("form")[0].checkValidity();

    if (!valid) {
        $("form")[0].reportValidity();
    }

    return valid;
}

$("#btn-test-conn").on("click", function() {
    if (validateForm()) {
        testConnection();
    }
});

$("#form").submit(function(e) {
    e.preventDefault();

    if (validateForm()) {
        connect();
    }
});