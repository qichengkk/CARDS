<?php
/**
 * Created by PhpStorm.
 * User: qichenglao
 * Date: 2015-07-22
 * Time: 12:45 PM
 */

class Api extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

    }

    private function _require_login()
    {
        if($this->session->userdata('employee_id') == false) {
            $this->output->set_output(json_encode(['result' => 0, 'error' => 'Please login.']));
            return false;
        } else {
            return true;
        }
    }

    private function _require_salesman()
    {
        if($this->_require_login() == false) {
            return false;
        }
        if ($this->session->userdata('role') != "Salesman" && $this->session->userdata('role') != "Manager") {
            $this->output->set_output(json_encode(['result' => 0, 'error' => 'You are not authorized.']));
            return false;
        } else {
            return true;
        }
    }

    private function _require_manager()
    {
        if($this->_require_salesman() == false) {
            return false;
        }
        if($this->session->userdata('role') != "Manager") {
            $this->output->set_output(json_encode(['result' => 0, 'error' => 'You are not authorized.']));
            return false;
        } else {
            return true;
        }
    }



    /*************************************************************
     *
     *
     *
     *  api functions for Employee
     *
     *************************************************************
     */

    public function login()
    {
        $this->output->set_content_type('application_json');

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('pwd', 'Password', 'required');

        if($this->form_validation->run() == false) {
            $this->output->set_output(json_encode(['result' => 0, 'error' => $this->form_validation->error_array()]));
            return false;
        }

        $email = $this->input->post('email');
        $pwd = $this->input->post('pwd');

        $this->load->model('employee_model');
        $result = $this->employee_model->get([
            'email' => $email,
            'password' => hash('sha256', $pwd. SALT)
        ]);

        if($result) {
            $this->session->set_userdata([
                'employee_id' => $result[0]['EId'],
                'name' => $result[0]['name'],
                'role' => $result[0]['role']
            ]);
            $this->output->set_output(json_encode(['result' => 1]));
            return false;
        }

        //echo validation_errors();
        //$this->output->set_output(json_encode(['result' => 0]));
        //$this->form_validation->set_message('Password', 'does not match');

        $this->output->set_output(json_encode(['result' => 0, 'error' => ['The Login does not match.']]));


        //die;
        /*$this->session->set_userdata([
            'employee_id' => 1
        ]);
        print_r($this->session->all_userdata());*/


    }

    public function register()
    {
        if($this->_require_manager() == false) {
            return false;
        }

        $this->output->set_content_type('application_json');

        $this->form_validation->set_rules('name', 'Name', 'required|max_length[50]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[employee.email]');
        $this->form_validation->set_rules('pwd', 'Password', 'required|min_length[4]');
        $this->form_validation->set_rules('role', 'Role', 'required');

        if($this->form_validation->run() == false) {
            $this->output->set_output(json_encode(['result' => 0, 'error' => $this->form_validation->error_array()]));
            return false;
        }

        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $pwd = $this->input->post('pwd');
        $role= $this->input->post('role');

        $this->load->model('employee_model');
        $employee_id = $this->employee_model->insert([
            'name' => $name,
            'password' => hash('sha256', $pwd. SALT),
            'email' => $email,
            'role' => $role
        ]);

        if($employee_id) {
            $this->output->set_output(json_encode(['result' => 1]));
            return false;
        }

        $this->output->set_output(json_encode(['result' => 0, 'error' => 'Employee not created.']));

    }

    public function get_employee($employee_id = null)
    {
        if($this->_require_manager() == false) {
            return false;
        }

        $this->load->model('employee_model');
        $result = $this->employee_model->get($employee_id);
        $this->output->set_output(json_encode($result));

        /*$cur_eid = $this->session->userdata('employee_id');

        $this->load->model('employee_model');
        $result = $this->employee_model->get([
            'eid' => $cur_eid
        ]);*/

//        $this->db->where('eid', $this->session->userdata('employee_id'));
//        $this->db->where('eid', 2);
//        $query = $this->db->get('employee');
//        $result = $query->result_array();
//
//        print_r($result);
    }


    public function update_employee($employee_id)
    {
        if($this->_require_login() == false) {
            return false;
        }

        $name = $this->input->post('name');
        $pwd = $this->input->post('pwd');
        $role= $this->input->post('role');

        $this->output->set_content_type('application_json');

        $this->form_validation->set_rules('name', 'Name', 'required|max_length[16]');
        $this->form_validation->set_rules('role', 'Role', 'required');
        if($pwd != "") {
            $this->form_validation->set_rules('pwd', 'Password', 'min_length[4]');
        }

        if($this->form_validation->run() == false) {
            $this->output->set_output(json_encode(['result' => 0, 'error' => $this->form_validation->error_array()]));
            return false;
        }


        $this->load->model('employee_model');
        if($pwd == "") {
            //$result = $this->employee_model->update(['name' => 'Peggy'], 3);
            $result = $this->employee_model->update([
                'name' => $name,
                'role' => $role
            ], $employee_id);
        } else {
            $result = $this->employee_model->update([
                'name' => $name,
                'password' => hash('sha256', $pwd. SALT),
                'role' => $role
            ], $employee_id);
        }

        if($this->session->userdata('role') == "Manager" && $this->session->userdata('employee_id') == $employee_id) {
            $this->session->set_userdata([
                'role' => $role
            ]);
        }

        if($this->session->userdata('employee_id') == $employee_id) {
            $this->session->set_userdata([
                'name' => $name
            ]);
        }

        $this->output->set_output(json_encode(['result' => 1]));
        return false;

    }


    public function delete_employee()
    {
        if($this->_require_manager() == false) {
            return false;
        }

        $id_delete = $this->input->post("employee_id");

        if($id_delete == $this->session->userdata('employee_id')) {
            $this->output->set_output(json_encode(['result' => 0, 'error' => 'You can not delete yourself.']));
            return false;
        }

        $this->load->model('employee_model');
        $result = $this->employee_model->delete($id_delete);

//        $result = $this->db->delete('employee', [
//            'EId' => $this->input->post("employee_id")
//        ]);

        if($result) {
            $this->output->set_output(json_encode(['result' => 1]));
            return false;
        }

        $this->output->set_output(json_encode(['result' => 0, 'error' => 'Employee not deleted.']));

    }


    /*************************************************************
     *
     *
     *
     *  api functions for Car
     *
     *************************************************************
     */

    public function create_car()
    {
        $this->_require_login();

    }

    public function update_car()
    {
        $this->_require_login();

    }

    public function delete_car()
    {
        $this->_require_login();

    }


    /*************************************************************
     *
     *
     *
     *  api functions for Client
     *
     *************************************************************
     */

    public function get_client($client_id = null)
    {
        if($this->_require_salesman() == false) {
            return false;
        }

        $this->load->model('client_model');
        $clients = $this->client_model->get($client_id);

        foreach ($clients as &$client) {
            $client['cut_off_year'] = $this->get_cut_off_year($client['country']);
        }

        $this->output->set_output(json_encode($clients));

    }

    private function get_cut_off_year($country_name)
    {
        $this->load->model('country_model');
        $country = $this->country_model->get($country_name);

        if($country_name == 'Canada')
            return 'Unlimited';

        foreach ($country as $c) {
            if($c['name'] == $country_name)
                return $c['cut_off_year'];
        }

        return 'Unknown';

    }

    function required_double_check($str) {
        if ($str == "Select type..." || $str == "Select country...") {
            $this->form_validation->set_message('required_double_check', 'The %s field is required.');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function add_client()
    {
        if($this->_require_salesman() == false) {
            return false;
        }

        $this->output->set_content_type('application_json');

/*        name VARCHAR(50) NOT NULL,
        type VARCHAR(10) NOT NULL,
        address VARCHAR(100) NOT NULL,
        country VARCHAR(50) NOT NULL DEFAULT 'Canada',
        phone VARCHAR(24) NOT NULL,*/

        $this->form_validation->set_rules('client_name', 'Name', 'required|max_length[50]');
        $this->form_validation->set_rules('client_type', 'Type', 'required|callback_required_double_check');
        $this->form_validation->set_rules('client_phone', 'Phone', 'required');
        $this->form_validation->set_rules('client_address', 'Address', 'required');
        /*$this->form_validation->set_rules('client_city', 'City', 'required');
        $this->form_validation->set_rules('client_state', 'State', 'required');
        $this->form_validation->set_rules('client_postal', 'Postal', 'required');*/
        $this->form_validation->set_rules('client_country', 'Country', 'required|callback_required_double_check');

        if($this->form_validation->run() == false) {
            $this->output->set_output(json_encode(['result' => 0, 'error' => $this->form_validation->error_array()]));
            return false;
        }

        $name = $this->input->post('client_name');
        $type = $this->input->post('client_type');
        $phone = $this->input->post('client_phone');
        $address = $this->input->post('client_address');
        $country = $this->input->post('client_country');

        $this->load->model('client_model');
        $client_id = $this->client_model->insert([
            'name' => $name,
            'type' => $type,
            'address' => $address,
            'country' => $country,
            'phone' => $phone
        ]);

        if($client_id) {
            $this->output->set_output(json_encode(['result' => 1]));
            return false;
        }

        $this->output->set_output(json_encode(['result' => 0, 'error' => 'Client not created.']));

    }

    public function update_client()
    {
        if($this->_require_salesman() == false) {
            return false;
        }

        $name = $this->input->post('client_name');
        $type = $this->input->post('client_type');
        $phone = $this->input->post('client_phone');
        $address = $this->input->post('client_address');
        $country = $this->input->post('client_country');

        $this->output->set_content_type('application_json');

        $this->form_validation->set_rules('client_name', 'Name', 'required|max_length[50]');
        $this->form_validation->set_rules('client_type', 'Type', 'required|callback_required_double_check');
        $this->form_validation->set_rules('client_phone', 'Phone', 'required');
        $this->form_validation->set_rules('client_address', 'Address', 'required');
        $this->form_validation->set_rules('client_country', 'Country', 'required|callback_required_double_check');

        if($this->form_validation->run() == false) {
            $this->output->set_output(json_encode(['result' => 0, 'error' => $this->form_validation->error_array()]));
            return false;
        }


        $this->load->model('client_model');
        $result = $this->_model->update([
            'name' => $name,
            'password' => hash('sha256', $pwd. SALT),
            'role' => $role
        ], $employee_id);


        $this->output->set_output(json_encode(['result' => 1]));
        return false;

    }

    public function delete_client()
    {
        if($this->_require_salesman() == false) {
            return false;
        }

        $id_delete = $this->input->post("client_id");

        $this->load->model('client_model');
        $result = $this->client_model->delete($id_delete);

        if($result) {
            $this->output->set_output(json_encode(['result' => 1]));
            return false;
        }

        $this->output->set_output(json_encode(['result' => 0, 'error' => 'Client not deleted.']));

    }


    /*************************************************************
     *
     *
     *
     *  api functions for Transaction
     *
     *************************************************************
     */

    public function create_transaction()
    {
        $this->_require_login();

    }

    public function update_transaction()
    {
        $this->_require_login();

    }

    public function delete_transaction()
    {
        $this->_require_login();

    }

}