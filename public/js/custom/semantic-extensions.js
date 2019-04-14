// TODO: This should not exist.

class SemanticExtensions {
    static getDropDownValue(selectName) {
        let select = $("select[name='" + selectName + "']");
        let dropDown = select.parent();
        let item = $("div .selected", dropDown);

        return item.attr("data-value");
    }
}