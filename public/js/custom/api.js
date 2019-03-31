class ApiRequest {
	constructor(bind) {
		this.bind = bind;

		this.target = null;
		this.requestType = 'GET';
		this.data = null;
		this.dataType = 'JSON';
		this.contentType = 'APPLICATION/JSON';

		this.includeToken = true;
		this.includeContentType = true;
	}

	setTarget(target) { this.target = target; }
	setRequestType(requestType) { this.requestType = requestType; }
	setData(data) { this.data = data; }
	setDataType(dataType) { this.dataType = dataType; }
	setContentType(contentType) { this.contentType = contentType; }	

	disableIncludeToken() {
		this.includeToken = false;
	}

	disableContentType() {
		this.includeContentType = false;
	}

	setBeforeSendCallback(beforeSendCallback) { this.beforeSendCallback = beforeSendCallback; }
	setCompleteCallback(completeCallback) { this.completeCallback = completeCallback; }
	setSuccessCallback(successCallback) { this.successCallback = successCallback; }
	setErrorCallback(errorCallback) { this.errorCallback = errorCallback; }

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
		let request = this.getRequest();

		if (!this.includeContentType) {
			delete request.contentType;
		}

		if (!this.includeToken) {
			delete request.headers;
		}		

		$.ajax(request);
	}

	getRequest() {
		return {
			url: this.target,
			type: this.requestType,
			data: this.data,
			dataType: this.dataType,
			contentType: this.contentType,
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			beforeSend: function () {
				startLoading();

				if (this.beforeSendCallback) {
					this.beforeSendCallback(this.bind);
				}
			}.bind(this),
			complete: function (data) {
				stopLoading();

				if (this.completeCallback) {
					this.completeCallback(data, this.bind);
				}
			}.bind(this),
			success: function (data) {
				if (this.successCallback) {
					this.successCallback(data, this.bind);
				}
			}.bind(this),
			error: function (data) {
				if (this.errorCallback) {
					this.errorCallback(data, this.bind);
				}
			}.bind(this)
		};
	}
}