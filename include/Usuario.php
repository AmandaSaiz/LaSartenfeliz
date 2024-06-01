<?php

namespace Clases;

use PDO;
use PDOException;

class Usuario extends Conexion
{
    public function __construct()
    {
        parent::__construct();
    }

    public function isValido($u, $p)
    {
        $pass1 = hash('sha256', $p);
        $consulta = "SELECT * FROM usuarios WHERE nombre=:u AND contrasena=:p";
        $stmt = $this->conexion->prepare($consulta);
        try {
            $stmt->execute([
                ':u' => $u,
                ':p' => $pass1
            ]);
        } catch (PDOException $ex) {
            die("Error al consultar usuario: " . $ex->getMessage());
        }
        return $stmt->rowCount() > 0;
    }

    public function iniciarSesion($nombre, $contrasena)
    {
        $consulta = "SELECT * FROM usuarios WHERE nombre = :nombre";
        $stmt = $this->conexion->prepare($consulta);
        $stmt->execute([':nombre' => $nombre]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$usuario) {
            return false;
        }

        if (!password_verify($contrasena, $usuario['contrasena'])) {
            return false;
        }

        session_start();
        $_SESSION['usuario_id'] = $usuario['id']; 
        return true; 
    }

    public function registrarUsuario($nombre, $email, $contrasena)
    {
        // Primero validamos si el usuario ya se encuentra en la BD
        $consulta = "SELECT COUNT(*) as total FROM usuarios WHERE nombre = :nombre OR email = :email";
        $stmt = $this->conexion->prepare($consulta);
        $stmt->execute([':nombre' => $nombre, ':email' => $email]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($resultado['total'] > 0) {
            return false;
        }

        $contrasenaHash = password_hash($contrasena, PASSWORD_DEFAULT);
        $consulta = "INSERT INTO usuarios (nombre, email, contrasena) VALUES (:nombre, :email, :contrasena)";
        $stmt = $this->conexion->prepare($consulta);

        try {
            $stmt->execute([':nombre' => $nombre, ':email' => $email, ':contrasena' => $contrasenaHash]);
            return true;
        } catch (PDOException $ex) {
            die("Error al registrar usuario: " . $ex->getMessage());
        }
    }
}
