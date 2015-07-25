/**
 * Created by qichenglao on 2015-07-22.
 */


var Template = function() {

    this.__contruct = function() {
        console.log("Template Created");
    };

    //---------------------------------------------------------------------------

    this.employee = function(obj) {

        var output = '';
        output += '<tr id="'+ obj['EId'] +'">';

        output += '<td><span class="glyphicon glyphicon-user"></span></td>td>';
        output += '<td>' + obj['EId'] + '</td>';
        output += '<td>' + obj['name'] + '</td>';
        output += '<td>' + obj['email'] + '</td>';
        output += '<td>' + obj['role'] + '</td>';
        output += '<td>';
        //output += '<a href="show.html"><span class="glyphicon glyphicon-search"></span></a>';
        output += '<a href="employee/show/' + obj['EId'] + '"><span class="glyphicon glyphicon-search"></span></a>';
        output += '<a "class="employee_update" href="employee/update/' + obj['EId'] + '"><span class="glyphicon glyphicon-pencil"></span></a>';
        output += '<a employee_id="' + obj['EId'] + '"class="employee_delete" href="api/delete_employee/"><span class="glyphicon glyphicon-remove"></span></a>';
        output += '</td>';
        output += '</tr>';

        return output;
    };

    /*<tr>
    <td><span class="glyphicon glyphicon-user"></span></td>
    <td>E0938340</td>
    <td>John Smith</td>
    <td>john.smith@johnsmitporsche.com</td>
    <td>Manager</td>
    <td>
    <a href="show.html"><span class="glyphicon glyphicon-search"></span></a>
    <a href="edit.html"><span class="glyphicon glyphicon-pencil"></span></a>
    <a href="#"><span class="glyphicon glyphicon-remove"></span></a>
    </td>
    </tr>*/

    //---------------------------------------------------------------------------

    this.car = function(obj) {

        var output = '';
        output += '<div id="'+ obj.car_id +'">';

        output += '<span>' + obj.content + '</span>';
        output += '</div>';

        return output;
    };

    //---------------------------------------------------------------------------

    this.__contruct();


};
