var treeViewOnSelectedEvents;

class TreeView {
	constructor(containerId) {
		this.containerId = "#" + containerId;
		
		treeViewOnSelectedEvents = [];
	}

	init() {
		$(this.containerId).jstree({
    		"core": {
    			"check_callback": true
    		},
    		"plugins": [
    			"search", "contextmenu"
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

							$.each(treeViewOnSelectedEvents, function(index, event) {
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

		let startLoading = this.startLoadingNode;

  		$(this.containerId).on("select_node.jstree", function (e, data) {
			let selectedNode = data.selected[0];

    		$.each(treeViewOnSelectedEvents, function(index, event) {
				if (event.nodeId === selectedNode) {
					startLoading(event.nodeId);

					event.action(event, event.bind);
				}
    		});
  		});
	}

	addNode(node, parent = "#") {
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

	getNodeValue(nodeId) {
		return $(this.containerId).jstree().get_node(nodeId).original.value;
	}

	clearNode(nodeId) {
		let childrens = $(this.containerId).jstree().get_node(nodeId).children;

		$(this.containerId).jstree().delete_node(childrens);
	}

	startLoadingNode(nodeId) {
		let nodeAnchor = $("#" + nodeId + " .jstree-anchor");

		$("i", nodeAnchor).addClass("la-spinner");
	}

	addOnNodeSelectedAction(nodeId, action, bind) {
		if (treeViewOnSelectedEvents.some(x => x.nodeId === nodeId)) {
			treeViewOnSelectedEvents.filter(x => x.nodeId === nodeId).action = action;
		} else {
			let event = {
				nodeId: nodeId,
				action: action,
				bind: bind
			};

			treeViewOnSelectedEvents.push(event);
		}
	}
}