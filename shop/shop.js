var SHOP_ID = Number($(location).attr('href').substr(-1));
var HOSTNAME = 'http://hosting2033046.online.pro';

var shopName = '';
var shopSize = 0;
var amount = 0;

function refreshInfo() {
    $.ajax({
        url: HOSTNAME + "/api/shops.php",
        type: 'GET',
        success: function (resp) {
            returnedData = JSON.parse(resp);
            shopName = returnedData[SHOP_ID].name;
            shopSize = Number(returnedData[SHOP_ID].shopSize);
            amount = Number(returnedData[SHOP_ID].amountOfPeople);

            $('#shopName').html(shopName);
            $('#inTheShop').html(Math.min(shopSize, amount) + '/' + shopSize);
            $('#inTheLine').html(Math.max(0, amount - shopSize));
        },
        error: function (e) {
            alert('Error: ' + e);
        }
    });
}

$(function () {
    refreshInfo();
    $("#plusButton").click(function () {
        $.ajax({
            url: HOSTNAME + "/api/people.php?id=" + SHOP_ID + "&value=" + (amount + 1),
            type: 'GET',
            success: function (resp) {
                refreshInfo();
            },
            error: function (e) {
                alert('Error: ' + e);
            }
        });

    });
    $("#minusButton").click(function () {
        $.ajax({
            url: HOSTNAME + "/api/people.php?id=" + SHOP_ID + "&value=" + (amount - 1),
            type: 'GET',
            success: function (resp) {
                refreshInfo();
            },
            error: function (e) {
                alert('Error: ' + e);
            }
        });

    });

});
