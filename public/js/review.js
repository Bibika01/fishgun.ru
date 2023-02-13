window.addEventListener('load', function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    document.getElementById("add__review__form").addEventListener('submit', add__review);
});

function add__review( event )
{
    event.preventDefault();

    const url = document.getElementById("add__review__form").getAttribute("action");
    const method = document.getElementById("add__review__form").getAttribute("method");

    const name = document.getElementById("user__name__input").value;
    const email = document.getElementById("user__email__input").value;
    const message = document.getElementById("user__message__input").value;

    $.ajax({
        type: method,
        url: url,
        data: {
            "name": name,
            "email": email,
            "text": message
        },
        success: function ( response )
        {
            console.log(response);

            document.getElementById("user__name__input").value = " ";
            document.getElementById("user__email__input").value = " ";
            document.getElementById("user__message__input").value = " ";
        }
    });
}
