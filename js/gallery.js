$(function () {
    var clicks = 0;

    $("#right_arrow_head").click(function () {
        const cardsList = document.getElementsByClassName('card');
        var success = 0;
        if (clicks < cardsList.length - 2) {
            if (cardsList[cardsList.length - 1].className == "card card_2" || cardsList[0].className == "card card_2")
                h = 3;
            else
                h = 4;
            console.log(clicks);
            clicks++;
            for (let index = 0; index < cardsList.length; index++) {
                if (success == h) {
                    break;
                }
                const element = cardsList[index];
                if (element.className == "card card_1") {
                    success++
                    $(element).removeClass('card_1').addClass('card_front');
                    continue;
                } else if (element.className == "card card_2") {
                    success++
                    $(element).removeClass('card_2').addClass('card_1');
                    continue;
                } else if (element.className == "card card_3") {
                    success++
                    $(element).removeClass('card_3').addClass('card_2');
                    continue;
                } else if (element.className == "card card_back") {
                    success++
                    $(element).removeClass('card_back').addClass('card_3');
                }
            }
        }
    });
    $("#left_arrow_head").click(function () {
        const cardsList = document.getElementsByClassName('card');
        var success = 0;
        if (clicks > -1) {
            // console.log(clicks);
            clicks--;
            // if (clicks == -1) clicks = 0;
            if (cardsList[cardsList.length - 1].className == "card card_2" || cardsList[0].className == "card card_2")
                h = 3;
            else
                h = 4;
            for (let index = cardsList.length - 1; index > -1; index--) {
                const element = cardsList[index];
                if (success == h) {
                    break;
                } else if (element.className == "card card_2") {
                    success++
                    $(element).removeClass('card_2').addClass('card_3');
                    continue;
                } else if (element.className == "card card_1") {
                    success++
                    $(element).removeClass('card_1').addClass('card_2');
                    continue;
                } else if (element.className == "card card_front") {
                    success++
                    $(element).removeClass('card_front').addClass('card_1');
                } else if (element.className == "card card_3") {
                    success++
                    $(element).removeClass('card_3').addClass('card_back');
                    continue;
                }
            }
        }
    });

    var source = new EventSource("db_live_update_clicks.php");
    source.onmessage = function (event) {
        document.getElementById("result").innerHTML += event.data + "<br>";
    };

    $('.hamburger').click(function () {
        console.log('clicked');
        $('.nav-list').toggleClass('active');
    })

})