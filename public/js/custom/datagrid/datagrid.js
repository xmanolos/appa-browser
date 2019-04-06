class DataGrid {
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
        $(this.container).append("<div class=\"data-grid\" style=\"display: block;\"></div>");

        $(".data-grid").jsGrid({
            height: "100%",
            width: "100%",
            heading: true,
            paging: true,
            sorting: true,
            filtering: false,
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
