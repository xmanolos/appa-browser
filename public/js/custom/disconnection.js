class Disconnection {
	static now() {
		let yesCallback = function() {
			window.location.href = route('api.connection.disconnect');
		}

		questionYesNoDialog('Do you really want to disconnect?', 'Please, confirm...', yesCallback);
	}
}