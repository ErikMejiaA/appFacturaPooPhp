<?php
    class Customer {

        //definimos los atributos de la clase 
        private $numFactura;
        private $nombre;
        private $numCedula;
        private $fecha;

        public function __construct($numFactura, $nombre, $numCedula, $fecha)
        {
            $this -> numFactura = $numFactura;
            $this -> nombre = $nombre;
            $this -> numCedula = $numCedula;
            $this -> fecha = $fecha;
        }

        //definimos los metodos 
        public function getNumFactura() {
            return $this -> numFactura;
        }

        public function setNumFactura($numFactura) {
            $this -> numFactura = $numFactura;
        }

        public function getNombre() {
            return $this -> nombre;
        }

        public function setNombre($nombre) {
            $this -> nombre = $nombre;
        }

        public function getNumCedula() {
            return $this -> numCedula;
        }

        public function setNumCedula($numCedula) {
            $this -> numCedula = $numCedula;
        }

        public function getFecha() {
            return $this -> fecha;
        }

        public function setFecha($fecha) {
            $this -> fecha = $fecha;
        }
    }
?>