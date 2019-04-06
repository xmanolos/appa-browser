class DatabaeDataSearch {
	static init(containerId, treeViewContainerId) {
		$('#' + containerId).keyup(function() {
        	if(searchTimer) {
        		clearTimeout(searchTimer);
        	}

        	searchTimer = setTimeout(
            	function() {
                	var textSearch = $('#' + containerId).val();

        			$('#' + treeViewContainerId).jstree().search(textSearch);
            	},
            	300
        	);
    	});
	}
}