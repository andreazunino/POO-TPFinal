<?php
require_once('estudiante.php');
require_once('gestionEstudiante.php');

$gestion = new gestionEstudiante();

class Menu{
    private $gestion;

    public function __construct($gestion) {
        $this->gestion = $gestion;
    }
    function mainMenu() {
        echo "\n";
        echo "=========== Bienvenido ==========\n";
        echo "1. Inscribir Usuarios\n";
        echo "2. Configuracion de Usuarios\n";
        echo "3. Configuracion de Cursos\n";
        echo "0. Salir\n";
        echo "=========== Instiform ==========\n";
        echo "\n";
    
        $opcionMenu = readline("Selecciona una opción: \n"); 
        switch ($opcionMenu) {
            case '1':
                echo "Seleccionaste Inscribir Usuarios\n";

                echo "\n";
                echo "========= Inscripciones ========\n";
            
                echo "=========== Instiform ==========\n";
                echo "\n";

                break;
            case '2':
                echo "Seleccionaste Configuracion de Usuarios\n";
                $this->subMenuUsuarios();
                break;
            case '3':
                echo "Seleccionaste Configuracion de Cursos\n";
                $this->subMenuCursos();
                break;
            case '0':
                echo "\n";
                echo "================================\n";
                echo "¡Que tengas buen dia!\n";
                echo "=========== Instiform ==========\n";
                echo "\n";
                exit;
        }
    }
    

    
    function subMenuUsuarios() {
        echo "\n";
        echo "========== Menu Usuario =========\n";
        echo "1. Dar de Alta Usuario\n";
        echo "2. Dar de Baja Usuario\n";
        echo "3. Modificar Datos de Usuario\n";
        echo "4. Ver Datos e Inscripciones\n";
        echo "0. Volver al Menu Principal\n";
        echo "=========== Instiform ==========\n";
        echo "\n";
    
        $opcionUser = readline("Selecciona una opción: \n");
        switch ($opcionUser){
            case '1':
                echo "Seleccionaste Dar de Alta Usuario\n";
                $nombre = readline("Ingrese nombre del Estudiante");
                $apellido = readline("Ingrese apellido del Estudiante");
                $dni = readline("Ingrese dni del Estudiante");
                $email = readline("Ingrese email del Estudiante");
                $estudiante = new Estudiante($nombre, $apellido, $dni, $email);
                $this->gestion->agregarEstudiante($estudiante);
                break;
            case '2':
                echo "Seleccionaste Dar de Baja Usuario\n";
                $pdni = readline("Ingrese el dni del usuario a eliminar");
                $gestion->eliminarEstudiantePorDNI($pdni);
                break;
            case '3':
                echo "Seleccionaste Modificar Datos de Usuario\n";
                break;
            case '4':
                echo "Seleccionaste Ver Datos e Inscripciones\n";
                break;
            case '0':
                echo "Seleccionaste Volver al Menu Principal\n";
                $this->mainMenu();
        }
    }
    
    function subMenuCursos() {
        echo "\n";
        echo "========== Menu Cursos =========\n";
        echo "1. Dar de Alta Curso\n";
        echo "2. Dar de Baja Curso\n";
        echo "3. Modificar Datos de Curso\n";
        echo "4. Listar Cursos\n";
        echo "0. Volver al Menu Principal\n";
        echo "=========== Instiform ==========\n";
        echo "\n";
    
        $opcionCursos = readline("Selecciona una opción: \n");
        switch ($opcionCursos){
            case '1':
                echo "Seleccionaste Dar de Alta Cursos\n";
                break;
            case '2':
                echo "Seleccionaste Dar de Baja Cursos\n";
                break;
            case '3':
                echo "Seleccionaste Modificar Datos de Curso\n";
                break;
            case '4':
                echo "Seleccionaste Listar Cursos\n";
                break;
            case '0':
                echo "Seleccionaste Volver Al Menu Principal\n";
                $this->mainMenu();
        }
    }
}