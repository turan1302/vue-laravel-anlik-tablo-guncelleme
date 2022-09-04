class Notification {
    success(message) {
        new Noty({
            type : 'success',
            layout: 'topRight',
            text: message,
            timeout: 1000
        }).show();
    }

    error(message){
        new Noty({
            type : 'error',
            layout: 'topRight',
            text: message,
            timeout: 1000
        }).show();
    }
}

export default Notification = new Notification();
