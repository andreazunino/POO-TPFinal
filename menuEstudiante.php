<?php
    class menuEstudiante extends menu{
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
                    $this->gestionEstudiante->agregarEstudiante($estudiante);
                    break;
    
                case '2':
                    echo "Seleccionaste Dar de Baja Usuario\n";
                        echo "Ingrese el DNI del estudiante a eliminar: ";
                        $dni = readline();
                        $estudianteEliminado = $this->gestionEstudiante->eliminarEstudiantePorDNI($dni);
                        if ($estudianteEliminado) {
                            echo "Estudiante con DNI $dni ha sido eliminado correctamente.\n";
                        } else {
                            echo "No se encontró ningún estudiante con el DNI $dni.\n";
                        }
                    break;
                case '3':
                    echo "Seleccionaste Modificar Datos de Usuario\n";
                    $dniModificar = readline("Ingrese el DNI del estudiante a modificar: ");
                    $estudianteEncontrado = $this->gestionEstudiante->buscarEstudiantePorDNI($dniModificar);
                    if ($estudianteEncontrado) {
                        $nombreNuevo = readline("Ingrese el nuevo nombre del estudiante: ");
                        $apellidoNuevo = readline("Ingrese el nuevo apellido del estudiante: ");
                        $emailNuevo = readline("Ingrese el nuevo email del estudiante: ");
                        $this->gestionEstudiante->modificarEstudiantePorDNI($dniModificar, $nombreNuevo, $apellidoNuevo, $emailNuevo);
                        echo "Los datos del estudiante con DNI $dniModificar han sido modificados correctamente.\n";
                    } else {
                        echo "No se encontró ningún estudiante con el DNI $dniModificar.\n";
                    }
                    break;
                case '4':
                    $dniVer = readline("Ingrese el DNI del estudiante: ");
                    $this->gestionEstudiante->verDatosEInscripcionesPorDNI($dniVer);
                    break;
                case '0':
                    echo "Seleccionaste Volver al Menu Principal\n";
                    $this->mainMenu();
            }
        }
    }
?>