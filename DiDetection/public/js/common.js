const ajaxRequest = (reqType, url, data) => {
    return new Promise((resolve, reject) => {
        $.ajax({
            type: reqType,
            url: url,
            dataType: 'json',
            data: { ...data },
            success: function (resp){
                resolve(resp)
            },
            error: (xhr, status, error) => {
                reject(error)
            }
        })
    })
}