<?php 

class Insurers extends Controller
{
    public function __construct()
    {
        $this->model = $this->model('Insurer');
        $this->service = $this->service('InsurerService');
    }

    public function index()
    {
        $this->view('insurers/index');
    }

    public function display()
    {
        $insurers = $this->service->read();
        
        $data = [
            'insurers' => $insurers
        ];

        echo json_encode($data);
    }
}