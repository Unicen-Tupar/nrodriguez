<?php
require_once('views/view_producto.php');
require_once('models/model_producto.php');

class controllerProducto{
  private $vista;
  private $model;

  function __construct(){
    $this->vista = new viewProducto();
    $this->model = new modelProducto();
  }

private function validaCampo($caracteristica){
    if (isset($caracteristica) && strlen(trim($caracteristica))>0){
      return true;
    }
    else {
      return false;
    }
  }

function insertarProducto($action){
      $errores=array();
      $producto=array();
      if ($this->validaCampo($_POST['producto'])){
        $producto['nombre'] = $_POST['producto'];
      }
      else {
        $errores['nombre'] = "Error: El campo nombre está vacio";
      }
      if ($this->validaCampo($_POST['precio'])){
        $producto['precio'] = $_POST['precio'];
      }
      else{
        $errores['precio'] = "Error: El campo precio está vacio";
      }
      if ($this->validaCampo($_POST['marca'])){
        $producto['marca'] = $_POST['marca'];
      }
      else{
        $errores['marca'] = "Error: El campo marca está vacio";
      }
      if ($this->validaCampo($_POST['color'])){
        $producto['color'] = $_POST['color'];
      }
      else{
        $errores['color'] = "Error: El campo color está vacio";
      }
      if ($this->validaCampo($_POST['display'])){
        $producto['display'] = $_POST['display'];
      }
      else{
        $errores['display'] = "Error: El campo display está vacio";
      }
      if ($this->validaCampo($_POST['procesador'])){
        $producto['procesador'] = $_POST['procesador'];
      }
      else{
        $errores['procesador'] = "Error: El campo procesador está vacio";
      }
      if ($this->validaCampo($_POST['camPrin'])){
        $producto['camPrin'] = $_POST['camPrin'];
      }
      else {
        $errores['camPrin'] = "Error: El campo camara primaria está vacio";
      }
      if ($this->validaCampo($_POST['camSec'])){
        $producto['camSec'] = $_POST['camSec'];
      }
      else {
        $errores['camSec'] = "Error: El campo camara secundaria está vacio";
      }
      if ($this->validaCampo($_POST['so'])){
        $producto['so'] = $_POST['so'];
      }
      else{
        $errores['so']="Error: El campo sistema operativo está vacio";
      }
      if ($this->validaCampo($_POST['red'])){
        $producto['red'] = $_POST['red'];
      }
      else{
        $errores['red'] = "Error: El campo red está vacio";
      }
      if ($this->validaCampo($_POST['fBanda'])){
        $producto['fBanda'] = $_POST['fBanda'];
      }
      else{
        $errores['fbanda'] = "Error: El campo frecuencia está vacio";
      }
      if ($this->validaCampo($_POST['bateria'])){
        $producto['bateria'] = $_POST['bateria'];
      }
      else{
        $errores['bateria'] = "Error: El campo bateria está vacio";
      }

      if ($this->validaCampo($_POST['tiempo'])){
        $producto['tiempo'] = $_POST['tiempo'];
      }
      else {
        $errores['tiempo'] = "Error: El campo tiempo está vacio";
      }
      if ($this->validaCampo($_POST['memoriaI'])){
        $producto['memoriaI'] = $_POST['memoriaI'];
      }
      else {
        $errores['memoriaI'] = "Error: El campo memoria interna está vacio";
      }
      if ($this->validaCampo($_POST['peso'])){
        $producto['peso'] = $_POST['peso'];
      }
      else{
        $errores['peso'] = "Error: El campo peso está vacio";
      }

      if ($this->validaCampo($_POST['dimension'])){
        $producto['dimension'] = $_POST['dimension'];
      }
      else{
        $errores['dimension'] = "Error: El campo dimension está vacio";
      }
      if ($this->validaCampo($_POST['dimension'])){
        $producto['dimension'] = $_POST['dimension'];
      }
      if ($this->validaCampo($_POST['pantalla'])){
        $producto['pantalla'] = $_POST['pantalla'];
      }
      else{
        $errores['pantalla'] = "Error: El campo pantalla está vacio";
      }
      if ($this->validaCampo($_POST['bluetooth'])){
        $producto['bluetooth'] = $_POST['bluetooth'];
      }
      else{
        $errores['bluetooth'] = "Error: El campo bluetooth está vacio";
      }
      if ($this->validaCampo($_POST['marcaPorVoz'])){
        $producto['marcaPorVoz'] = $_POST['marcaPorVoz'];
      }
      else {
        $errores['marcaPorVoz'] = "Error: El campo marcación por voz está vacio";
      }
      if ($this->validaCampo($_POST['categoria'])){
        $producto['categoria'] = $_POST['categoria'];
      }
      else {
        $errores['categoria'] = "Error: El campo categoria está vacio";
      }
      if (sizeof($errores)==0) {
        $this->model->setProducto($producto);
        $this->mostrarFormProducto($errores,$action);
      }
      else{
        $this->mostrarFormProducto($errores,'insertar');
      }
}

function mostrarFormProducto($errores,$action){
  $this->vista->getFormProducto('Insertar Producto',$errores,$action);
}

function mostrarTodosProductos(){
      $productos = $this->model->getProductos();
      $productosAMostrar = array();
      foreach ($productos as $producto) {
            $productosAMostrar[]= $producto;
        }
    return var_dump($productosAMostrar);  
      /*$this->vista->mostrarProductos();*/
}
}
?>
