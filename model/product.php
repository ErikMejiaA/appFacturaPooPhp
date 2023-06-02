<?php
    class Product {

        //definimos los atributos de la clase
        private $nombreProducto;
        private $valorUnitario;
        private $cantidad;
        private $total;

        public function __construct($nombreProducto, $valorUnitario, $cantidad, $total)
        {
            $this -> nombreProducto = $nombreProducto;
            $this -> valorUnitario = $valorUnitario;
            $this -> cantidad = $cantidad;
            $this -> total = $total;
        }

        //definimos los metodos 
        public function getNombreProducto() {
            return $this -> nombreProducto;
        }

        public function setNombreProducto($nombreProducto) {
            $this -> nombreProducto = $nombreProducto;
        }

        public function getValorUnitario() {
            return $this -> valorUnitario;
        }

        public function setValorUnitario($valorUnitario) {
            $this -> valorUnitario = $valorUnitario;
        }

        public function getCantidad() {
            return $this -> cantidad;
        }

        public function setCantidad($cantidad) {
            $this -> cantidad = $cantidad;
        }

        public function getTotal() {
            return $this -> total;
        }

        public function setTotal($total) {
            $this -> total = $total;
        }
    }
?>