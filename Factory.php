<?php
  interface Personaje {
    public function atacar();
    public function velocidad();
  }

  // La función rand() genera un número aleatorio entre 1 y 10
  // La funció range() genera un array con los números entre 1 y $estocadas
  class Esqueleto implements Personaje {
    public function atacar() {
      $estocadas = rand(1, 10);
      foreach (range(1, $estocadas) as $i) {
        echo "Estocada $i\n";
      }
    }

    public function velocidad() {
      // velocidad máxima de 3 m/s, si es positivo está atacando, si es negativo está huyendo
      if (rand(-3, 3) >= 0) {
        echo "Huyendo\n";
      } else {
        echo "Atacando\n";
      }
    }
  }

  class Zombi implements Personaje {
    public function atacar() {
      $mordiscos = rand(1, 25);
      foreach (range(1, $mordiscos) as $i) {
        echo "Mordisco $i\n";
      }
    }

    public function velocidad() {
      // velocidad máxima de 8 m/s, si es positivo está atacando, si es negativo está huyendo
      $velocidad = rand(-8, 8);
      if ($velocidad >= 0) {
        echo "Atacando\n";
      } else {
        echo "Retrocediendo\n";
      }

      $velocidad = rand(0, 2);
      while ($velocidad) {
        echo "Gruñendo\n";
        $velocidad--;
      }
    }
  }

  abstract class Fabrica {
    abstract public function crearPersonaje();

    // El método estático crea una fábrica de personajes según el nivel
    // Conviene usarlo para no tener que instanciar la clase
    public static function crearFabrica($nivel) {
      if ($nivel == 'fácil') {
        return new FabricaEsqueletos();
      } else if ($nivel == 'difícil') {
        return new FabricaZombis();
      } else {
        throw new Exception("Nivel desconocido: $nivel");
      }
    }
  }

  class FabricaEsqueletos extends Fabrica {
    public function crearPersonaje() {
      return new Esqueleto();
    }
  }

  class FabricaZombis extends Fabrica {
    public function crearPersonaje() {
      return new Zombi();
    }
  }

  // Código cliente
  $fabrica = Fabrica::crearFabrica('fácil');
  $personaje = $fabrica->crearPersonaje();
  $personaje->atacar();
  $personaje->velocidad();
  echo "\n";

  $fabrica = Fabrica::crearFabrica('difícil');
  $personaje = $fabrica->crearPersonaje();
  $personaje->atacar();
  $personaje->velocidad();
?>