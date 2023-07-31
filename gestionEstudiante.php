<?php
class gestionEstudiante {
    private $estudiantes = [];
    public function agregarEstudiante($estudiante) {
        $this->estudiantes[] = $estudiante;
    } 
    public function eliminarEstudiantePorDNI($dni) {
        $indice = -1;
        foreach ($this->estudiantes as $key => $estudiante) {
            if ($estudiante->getDNI() === $dni) {
                $indice = $key;
                break;
            }
        }

        if ($indice !== -1) {
            array_splice($this->estudiantes, $indice, 1);
            return true;
        }

        return false;
    }
    public function modificarEstudiantePorDNI($dni, $nuevoNombre, $nuevoApellido, $nuevoEmail) {
        foreach ($this->estudiantes as $estudiante) {
            if ($estudiante->getDNI() === $dni) {
                $estudiante->setNombre($nuevoNombre);
                $estudiante->setApellido($nuevoApellido);
                $estudiante->setEmail($nuevoEmail);
                return true;
            }
        }

        return false;
    }
    public function buscarEstudiantePorDNI($dni) {
        foreach ($this->estudiantes as $estudiante) {
            if ($estudiante->getDNI() === $dni) {
                return $estudiante;
            }
        }

        return null;
    }

    public function verDatosEInscripcionesPorDNI($dni) {
        $estudianteEncontrado = null;

        foreach ($this->estudiantes as $estudiante) {
            if ($estudiante->getDNI() === $dni) {
                $estudianteEncontrado = $estudiante;
                break;
            }
        }

        if ($estudianteEncontrado !== null) {
            echo "Datos del estudiante:\n";
            echo "Nombre: " . $estudianteEncontrado->getNombre() . "\n";
            echo "Apellido: " . $estudianteEncontrado->getApellido() . "\n";
            echo "DNI: " . $estudianteEncontrado->getDNI() . "\n";
            echo "Email: " . $estudianteEncontrado->getEmail() . "\n";
        } else {
            echo "No se encontró ningún estudiante con el DNI $dni.\n";
        }
    }
}
?>