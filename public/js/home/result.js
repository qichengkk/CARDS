/**
 * Created by qichenglao on 2015-07-22.
 */


var Result = function() {

    this.__contruct = function() {
        console.log("Result Created");
    };

    this.success = function(msg) {
        if(typeof msg === 'undefined') {
            console.log('success');
        };
      console.log(msg);
    };

    this.error = function() {
        if(typeof msg === 'undefined') {
            console.log('error');
        };
        console.log(msg);
    };

    //---------------------------------------------------------------------------

    this.__contruct();



};
