class Notification {

    success(text) {
        new Noty({
            type: 'success',
            layout: 'topRight',
            text: text,
            timeout: 1000
        }).show();
    }

    alert(text) {
        new Noty({
            type: 'alert',
            layout: 'topRight',
            text: text,
            timeout: 1000
        }).show();
    }

    error(text) {
        new Noty({
            type: 'error',
            layout: 'topRight',
            text: text,
            timeout: 1000
        }).show();
    }

    warning(text) {
        new Noty({
            type: 'warning',
            layout: 'topRight',
            text: text,
            timeout: 1000
        }).show();
    }

}

export default Notification = new Notification();