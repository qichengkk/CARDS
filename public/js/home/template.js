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


    /*<tr>
    <th></th>
    <th>ID</th>
    <th>Name</th>
    <th>Type</th>
    <th>Address</th>
    <th>Country (Canada if not a port)</th>
    <th>Cut_off_year</th>
    <th>Phone</th>
    </tr>*/

    this.client = function(obj) {

        var output = '';
        output += '<tr id="'+ obj['CId'] +'">';

        output += '<td><span class="glyphicon glyphicons-nameplate-alt"></span></td>td>';
        output += '<td>' + obj['CId'] + '</td>';
        output += '<td>' + obj['name'] + '</td>';
        output += '<td>' + obj['type'] + '</td>';
        output += '<td>' + obj['address'] + '</td>';
        output += '<td>' + obj['country'] + '</td>';
        output += '<td>' + obj['cut_off_year'] + '</td>';
        output += '<td>' + obj['phone'] + '</td>';
        output += '<td>';
        output += '<a href="client/show/' + obj['CId'] + '"><span class="glyphicon glyphicon-search"></span></a>';
        output += '<a "class="client_update" href="client/update/' + obj['CId'] + '"><span class="glyphicon glyphicon-pencil"></span></a>';
        output += '<a client_id="' + obj['CId'] + '"class="client_delete" href="api/delete_client/"><span class="glyphicon glyphicon-remove"></span></a>';
        output += '</td>';
        output += '</tr>';

        return output;
    };

    //---------------------------------------------------------------------------

    this.__contruct();


};
