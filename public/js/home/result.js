/**
 * Created by qichenglao on 2015-07-22.
 */


var Result = function() {

    this.__contruct = function() {
        console.log("Result Created");
    };

    this.success = function(msg) {
        if(typeof msg === 'undefined') {
            $("#success").html("Success").fadeIn();
        };
        $("#success").html(msg).fadeIn();

        setTimeout(function() {
           $("#success").fadeOut();
        }, 5000);
    };

    this.error = function(msg) {
        if(typeof msg === 'undefined') {
            $("#error").html("Error").fadeIn();
        };
        $("#error").html(msg).fadeIn();

        setTimeout(function() {
            $("#error").fadeOut();
        }, 5000);

    };

    //---------------------------------------------------------------------------

    this.__contruct();



};
