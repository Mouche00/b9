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

        echo json_encode($insurers);
    }

    public function add()
    {
        $insurer = new $this->model();
        $insurer->id = uniqid(mt_rand(), true);
        $insurer->name = $_POST['name'];
        $insurer->address = $_POST['address'];

        $this->service->create($insurer);
    }

    public function edit()
    {
        $insurer = new $this->model();
        $insurer->id = $_POST['id'];
        $insurer->name = $_POST['name'];
        $insurer->address = $_POST['address'];

        $this->service->update($insurer);
    }

    public function get($id)
    {
        $insurer = $this->service->fetch($id);

        echo json_encode($insurer);
    }

    public function remove($id)
    {
        $insurer = $this->service->delete($id);
    }
}