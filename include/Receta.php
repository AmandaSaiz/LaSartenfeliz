<?php

namespace Clases;

use PDO;
use PDOException;

class Receta extends Conexion
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insertReceta($titulo, $descripcion, $duracion_preparacion, $categoria, $usuario_id)
    {
        $query = "
            INSERT INTO recetas 
                (titulo, descripcion, duracion_preparacion, categoria, usuario_id)
            VALUES
                (:titulo, :descripcion, :duracion_preparacion, :categoria, :usuario_id);
        ";

        try {
            $stmt = $this->conexion->prepare($query);
            $stmt->execute(array(
                'titulo' => $titulo,
                'descripcion' => $descripcion,
                'duracion_preparacion' => $duracion_preparacion,
                'categoria' => $categoria,
                'usuario_id' => $usuario_id
            ));
            return $this->conexion->lastInsertId();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function insertIngredienteReceta($receta_id, $nombre_ingrediente, $cantidad, $medida)
    {
        /* Preobamos a inserar el nuevo ingrediente, si este ya existe se recoge su id para que no se duplique 
         y se pueda usar el mismo ingrediente en varias recetas */
        $query = "
            INSERT INTO ingredientes (nombre) VALUES (:nombre) 
            ON DUPLICATE KEY UPDATE id=LAST_INSERT_ID(id);
        ";

        try {
            $stmt = $this->conexion->prepare($query);
            $stmt->execute(array('nombre' => $nombre_ingrediente));
            $ingrediente_id = $this->conexion->lastInsertId();

            $query = "
                INSERT INTO receta_ingredientes 
                    (receta_id, ingrediente_id, cantidad, medida)
                VALUES
                    (:receta_id, :ingrediente_id, :cantidad, :medida);
            ";

            $stmt = $this->conexion->prepare($query);
            $stmt->execute(array(
                'receta_id' => $receta_id,
                'ingrediente_id' => $ingrediente_id,
                'cantidad' => $cantidad,
                'medida' => $medida
            ));
            return $stmt->rowCount();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function insertPasoReceta($receta_id, $descripcion, $orden)
    {
        $query = "
            INSERT INTO pasos 
                (descripcion, orden, receta_id)
            VALUES
                (:descripcion, :orden, :receta_id);
        ";

        try {
            $stmt = $this->conexion->prepare($query);
            $stmt->execute(array(
                'descripcion' => $descripcion,
                'orden' => $orden,
                'receta_id' => $receta_id
            ));
            return $stmt->rowCount();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
}
?>
