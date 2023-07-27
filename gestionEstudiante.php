<?php
class gestionEstudiante {
    private $estudiantes = [];
    public function agregarEstudiante($estudiante) {
        $this->estudiantes[] = $estudiante;
    }    
}
?>