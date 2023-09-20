function bayar(id) {
    $.ajax({
        type: "get",
        url: "midtrans/" + id,
        dataType: "json",
        success: function (response) {

            // console.log(response);
            snap.pay(response, {
                // Optional
                onSuccess: function (result) {
                    // console.log(result);
                    send_response(result);
                },
                // Optional
                onPending: function (result) {
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