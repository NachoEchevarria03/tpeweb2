<?php
require_once './app/models/products.model.php';
require_once './app/views/products.view.php';
require_once './app/models/categories.model.php';
require_once './app/helpers/auth.helper.php';


class productsController {
    private $model;
    private $view;
    private $modelCategories;
    private $authHelper;


    public function __construct() {
        $this->model = new productsModel();
        $this->view = new productsView();
        $this->modelCategories = new categoriesModel();
        $this->authHelper = new authHelper();
    }


    public function showProducts() {
        $products = $this->model->getAllProducts();
        $categories = $this->modelCategories->getCategories();
        $this->view->showProducts($products, $categories);
    }

    
    function showProductsByCategory($category) {
        $products = $this->model->getProductsByCategories($category);
        $this->view->showProductsByCategories($products, $category);
    }

    function addProduct() {
        $this->authHelper->checkLoggedIn();
        $products = $this->model->getAllProducts();
        $categories = $this->modelCategories->getCategories();
        $nombre = $_POST['nombre'];
        $talle = $_POST['talle'];
        $precio = $_POST['precio'];
        $url = $_POST['url'];
        $id_categoria = $_POST['categoria'];
        if (isset($nombre) && !empty($nombre) && isset($talle) && !empty($talle) && isset($precio) && !empty($precio) && isset($id_categoria) && !empty($id_categoria)){
        $id = $this->model->insertProduct($nombre, $talle, $precio, $url, $id_categoria);
        header("Location: " . BASE_URL);
        }else{
            $this->view->showProducts($products, $categories,"Complete todos los campos por favor!!");
        }
    }
    

    function deleteProduct($id) {
        if(isset($_SESSION["USER_EMAIL"])){ //es la funcion checkLoggedIn, porque no me funcionaba poniendolo normal.
        $this->model->deleteProductById($id);
        header("Location: " . BASE_URL);
        } else {
            header("Location:".BASE_URL. "login");
        }    
    }

    function showFormEdit($id) {
        $this->authHelper->checkLoggedIn();
        $categories = $this->modelCategories->getCategories();
        $product = $this->model->getProd($id);
        $this->view->showFormEdit($categories,$product);
    }

    function editProduct() {
        $this->authHelper->checkLoggedIn();
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $talle = $_POST['talle'];
        $precio = $_POST['precio'];
        $url = $_POST['url'];
        $id_categoria = $_POST['categoria'];

        $categories = $this->modelCategories->getCategories();
        $product = $this->model->getProd($id);

        if (isset($nombre) && !empty($nombre) && isset($talle) && !empty($talle) && isset($precio) && !empty($precio) && isset($id_categoria) && !empty($id_categoria)){
        $this->model->editProductById($id,$nombre,$talle,$precio,$url,$id_categoria);
        header("Location: " . BASE_URL);   
        }else{
            $this->view->showFormEdit($categories,$product,"Complete todos los campos por favor!!");
        }
    }
    
    function showDetailProduct($id){
        $product =$this->model->getDetail($id);
        $this->view->showDetail($product);
    }
    

}