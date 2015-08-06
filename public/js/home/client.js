/**
 * Created by qichenglao on 2015-08-05.
 */

var Client = function() {

    this.__contruct = function() {
        console.log("Client Created");
        Template = new Template();
        Event = new Event();
        Result = new Result();


        get_client();
        delete_client();

    };

    //---------------------------------------------------------------------------

    var get_client = function() {
        $.get('api/get_client', function(o) {

            var output = '';
            for(var i = 0; i < o.length; i++) {
                output += Template.client(o[i]);
            }
            $("#client_table").html(output);

        }, 'json');

    };

    var delete_client = function() {
        $("body").on('click', '.client_delete', function(evt) {
            evt.preventDefault();

            var self = $(this).closest('tr');
            var url = $(this).attr('href');
            var postData = {
                'client_id': $(this).attr('client_id')
            };

            $.post(url, postData, function(o) {
                if(o.result == 1) {
                    Result.success('Client successfully deleted.');
                    self.remove();
                } else {
                    Result.error(o.error);
                }
            }, 'json');
        });
    };


    this.__contruct();


};

