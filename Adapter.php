<?php
  interface Archivo {
    public function abrir();
  }

  class Word implements Archivo {
    public function abrir() {
      echo "Abriendo archivo Word en Windows 10\n";
    }
  }

  class Excel implements Archivo {
    public function abrir() {
      echo "Abriendo archivo Excel en Windows 10\n";
    }
  }

  class PowerPoint implements Archivo {
    public function abrir() {
      echo "Abriendo archivo PowerPoint en Windows 10\n";
    }
  }

  // Adaptadores de archivos para Windows 7
  class WordAdapter implements Archivo {
    protected $word;

    public function __construct(Word $word) {
      $this->word = $word;
    }

    public function abrir() {
      echo "Abriendo archivo Word en Windows 7\n";
    }
  }

  class ExcelAdapter implements Archivo {
    protected $excel;

    public function __construct(Excel $excel) {
      $this->excel = $excel;
    }

    public function abrir() {
      echo "Abriendo archivo Excel en Windows 7\n";
    }
  }

  class PowerPointAdapter implements Archivo {
    protected $powerPoint;

    public function __construct(PowerPoint $powerPoint) {
      $this->powerPoint = $powerPoint;
    }

    public function abrir() {
      echo "Abriendo archivo PowerPoint en Windows 7\n";
    }
  }

  // Código cliente
  $word = new WordAdapter(new Word());
  $word->abrir();

  $excel = new ExcelAdapter(new Excel());
  $excel->abrir();

  $powerPoint = new PowerPointAdapter(new PowerPoint());
  $powerPoint->abrir();
?>