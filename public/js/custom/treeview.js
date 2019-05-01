var onNodeOpenedAction;

class TreeView {
	constructor(containerId) {
		this.containerId = "#" + containerId;
		
		onNodeOpenedAction = [];
	}

	init() {
		$(this.containerId).jstree({
    		"core": {
    			"check_callback": true,
				"themes": {
					"responsive": true
				}
    		},
    		"plugins": [
    			"search", "contextmenu", "wholerow"
    		],
			"contextmenu": {
    			"select_node": false,
    			"items": {
					"action-refresh": {
						"label": "Refresh",
						"icon": "la la-refresh",
						"action" : function (data) {
							let treeView = $.jstree.reference(data.reference);
							let selectedNode = treeView.get_node(data.reference).id;

							$.each(onNodeOpenedAction, function(index, event) {
								if (event.nodeId === selectedNode) {
									startLoading(event.nodeId);

									event.action(event, event.bind);
								}
							});
						}
					}
				}
			}
  		});

		let containerId = this.containerId;
		let startLoading = this.startLoadingNode;

		$(this.containerId).on("select_node.jstree", function (e, data) {
			let selectedNode = data.selected[0];
			let selectedNodeContent = $(containerId).jstree().get_node(selectedNode);

			if (selectedNodeContent.state.opened) {
				return;
			}

			$.each(onNodeOpenedAction, function(index, action) {
				if (action.nodeId === selectedNode) {
					startLoading(action.nodeId);

					action.action(action, action.bind);
				}
			});
  		});
	}

	addNode(node, parent = "#") {
		$(this.containerId).jstree().create_node(parent, node);

		this.addNodeNoData(node.nodeId);
	}

	addNodeNoData(parent) {
		let node = {
			id: "node-no-data",
			text: "No data",
			icon: "la la-ban",
			value: "no-data"
		};

		$(this.containerId).jstree().create_node(parent, node);
	}

	openNode(nodeId) {
		$(this.containerId).jstree().open_node(nodeId);
	}

	getNode(nodeId) {
		return $(this.containerId).jstree().get_node(nodeId);
	}

	getNodeText(nodeId) {
		return $(this.containerId).jstree().get_node(nodeId).text;
	}

	getNodeProperty(property, nodeId) {
		return $(this.containerId).jstree().get_node(nodeId).original[property];
	}

	clearNode(nodeId) {
		let childrens = $(this.containerId).jstree().get_node(nodeId).children;

		$(this.containerId).jstree().delete_node(childrens);
	}

	startLoadingNode(nodeId) {
		let nodeAnchor = $("#" + nodeId + " .jstree-anchor");

		$("i", nodeAnchor).addClass("la-spinner");
	}

	stopLoadingNode(nodeId) {
		let nodeAnchor = $("#" + nodeId + " .jstree-anchor");

		$("i", nodeAnchor).removeClass("la-spinner");
	}

	addOnNodeOpenedAction(nodeId, action, bind) {
		if (onNodeOpenedAction.some((x) => x.nodeId === nodeId)) {
			onNodeOpenedAction.filter((x) => x.nodeId === nodeId).action = action;
		} else {
			let event = {
				nodeId: nodeId,
				action: action,
				bind: bind
			};

			onNodeOpenedAction.push(event);
		}
	}
}