<?php
class autos{

    //variables dentro de una clase se conocen como propiedades
    //funciones dentro de una clase se conocen como metodos

public $marca;//public se puede invocar desde cualquier lugar del codigo
public $color;// private solamente su propia clase la puede invocar
public $tamaño;
    function establecermarca($marca) {
        $this->marca=$marca;
    }
    function establecertamaño($tamaño) {
        $this->tamaño=$tamaño;
    }
    function establecercolor($color) {
        $this->color=$color;
    }
    function obtenermarca(){
        return $this->marca;
    }
    function obtenertamaño(){
    return $this->tamaño;
}

    function obtenercolor(){
        return $this->color;
    }
}
  //agregar las propiedades color y tamaño
$carro=new autos();
$carro2=new autos();
$carro3=new autos();

$carro->establecermarca('Ford');
$carro->establecertamaño('Grande');
$carro->establecercolor('Rojo');

$carro2->establecermarca('Volkswagen');
$carro2->establecertamaño('Mediano');
$carro2->establecercolor('Blanco');

$carro3->establecermarca('Audi');
$carro3->establecertamaño('Chico');
$carro3->establecercolor('Azul');

echo 'El carro 1 es ' .$carro->obtenermarca() .' de tamaño '. $carro->obtenertamaño(). ' y de color '. $carro->obtenercolor() .'</br>';
echo 'El carro 2 es ' .$carro2->obtenermarca() .' de tamaño '. $carro2->obtenertamaño().' y de color '. $carro2->obtenercolor() . '</br>' ;
echo 'El carro 3 es '  .$carro3->obtenermarca() .' de tamaño '. $carro3->obtenertamaño(). ' y de color '. $carro3->obtenercolor().'</br>';
