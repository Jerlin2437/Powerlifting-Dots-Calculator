<?php 
    class Dots{
        private $maleCoeff = array(-307.75076,24.0900756,-0.1918759221,0.0007391293,-0.000001093);
        private $femaleCoeff = array(-57.96288, 13.6175032, -0.1126655495, 0.0005158568, -0.0000010706);
        private $coeff;
        private $dots;
        private $bodyWeight;
        private $total;
        private $isKG;
        private $gender;

        private $denom;
        
        function __construct($bodyWeight, $total, $isKG, $gender) {
            $this ->bodyWeight = $bodyWeight;
            $this ->total = $total;
            $this ->isKG = $isKG;
            $this -> gender = $gender;
            if ($this ->isKG == "kgs") {
                $this -> isKG = TRUE;
            }
            else {
                $this -> isKG = false;
            }
            $this -> computeEverything();
        }
        
        private function poundsToKg() {
            if (($this -> isKG) == FALSE){
                $weightCoeff = 0.45359237;
                $this -> bodyWeight *= $weightCoeff;
                $this -> total *= $weightCoeff;
                $this -> isKG = true;
            }
        }

        private function computeDenom(){
            if ($this ->gender == "female"){
                $this -> coeff = $this -> femaleCoeff;
            } else {
                $this -> coeff = $this -> maleCoeff;
            }
            for ($x = 0; $x < count($this -> coeff); $x++){
                $this -> denom += $this ->coeff[$x] * pow($this -> bodyWeight, $x);
            }
        }
        private function computeDots(){
            $this -> dots = ($this -> total)* 500/($this -> denom);
        }

        function computeEverything(){
            $this->poundsToKg();
            $this->computeDenom();
            $this->computeDots();
        }

        function getDots(){
            return $this->dots;
        }
    }
