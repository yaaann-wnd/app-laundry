
function bayar(id) {
    $.ajax({
        type: "get",
        url: "midtrans/" + id,
        dataType: "json",
        success: function (response) {
            snap.pay(response, {
                uiMode: "qr",
                // Optional
                onSuccess: function (result) {
                    send_response(result);
                },
                // Optional
                onPending: function (result) {
                    pending(result);
                },
                // Optional
                onError: function (result) {
                }
            });

        }
    });
}

function send_response(result){
    document.getElementById('call_json').value = JSON.stringify(result);
    $('#submit_form').submit();
}

function pending(result) {
    document.getElementById('call_json_pending').value = JSON.stringify(result);
    $('#submit_form_pending').submit();
}
