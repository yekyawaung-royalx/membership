function member_status(status){
        if(status == 0) {
            return '<span class="badge rounded-pill bg-warning">Pending</span>';
        }else if(status == 1) {
            return '<span class="badge rounded-pill bg-success">Approved</span>';
        }else if(status == 2 ) {
            return '<span class="badge rounded-pill bg-danger">Rejected</span>';
        }else{
            return 'Unknow';
        }

        return status;
}

function synced_status(status){
    if(status == 1) {
        return '<span class="badge rounded-pill bg-success text-capitalize">Synced</span>';
    }else{
        return '<span class="badge rounded-pill bg-warning text-capitalize">Pending</span>';
    }

    return status;
}

function log_slug(slug){
    if(slug == 'otp') {
        return '<span class="badge rounded-pill bg-label-info">'+slug+'</span>';
    }else if(slug == 'passcode') {
        return '<span class="badge rounded-pill bg-label-success">'+slug+'</span>';
    }else if(slug == 'register' || slug == 'login') {
        return '<span class="badge rounded-pill bg-label-primary">'+slug+'</span>';
    }else{
        return '<span class="badge rounded-pill bg-label-warning">'+slug+'</span>';
    }

    return slug;
}
