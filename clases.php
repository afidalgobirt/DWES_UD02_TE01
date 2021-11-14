<?php
    class Producto {
        private $id;
        private $nombre;
        private $unidad;
        private $descripcion;
        protected $pvpUnidad;

        /* Inicializa todos los datos del objeto.*/
        public function __construct($id, $nombre, $unidad, $descripcion, $pvpUnidad) {
            $this->id = $id;
            $this->nombre = $nombre;
            $this->unidad = $unidad;
            $this->descripcion = $descripcion;
            $this->pvpUnidad = $pvpUnidad;
        }

        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function getNombre() {
            return $this->nombre;
        }

        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }

        public function getUnidad() {
            return $this->unidad;
        }

        public function setUnidad($unidad) {
            $this->unidad = $unidad;
        }

        public function getDescripcion() {
            return $this->descripcion;
        }

        public function setDescripcion($descripcion) {
            $this->descripcion = $descripcion;
        }

        public function getPVPUnidad() {
            return $this->pvpUnidad;
        }

        public function setPVPUnidad($pvpUnidad) {
            $this->pvpUnidad = $pvpUnidad;
        }
    }

    class SW extends Producto {
        private $descuento;
        private $version;

        /* Inicializa todos los datos del objeto.*/
        public function __construct($id, $nombre, $unidad, $descripcion, $pvpUnidad, $version, $descuento = 5) {
            parent::__construct($id, $nombre, $unidad, $descripcion, $pvpUnidad);
            $this->descuento = $descuento;
            $this->version = $version;
        }

        /* Devuelve el PVP por unidad después de aplicar el descuento.*/
        public function aplicarDescuento() {
            return $this->pvpUnidad - $this->pvpUnidad * ($this->descuento / 100);
        }

        public function getDescuento() {
            return $this->descuento;
        }

        public function setDescuento($descuento) {
            $this->descuento = $descuento;
        }

        public function getVersion() {
            return $this->version;
        }

        public function setVersion($version) {
            $this->version = $version;
        }
    }

    class HW extends Producto {
        private $descuento;
        private $proveedor;

        /* Inicializa todos los datos del objeto.*/
        public function __construct($id, $nombre, $unidad, $descripcion, $pvpUnidad, $proveedor, $descuento = 5) {
            parent::__construct($id, $nombre, $unidad, $descripcion, $pvpUnidad);
            $this->descuento = $descuento;
            $this->proveedor = $proveedor;
        }

        /* Devuelve el PVP por unidad después de aplicar el descuento.*/
        public function aplicarDescuento() {
            return $this->pvpUnidad - $this->pvpUnidad * ($this->descuento / 100);
        }

        public function getDescuento() {
            return $this->descuento;
        }

        public function setDescuento($descuento) {
            $this->descuento = $descuento;
        }

        public function getProveedor() {
            return $this->proveedor;
        }

        public function setProveedor($proveedor) {
            $this->proveedor = $proveedor;
        }
    }
?>