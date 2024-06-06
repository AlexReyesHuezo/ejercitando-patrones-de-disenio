<?php
  abstract class Heroe {
    protected $nombre;

    abstract public function setNombre($nombre);

    abstract public function combatir();
  }

  class Guerrero extends Heroe {
    protected $nombre;

    public function setNombre($nombre) {
      $this->nombre = $nombre;
    }

    public function combatir() {
      echo "El guerrero $this->nombre combate con sus puños\n";
    }
   }

  class Arquero extends Heroe {
    protected $nombre;

    public function setNombre($nombre) {
      $this->nombre = $nombre;
    }

    public function combatir() {
      echo "El arquero $this->nombre combate con su arco\n";
    }
  }

  class Detective extends Heroe {
    protected $nombre;

    public function setNombre($nombre) {
      $this->nombre = $nombre;
    }

    public function combatir() {
      echo "El detective $this->nombre combate con su ingenio\n";
    }
  }

  class Espada extends Heroe {
    protected $heroe;

    public function __construct(Heroe $heroe) {
      $this->heroe = $heroe;
    }

    public function setNombre($nombre) {
      $this->heroe->setNombre($nombre);
    }

    public function combatir() {
      $this->heroe->combatir();
      echo "Ahora combate con una espada\n";
    }
  }

  class Arco extends Heroe {
    protected $heroe;

    public function __construct(Heroe $heroe) {
      $this->heroe = $heroe;
    }

    public function setNombre($nombre) {
      $this->heroe->setNombre($nombre);
    }

    public function combatir() {
      $this->heroe->combatir();
      echo "Ahora combate con un arco\n";
    }
  
  }

  class Ingenio extends Heroe {
    protected $heroe;

    public function __construct(Heroe $heroe) {
      $this->heroe = $heroe;
    }

    public function setNombre($nombre) {
      $this->heroe->setNombre($nombre);
    }

    public function combatir() {
      $this->heroe->combatir();
      echo "Ahora combate con su ingenio\n";
    }
  }

  // Código cliente
  $guerrero = new Guerrero();
  $guerrero->setNombre("Declan Harp");

  $guerreroConEspada = new Espada($guerrero);
  $guerreroConEspada->combatir();

  $guerreroConArco = new Arco($guerrero);
  $guerreroConArco->combatir();

  $guerreroConIngenio = new Ingenio($guerrero);
  $guerreroConIngenio->combatir();

  $arquero = new Arquero();
  $arquero->setNombre("Oliver Queen");

  $arqueroConArco = new Arco($arquero);
  $arqueroConArco->combatir();

  $detective = new Detective();
  $detective->setNombre("Sherlock Holmes");
  $detectiveConIngenio = new Ingenio($detective);
  $detectiveConIngenio->combatir();
  $detectiveConEspada = new Espada($detective);
  $detectiveConEspada->combatir();
?>