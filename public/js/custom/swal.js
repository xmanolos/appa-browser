class Dialog {
    constructor() {
        this.options = {};
        this.options.showConfirmButton = false;

        // Variations.
        this.toast = null;

        // Actions.
        this.okAction = null;
        this.yesAction = null;
        this.noAction = null;
    }

    setWidth(width) {
        this.options.width = width;
    }

    useTitle(title) {
        this.options.title = title;
    }

    useMessage(message) {
        this.options.html = message;
    }

    useHtml(html) {
        this.options.html = html;
    }

    useOkAction() {
        this.options.showConfirmButton = true;
        this.options.confirmButtonText = "Ok";
    }

    showInfo() {
        this.options.showCloseButton = true;
        this.options.focusConfirm = false;

        this.showDefault();
    }

    showSuccess() {
        this.options.type = "success";

        this.toast = swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000
        });

        this.showToast();
    }

    showError() {
        this.options.type = "error";
        this.options.title = (this.options.title) ? this.options.title : "Ops...";
        this.options.width = (this.options.width ) ? this.options.width : 500;

        this.useOkAction();

        this.showDefault();
    }

    showQuestion(options) {
        this.options.showCancelButton = true;
        this.options.showConfirmButton = true;

        this.options.cancelButtonText = "No";
        this.options.confirmButtonText = "Yes";

        this.options.cancelButtonColor = "#E84118"; // TODO: Fix.
        this.options.confirmButtonColor = "#4CD137"; // TODO: Fix.

        this.options.reverseButtons = true;

        this.yesAction = (options && options.yesAction) ? options.yesAction : null;
        this.noAction = (options && options.noAction) ? options.noAction : null;

        this.showDefault();
    }

    show() {
        if (this.toast) {
            this.showToast();
        } else {
            this.showDefault();
        }
    }

    showToast() {
        this.toast.fire(this.options).then((result) => {
            this.callBackOkAction(result);
            this.callBackYesNoActions(result);
        });
    }

    showDefault() {
        swal.fire(this.options).then((result) => {
            this.callBackOkAction(result);
            this.callBackYesNoActions(result);
        });
    }

    callBackOkAction(result) {
        if (this.okAction) {
            this.okAction(result);
        }
    }

    callBackYesNoActions(result) {
        if (result.value) {
            if (this.yesAction) {
                this.yesAction();
            }
        } else {
            if (this.noAction) {
                this.noAction();
            }
        }
    }
}