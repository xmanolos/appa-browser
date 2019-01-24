$("#btn-test").on('click', function() {
    $.ajax({
        url: getApiRoute('test-connection'),
        contentType: 'application/json',
        data : $("#form").serialize(),
        success : function(data){
            console.log(data);
        }
    });
});
