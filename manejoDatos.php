<?php
    require_once ('curso.php');

    class Curso {

        private $cursos = [];

        function agregarCurso($curso) {
            $this->cursos[] = $curso;
        }

        function getCursos() {
            return $this->cursos;
        }

        function getJSON() {

            $jsonCurso = [];
            foreach ($this->cursos as $curso) {
                $jsonCurso[] = json_encode($curso);
            }

            return '{"cursos" : ['.implode(',', $jsonCurso).']}';
        }

        function setJSON($datos) {
            $jsonDatos = json_decode($datos);

            $cursos = $jsonDatos->cursos;
            foreach ($cursos as $curso) {
                $nuevoCurso = new Auto($curso->nombre, $curso->id);
                $this->agregarCurso($nuevoCurso);
            }
        }

        function grabar($nombreArchivo) {
            $datos = $this->getJSON();
            file_put_contents($nombreArchivo, $datos);
        }

        function leer($nombreArchivo) {
            $datos = file_get_contents($nombreArchivo);
            $this->setJSON($datos);

        }

    }
