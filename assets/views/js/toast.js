function sendToast(type = 'primary', title, message) {

    let toasContainer;
    let toastHeader;
    let toastBtn

    switch (type) {
        case 'success':
            toasContainer = 'toast text-bg-success';
            toastHeader = 'toast-header text-bg-success';
            toastBtn = 'btn btn-success';
            break;
        case 'error':
            toasContainer = 'toast text-bg-danger';
            toastHeader = 'toast-header text-bg-danger';
            toastBtn = 'btn btn-danger';
            break;
        case 'info':
            toasContainer = 'toast text-bg-primary';
            toastHeader = 'toast-header text-bg-primary';
            toastBtn = 'btn btn-primary';
            break;
        default:
            toasContainer = 'toast text-bg-secondary';
            toastHeader = 'toast-header text-bg-secondary';
            toastBtn = 'btn btn-secondary';
    }

    $("#customToast").removeAttr('class');
    $("#customToastHeader").removeAttr('class');
    $("#toastBtn").removeAttr('class');
    $("#customToast").attr('class', toasContainer);
    $("#customToastHeader").attr('class', toastHeader);
    $("#toastBtn").attr('class', toastBtn);
    $("#toastTitle").text(title);
    $("#toastMessage").text(message);
    toast.show();
}