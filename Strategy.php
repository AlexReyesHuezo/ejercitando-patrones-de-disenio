<?php
  interface EstrategiaDeSalida {
    public function salida($mensaje);
  }

  class SalidaPorConsola implements EstrategiaDeSalida {
    public function salida($mensaje) {
      echo $mensaje . "\n";
    }
  }

  class JsonOutput implements EstrategiaDeSalida {
    public function salida($mensaje) {
      echo json_encode(['mensaje' => $mensaje]) . "\n";
    }
  }

  class SalidaPorTextoPlano implements EstrategiaDeSalida {
    public function salida($mensaje) {
      file_put_contents('mensaje.txt', $mensaje . "\n", FILE_APPEND);
    }
  }

  class EmisorDeMensajes {
    private $estrategiaDeSalida;

    public function __construct(EstrategiaDeSalida $estrategiaDeSalida) {
      $this->estrategiaDeSalida = $estrategiaDeSalida;
    }

    public function mostrarMensaje($mensaje) {
      $this->estrategiaDeSalida->salida($mensaje);
    }
  }

  // Código cliente
  $difusorDeMensajes = new EmisorDeMensajes(new SalidaPorConsola());
  $difusorDeMensajes->mostrarMensaje("¡Hola, mundo!");
  echo "\n";
  $difusorDeMensajes = new EmisorDeMensajes(new JsonOutput());
  $difusorDeMensajes->mostrarMensaje("¡Hola, mundo!");
  echo "\n";
  $difusorDeMensajes = new EmisorDeMensajes(new SalidaPorTextoPlano());
  $difusorDeMensajes->mostrarMensaje("¡Hola, mundo!");
  $difusorDeMensajes->mostrarMensaje("¡Hola, Kodigo!");
?>