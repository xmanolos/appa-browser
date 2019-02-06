function createLoadingComponent() {
    removeLoadingComponent();

    let htmlLoading =
    '<div class="panel-loading">' +
    '   <div class="cssload-loader">' +
    '       <div class="cssload-inner cssload-one"></div>' +
    '       <div class="cssload-inner cssload-two"></div>' +
    '       <div class="cssload-inner cssload-three"></div>' +
    '   </div>' +
    '</div>';

    $('body').append(htmlLoading);
}

function removeLoadingComponent() {
    $('.panel-loading').remove();
}

function startLoading() {
    createLoadingComponent();
    $('.d-inLoading').prop('disabled', true);
    $('.panel-loading').addClass('start');
}

function stopLoading() {
    $('.panel-loading').addClass('revome-panel');
    $('.cssload-loader').addClass('unplot-loading');
    $('.d-inLoading').prop('disabled', false);
    setTimeout(
        function() {
            removeLoadingComponent();
        },
        600
    );
}
