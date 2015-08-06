/**
 * Created by qichenglao on 2015-07-22.
 */

var Employee = function() {

    this.__contruct = function() {
        console.log("Employee Created");
        Template = new Template();
        Event = new Event();
        Result = new Result();

        //console.log(
        //    Template.employee({employee_id: 1, content: "this is life"})
        //);

        get_employee();
        delete_employee();
        //update_employee();
    };

    //---------------------------------------------------------------------------

    var get_employee = function() {
        $.get('api/get_employee', function(o) {

            var output = '';
            for(var i = 0; i < o.length; i++) {
                output += Template.employee(o[i]);
            }
            $("#employee_table").html(output);

        }, 'json');

    };

    var delete_employee = function() {
        $("body").on('click', '.employee_delete', function(evt) {
            evt.preventDefault();

            var self = $(this).closest('tr');
            var url = $(this).attr('href');
            var postData = {
                'employee_id': $(this).attr('employee_id')
            };

            $.post(url, postData, function(o) {
                if(o.result == 1) {
                    Result.success('Employee successfully deleted.');
                    self.remove();
                } else {
                    Result.error(o.error);
                }
            }, 'json');
        });
    };

    /*var update_employee = function() {
        $("body").on('click', '.employee_update', function(evt) {
            evt.preventDefault();

            var url = $(this).attr('href');
            var postData = {
                'employee_id': $(this).attr('employee_id')
            };

            $.post(url, postData, function(o) {
                if(o.result == 1) {
                    Result.success('Employee successfully updated.');
                } else {
                    Result.error(o.error);
                }
            }, 'json');
        });
    };*/


    //---------------------------------------------------------------------------

    var load_car = function() {

    };

    //---------------------------------------------------------------------------

    this.__contruct();

};