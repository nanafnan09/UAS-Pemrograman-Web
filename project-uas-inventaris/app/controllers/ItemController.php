<?php
class ItemController extends Controller {
    public function __construct(){
        if(!isset($_SESSION['user_id'])) { header('Location: ' . BASEURL); exit; }
    }

    public function index() {
        $keyword = $_POST['keyword'] ?? $_SESSION['keyword'] ?? null;
        if(isset($_POST['reset'])) $keyword = null;
        $_SESSION['keyword'] = $keyword;

        $page = $_GET['page'] ?? 1;
        $data['items'] = $this->model('ItemModel')->getAll($page, $keyword);
        $total = $this->model('ItemModel')->countItems($keyword);
        $data['pages'] = ceil($total / 5);
        $data['page'] = $page;

        $this->view('templates/header');
        $this->view('items/index', $data);
        $this->view('templates/footer');
    }

    public function create() {
        if($_SESSION['role'] != 'admin') return;
        $this->view('templates/header');
        $this->view('items/create');
        $this->view('templates/footer');
    }

    public function store() {
        if($this->model('ItemModel')->add($_POST)) header('Location: ' . BASEURL . '/item');
    }

    public function edit($id) {
        if($_SESSION['role'] != 'admin') return;
        $data['item'] = $this->model('ItemModel')->getById($id);
        $this->view('templates/header');
        $this->view('items/edit', $data);
        $this->view('templates/footer');
    }

    public function update() {
        if($this->model('ItemModel')->update($_POST)) header('Location: ' . BASEURL . '/item');
    }

    public function delete($id) {
        if($_SESSION['role'] == 'admin') $this->model('ItemModel')->delete($id);
        header('Location: ' . BASEURL . '/item');
    }
}