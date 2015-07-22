/**
 * Created by qichenglao on 2015-07-22.
 */

var Home = function() {

    this.__contruct = function() {
        console.log("Home Created");
        Template = new Template();
        Result_home = new Result();
        Event = new Event();

        //console.log(
        //    Template.employee({employee_id: 1, content: "this is life"})
        //);

        load_employee();

    };

    //---------------------------------------------------------------------------

    var load_employee = function() {
        $.get('api/get_employee', function(o) {

            var output = '';
            for(var i = 0; i < o.length; i++) {
                output += Template.employee(o[i]);
            }
            $("#employee_table").html(output);

        }, 'json');

    };

    //---------------------------------------------------------------------------

    var load_car = function() {

    };

    //---------------------------------------------------------------------------

    this.__contruct();

};