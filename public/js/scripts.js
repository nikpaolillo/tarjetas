function selectUser() {
    $.ajax({
        type: "GET",
        url: "/select-user",
        data: {
            "id" : $('input[name=perfil]:checked').data('id')
        },
        success: function(data) {
            console.log(data);
        },
        error: function (request) {

        }
    });
}