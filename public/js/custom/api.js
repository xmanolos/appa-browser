function getApiRoute(target) {
    var apiUrl = location.origin + '/api/';
    var apiRoute = apiUrl + target;
    
    return apiRoute;
}