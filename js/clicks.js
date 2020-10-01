$(document).ready(
    (UpdateClicks = (event, name) => {
        const idOfClickText = 'clicks_' + name;
        if (event.type === 'click')
            $.ajax({
                type: 'POST',
                url: 'Model/db_update_clicks.php',
                data: {
                    // send this variable to server to identify row to database manipulate
                    name: name
                },
                dataType: 'JSON',
                success: function (data) {
                    // change clicks in html
                    // JSON.decode(data);
                    console.log(data);
                    document.getElementById(idOfClickText).innerHTML = data;
                }
            });
    })

);