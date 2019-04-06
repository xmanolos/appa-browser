class Disconnection {
	static now() {
		let yesCallback = function() {
			window.location.href = route('api.connection.disconnect');
		};

		let dialog = new Dialog();
		dialog.useMessage('Do you really want to disconnect?');
		dialog.showQuestion({
			yesAction: yesCallback
		});
	}
}