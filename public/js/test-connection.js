$("#btn-test").on('click', function(){
    $.ajax({
        url: 'http://local.db-browser.com/api/test-connection',
        contentType: 'application/json',
        data : $("#form").serialize(),
        success : function(data){
            console.log(data);
        }
    });
});
