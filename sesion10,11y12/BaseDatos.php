<?php


class BaseDatos
{

    //atributos
    public $usuarioDB = "root";
    public $passwordDB = "";

    //constructor
    public function __construct()
    {
    }
    //metodos
    public function conectarBD()
    {

        try {
            $datosDB = "mysql:host=localhost;dbname=db_web1";
            $conexionBD = new PDO($datosDB, $this->usuarioDB, $this->passwordDB);
            return ($conexionBD);
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }
    //agregar
    public function agregarDatos($consultaSQL)
    {
        //establecer una conexion
        $conexionBD = $this->conectarBD();

        //preparar consulta
        $insertarDatos = $conexionBD->prepare($consultaSQL);

        //ejecutar la consulta
        $resultado = $insertarDatos->execute();

        //verifico el resultado
        if ($resultado) {
            echo "Usuario Agregado";
        } else {
            echo "Error";
        }
    }
//capturar datos
    public function consultarDatos($consultaSQL)
    {
        //establecer una conexion
        $conexionBD = $this->conectarBD();
        //preparar consulta
        $consultarDatos = $conexionBD->prepare($consultaSQL);
        //establacer el método de consulta
        $consultarDatos->setFetchMode(PDO::FETCH_ASSOC);
        //ejecutar la operacion en la base de datos
        $consultarDatos->execute();

        //obtener todos los datos
        return ($consultarDatos->fetchAll());
    }
    //eliminar
    public function eliminarDatos($consultaSQL)
    {
         //establecer una conexion
         $conexionBD = $this->conectarBD();
         //preparar consulta
         $eliminarDatos = $conexionBD->prepare($consultaSQL);
         //ejecutar la consulta
        $resultado = $eliminarDatos->execute();

        //verifico el resultado
        if ($resultado) {
            echo "Usuario Eliminado";
        } else {
            echo "Error";
        }
    }
    public function editarDatos($consultaSQL)
    {
         //establecer una conexion
         $conexionBD = $this->conectarBD();
         //preparar consulta
         $editarDatos = $conexionBD->prepare($consultaSQL);
         //ejecutar la consulta
        $resultado = $editarDatos->execute();

        //verifico el resultado
        if ($resultado) {
            echo "Usuario Editado";
        } else {
            echo "Error";
        }
    }
}