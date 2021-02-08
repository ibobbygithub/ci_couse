<?php
class Student extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Student_model');
        $this->load->model('Program_model');
        $this->load->model('Faculty_model');
    }
    # code..

    public function index()
    {
        //print_r($this->Student_model->getAll());
        //$data['students']

        $data['student'] = $this->Student_model->getAll();
        $data['content'] = "Student/index";
        $this->load->view('layout/main', $data);
    }

    public function showForm()
    {
        $this->form_validation->set_rules('student_id', 'student_id', 'required', array('required' => 'You must provide a %s.'));
        $this->form_validation->set_rules('student_name', 'student_name', 'required', array('required' => 'You must provide a %s.'));
        $this->form_validation->set_rules('student_lastname', 'student_lastname', 'required', array('required' => 'You must provide a %s.'));
        $this->form_validation->set_rules('student_email', 'student_email', 'required', array('required' => 'You must provide a %s.'));
        $this->form_validation->set_rules('student_faculty', 'student_faculty', 'required', array('required' => 'You must provide a %s.'));
        $this->form_validation->set_rules('student_program', 'student_program', 'required', array('required' => 'You must provide a %s.'));

        if ($this->form_validation->run() == FALSE) {
            $data['method'] = '';
            $this->session->set_flashdata("flash_errors", validation_errors());
            $facultys = $this->Faculty_model->getAll();
            $arr = array('เลือกสาขา');
            foreach ($facultys as $faculty) {
                $arr[$faculty->ID] = $faculty->FACULTY;
            }
            $data['faculty'] = $arr;

            $programs = $this->Program_model->getAll();
            $arr = array('เลือกวิชา');
            foreach ($programs as $program) {
                $arr[$program->ID] = $program->PROGRAM;
            }
            $data['program'] = $arr;

            $data['content'] = "Student/form";
            $this->load->view('layout/main', $data);
        } else {
            $data['STUDENT_ID'] = $this->input->post('student_id');
            $data['FIRSTNAME'] = $this->input->post('student_name');
            $data['LASTNAME'] = $this->input->post('student_lastname');
            $data['EMAIL'] = $this->input->post('student_email');
            $data['FACULTY'] = $this->input->post('student_faculty');
            $data['PROGRAM'] = $this->input->post('student_program');
            //$data['content'] = 'Student/form';
            $this->db->insert('users', $data);
            redirect('Student/index');
        }
    }

    public function editForm($id)
    {
        $this->form_validation->set_rules('student_id', 'student_id', 'required', array('required' => 'You must provide a %s.'));
        $this->form_validation->set_rules('student_name', 'student_name', 'required', array('required' => 'You must provide a %s.'));
        $this->form_validation->set_rules('student_lastname', 'student_lastname', 'required', array('required' => 'You must provide a %s.'));
        $this->form_validation->set_rules('student_email', 'student_email', 'required', array('required' => 'You must provide a %s.'));
        $this->form_validation->set_rules('student_faculty', 'student_faculty', 'required', array('required' => 'You must provide a %s.'));
        $this->form_validation->set_rules('student_program', 'student_program', 'required', array('required' => 'You must provide a %s.'));

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata("flash_errors", validation_errors());

            $facultys = $this->Faculty_model->getAll();
            
            $arr = array('เลือกวิชา');
            foreach ($facultys as $faculty) {
                $arr[$faculty->ID] = $faculty->FACULTY;
            }
            $data['faculty'] = $arr;

            $programs = $this->Program_model->getAll();
            $arr = array('เลือกสาขา');
            foreach ($programs as $program) {
                $arr[$program->ID] = $program->PROGRAM;
            }
            $data['program'] = $arr;
            $data['method'] = 'edit';
            $data['users'] = $this->Student_model->getOne($id);
            $data['content'] = "Student/form";
            $this->load->view('layout/main', $data);
        } else {
            $data['STUDENT_ID'] = $this->input->post('student_id');
            $data['FIRSTNAME'] = $this->input->post('student_name');
            $data['LASTNAME'] = $this->input->post('student_lastname');
            $data['EMAIL'] = $this->input->post('student_email');
            $data['FACULTY'] = $this->input->post('student_faculty');
            $data['PROGRAM'] = $this->input->post('student_program');
            //$data['content'] = 'Student/form';
            $this->db->where('ID',$id);
            $this->db->update('users', $data);
            redirect('Student/index');
        }
    }

    public function delete($id)
    {
        $this->db->where('ID', $id);
        $this->db->delete('users');
        redirect("Student/index");
    }
}
