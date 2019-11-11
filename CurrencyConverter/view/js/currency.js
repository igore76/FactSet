/**
 * @author      Igor Jankovic
 * @copyright   Copyright © 2019 Igor Jankovic. All rights reserved.
 */

$(function() {
    var data = null,
    controllerUrl = "../../index.php";

    initCurrencyConverter();

    $("#currency-from").change(function() {
        updateAvailableCurrencies(this);
    });

    $(".currency-converter #submit").click(function (event) {
        event.preventDefault();
        var postdata = {from: $("#currency-from").val(), to: $("#currency-to").val(), amount: $("#currency-amount").val(),action: "calculate"};
        successHandler = function() {  showProfileArea("mysubscriptions"); }
        ajaxCall(postdata,displayAnswer);
    });

    function updateAvailableCurrencies(obj){
        var searchField = $(obj).val();
        var select = $("#currency-to");
        select.find('option').remove().end();
        var availableCurrencies = getElementByKey(searchField);
        console.log(availableCurrencies);
        $.each(availableCurrencies, function(key,value) {
            $("<option />", {value: key, text: key}).appendTo(select);
        });
    }

    function initCurrencyConverter(){
        var postdata = {action: "currencies"};
        ajaxCall(postdata,buildDropdown);
    }

    function ajaxCall(postdata,successHandler){
        $.ajax({
            type: "POST",
            data: postdata,
            url: controllerUrl,
            success: function(response){
                successHandler(response);
            },
            error:function(){
                //todo
            }
        });
    }

    function displayAnswer(response){
        var obj = jQuery.parseJSON(response);
        if(obj.status == 'success'){
            $("#currency-result").html(parseFloat($("#currency-amount").val()).toFixed(2) + " " + $("#currency-from").val() + " = " + obj.answer + " " + $("#currency-to").val());
        }else if(obj.status == 'error'){
            $("#currency-result").html(obj.message);
        }
    }

    function buildDropdown(response){
        var obj = jQuery.parseJSON(response);
        data = obj;
        var select = $("#currency-from");
        select.find('option').remove().end();
        $.each(obj, function(key,value) {
            $("<option />", {value: key, text: key}).appendTo(select);
        });
        updateAvailableCurrencies($("#currency-from"));
    }


    function getElementByKey(key) {
        var found = null;

        $.each(data, function(index, element) {
            if (index == key) {
                found = element;
                return found;
            }
        });
        return found;
    }

});





