<?php

class modelCategoria{
  private $db;

  public function __construct(){
    $this->db = new PDO('mysql:host=localhost;'. 'dbname=cps; charset=utf8',
                        'root','');
  }

  public function setCategoria($nombre){
    $insertar = $this->db->prepare("INSERT INTO categoria(nombre) VALUES (?)");
    $insertar->execute(array($nombre));
  }

  public function getCategoria($nombre){
    $consulta = $this->db->prepare("SELECT * FROM categoria
                                    WHERE nombre LIKE ?");
    $categoria=$consulta->execute(array($nombre));
    return $consulta->fetch();
  }

  public function getCategorias(){
    $consulta = $this->db->prepare("SELECT * FROM categoria");
    $categorias = $consulta->execute();
    return $consulta->fetchAll();
  }

  public function cantidadProductoByCat($id){
    $consulta = $this->db->prepare("SELECT * FROM categoria c
                                   JOIN producto p
                                   ON (c.id_categoria=p.id_categoria)
                                   WHERE c.id_categoria=?");
    $consulta->execute(array($id));
    return($consulta->fetch()[0]);
    }
}
?>
