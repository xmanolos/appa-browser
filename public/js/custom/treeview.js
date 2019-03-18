class TreeView {
	constructor(containerId) {
		this.containerId = '#' + containerId;
		this.onSelectedActions = [ ];
	}

	init() {
		$(this.containerId).jstree({
    		'core': {
    			'check_callback': true
    		},
    		'plugins': [
    			'search'
    		]
  		});
	}

	addNode(node, parent = '#') {
		$(this.containerId).jstree().create_node(parent, node);
	}

	openNode(nodeId) {
		$(this.containerId).jstree().open_node(nodeId);
	}

	getNodeText(nodeId) {
		return $(this.containerId).jstree().get_node(nodeId).text;
	}

	clearNode(nodeId) {
		let childrens = $(this.containerId).jstree().get_node(nodeId).children;

		$(this.containerId).jstree().delete_node(childrens);
	}

	addOnNodeSelectedAction(nodeId, action, bind) {
		if (this.onSelectedActions.some(x => x.nodeId == nodeId)) {
			this.onSelectedActions.filter(x => x.nodeId == nodeId).action = action;
		} else {
			let event = {
				nodeId: nodeId,
				action: action,
				bind: bind
			};

			this.onSelectedActions.push(event);
		}

		this.storeNodeSelectionActions();
	}

	storeNodeSelectionActions() {
		let onSelectedActions = this.onSelectedActions;

		$(this.containerId).on('changed.jstree', function (e, data) {
    		let selectedNode = data.selected[0];

    		$.each(onSelectedActions, function(index, event) {
				if (event.nodeId == selectedNode) {
					event.action(event, event.bind);
				}
    		});
  		});
	}
}