<?php


class Consultaproductos {

    private function Conexion() {
        $miconn = new mysqli("localhost", "root", "avaras08", "ventas");
        if ($miconn->connect_errno) {
            return "Fallo al conectar a MySQL: (" . $miconn->connect_errno .")". $miconn->connect_errno;
        }
        return $miconn;
    }

    public function Lista() {
        $sql = "SELECT * FROM producto";
        /* uso del metodo conexion */
        $resultado = $this->Conexion()->query($sql);

        /* Obtencion de los elementos */
        $i = 0;
        while ($fila = $resultado->fetch_assoc()) {
            $oProducto = new Producto($fila["nombre"], $fila["precio"], $fila["codigo"]);
            $aProdcutos[$i] = $oProducto;
        }
        return $aProdcutos;
    }

}
