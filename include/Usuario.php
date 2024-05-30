<?php

namespace Clases;

class Usuario extends Conexion
{
    private $usuario;
    private $pass;

    public function __construct()
    {
        parent::__construct();
    }

    public function isValido($u, $p)
    {
        $pass1 = hash('sha256', $p);
        $consulta = "SELECT * FROM usuarios WHERE usuario=:u AND pass=:p";
        $stmt = Conexion::$conexion->prepare($consulta);
        try {
            $stmt->execute([
                ':u' => $u,
                ':p' => $pass1
            ]);
        } catch (\PDOException $ex) {
            die("Error al consultar usuario: " . $ex->getMessage());
        }
        $filas = $stmt->rowCount();
        if ($filas == 0) return false;
        return true;
    }

    public function iniciarSesion($nombre, $contrasena)
    {
        $consulta = "SELECT * FROM usuarios WHERE usuario = :nombre";
        $stmt = self::$conexion->prepare($consulta);
        $stmt->execute([':nombre' => $nombre]);
        $usuario = $stmt->fetch(\PDO::FETCH_ASSOC);

        if (!$usuario) {
            return false;
        }

        if (!password_verify($contrasena, $usuario['pass'])) {
            return false;
        }

        session_start();
        $_SESSION['usuario_id'] = $usuario['id']; 
        return true; 
    }

    public function registrarUsuario($nombre, $email, $contrasena)
    {
        // Validación de la existencia del usuario
        $consulta = "SELECT COUNT(*) as total FROM usuarios WHERE usuario = :nombre OR email = :email";
        $stmt = self::$conexion->prepare($consulta);
        $stmt->execute([':nombre' => $nombre, ':email' => $email]);
        $resultado = $stmt->fetch(\PDO::FETCH_ASSOC);

        if ($resultado['total'] > 0) {
            return false;
        }

        $contrasenaHash = password_hash($contrasena, PASSWORD_DEFAULT);
        $consulta = "INSERT INTO usuarios (usuario, email, pass) VALUES (:nombre, :email, :contrasena)";
        $stmt = self::$conexion->prepare($consulta);

        try {
            $stmt->execute([':nombre' => $nombre, ':email' => $email, ':contrasena' => $contrasenaHash]);
            return true;
        } catch (\PDOException $ex) {
            die("Error al registrar usuario: " . $ex->getMessage());
        }
    }
}
