<?php
    include_once('../datos/DReserva.php');
    
    
    if (isset($_GET['delete_id'])){
        $reserva = new NReserva;
        $reserva->eliminar($_GET['delete_id']); 
        header("Location: ../presentacion/reservas.php");
        die();
        
    }
    if (isset($_POST['update'])){
        $reserva = new NReserva;
        $reserva->modificar($_GET['id_edit'],$_POST['descripcion'],$_POST['habitacion'],$_POST['fechai'],$_POST['fechas']); 
        header("Location: ../presentacion/reservas.php");
        die();
    }
        if (isset($_POST['descripcion'])){
            
         $reserva = new NReserva;
        $reserva->create($_POST['descripcion'],$_POST['usuario'],$_POST['habitacion'],$_POST['fechai'],$_POST['fechas']);
        header("Location: ../presentacion/reservas.php");
        die();
    }

    class NReserva{

        private $reserva;
        
        public function __construct(){
            $this->reserva = new DReserva();
        }
        //Obtener reserva
        public function getAll(){
           return $this->reserva->getAll();
        }
        //crear nueva reserva
        public function create($descripcion,$usuario,$habitacion,$fechai,$fechas){
            $this->reserva->set('descripcion',$descripcion);
            $this->reserva->set('usuario',$usuario);
            $this->reserva->set('habitacion',$habitacion);
            $this->reserva->set('fechai',$fechai);
            $this->reserva->set('fechas',$fechas);
            $this->reserva->create();
         }
        // Obtener lista de reseras
        public function lista(){
            return $this->reserva->lista();
        }
        //modifica una reserva
        public function modificar($id,$descripcion,$habitacion,$fechai,$fechas){
            $this->reserva->set('id',$id);
            $this->reserva->set('descripcion',$descripcion);
            $this->reserva->set('habitacion',$habitacion);
            $this->reserva->set('fechai',$fechai);
            $this->reserva->set('fechas',$fechas);
            $this->reserva->modificar();
         }      
         //eliminar reserva
         public function eliminar($id){
            $this->reserva->set('id',$id);
            $this->reserva->eliminar();
         }
         public function modificar2($id){
            $this->reserva->set('id',$id);
            return $this->reserva->modificar2();
           
         }
        
    }
    

?>

<?php
include_once('../datos/DReserva.php');

interface InterfazDataReserva {
    public function getReservas();
    public function crearReserva($descripcionReserva,$usuarioReserva,$habitacionReserva,$fechaInicioReserva,$fechaFinReserva);
    public function modificarReserva($idReserva,$descripcionReserva,$usuarioReserva,$habitacionReserva,$fechaInicioReserva,$fechaFinReserva);
    public function eliminarReserva($idReserva);
    public function lista();
    public function getmodificarReserva($idReserva);
}

class DatosReserva implements InterfazDataReserva {
    public function crearReserva($descripcionReserva,$usuarioReserva,$habitacionReserva,$fechaInicioReserva,$fechaFinReserva) {
     $this->DatosReserva->crearReserva($descripcion,$usuario,$habitacion,$fechai,$fechas);
    }
}

class NegocioReserva {
    private $datosReserva;
    
    public function __construct(InterfazDataReserva $datosReserva) {
        $this->datosReserva = $datosReserva;
    }
     /**
        * Crear una nueva reserva
        * @return void
        */
    public function crearReserva($descripcionReserva,$usuarioReserva,$habitacionReserva,$fechaInicioReserva,$fechaFinReserva) {
        $this->datosReserva->crearReserva('descripcionReserva',$descripcionReserva);
        $this->datosReserva->crearReserva('usuarioReserva',$usuarioReserva);
        $this->datosReserva->crearReserva('habitacionReserva',$habitacionReserva);
        $this->datosReserva->crearReserva('fechaInicioReserva',$fechaInicioReserva);
        $this->datosReserva->crearReserva('fechaFinReserva ',$fechaFinReserva);
        $this->datos
    }
}
?>
