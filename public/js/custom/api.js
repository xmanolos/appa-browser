class ApiRequest {
	constructor() 
	{
		this.target = null,
		this.requestType = 'GET',
		this.data = null,
		this.dataType = 'JSON',
		this.contentType = 'APPLICATION/JSON'

		this.includeToken = true;
	}

	setTarget(target) { this.target = target; }
	setRequestType(requestType) { this.requestType = requestType; }
	setData(data) { this.data = data; }
	setDataType(dataType) { this.dataType = dataType; }
	setContentType(contentType) { this.contentType = contentType; }	

	setBeforeSendCallback(beforeSendCallback) { this.beforeSendCallback = beforeSendCallback; }
	setCompleteCallback(completeCallback) { this.completeCallback = completeCallback; }
	setSuccessCallback(successCallback) { this.successCallback = successCallback; }
	setErrorCallback(errorCallback) { this.errorCallback = errorCallback; }

	getHeaders() {
		if (this.includeToken) {
			return "'X-CSRF-TOKEN': $('meta[name=\"csrf-token\"]').attr('content')'";
		} else {
			return '';
		}
	}

	postToUrl(url) {
		this.requestType = 'POST';
		this.target = url;

		this.send();
	}

	postToRoute(routeValue) {
		this.requestType = 'POST';
		this.target = route(routeValue);	

		this.send();
	}

	getToUrl(url) {
		this.requestType = 'GET';
		this.target = url;	

		this.send();
	}

	getToRoute(routeValue) {
		this.requestType = 'GET';
		this.target = route(routeValue);		

		this.send();
	}

	send() {
		$.ajax({
			url: this.target,
        	type: this.requestType,
        	data : this.data,
        	dataType: this.dataType, 
        	contentType: this.contentType,
        	headers: this.getHeaders(),
        	beforeSend: function() {
            	startLoading();

            	if(this.beforeSendCallback) {
                	this.beforeSendCallback();
            	}
        	}.bind(this),
        	complete: function(data) {
        		stopLoading();

            	if(this.completeCallback) {
                	this.completeCallback(data);
            	}
        	}.bind(this),
        	success : function(data) {
            	if(this.successCallback) {
                	this.successCallback(data);
            	}
        	}.bind(this),
        	error: function(data) {
            	if(this.errorCallback) {
                	this.errorCallback(data);
            	}
            }.bind(this)
    	});
	}
}