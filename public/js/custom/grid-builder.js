class GridBuilder {
    constructor(container) {
        this.container = container;
    }

    setColumns(columns) {
        this.columns = columns;
    }

    setRows(rows) {
        this.rows = rows;
    }

    build() {
        $(this.container).append('<div id="grid-builder" style="display: block;"></div>');

        $("#grid-builder").jsGrid({
            height: "100%",
            width: "100%",
            heading: true,
            paging: true,
            sorting: true,
            filtering: true,
            autoload: true,
            pageSize: 15,
            data: this.rows,
            fields: this.columns
        });
    }

    clear() {
        $(this.container).empty();
    }
}
