<?php
    abstract class Hewan {
        public $nama, 
        $darah = 50,
        $jumlahKaki,
        $keahlian;

        public function __construct($nama){
            $this->nama = $nama;
        }

        public function atraksi(){
            $str = $this->nama . " sedang " . $this->keahlian;
            return $str;
        }

        abstract public function getInfoHewan();

        public function getInfo(){
            $str =  "Nama: $this->nama" . "<br>" .
                    "Darah: $this->darah" . "<br>" .
                    "Jumlah Kaki: $this->jumlahKaki" . "<br>" .
                    "Keahlian: $this->keahlian" . "\n";
            return $str;
        }
    }

    trait Fight {
        public $attackPower, $deffencePower;

        public function serang($hewan){
            echo "$this->nama sedang menyerang $hewan->nama" . "<br>";
            $hewan->diserang($this);
        }

        public function diserang($hewan){
            echo "$this->nama sedang diserang $hewan->nama" . "<br>";
            $this->darah = $this->darah - ($hewan->attackPower / $this->deffencePower);

            echo "Darah: $this->nama tersisa $this->darah" . "<br>";
        }
    }

    class Harimau extends Hewan {
        use Fight;

        function __construct($nama){
            parent::__construct($nama);
            $this->jumlahKaki = 4;
            $this->keahlian = "lari cepat";
            $this->attackPower = 7;
            $this->deffencePower = 8;
        }

        public function getInfoHewan(){
            $str =  " Harimau " . "<br>" . 
                    parent::getInfo() . "<br>" .
                    "Attack Power: $this->attackPower" . "<br>" .
                    "Deffence Power: $this->deffencePower" . "<br>";
            return $str;
        }
    }

    class Elang extends Hewan {
        use Fight;

        function __construct($nama){
            parent::__construct($nama);
            $this->jumlahKaki = 2;
            $this->keahlian = "terbang tinggi";
            $this->attackPower = 10;
            $this->deffencePower = 5;
        }

        public function getInfoHewan(){
            $str =  " Elang " . "<br>" . 
                    parent::getInfo() . "<br>" .
                    "Attack Power: $this->attackPower" . "<br>" .
                    "Deffence Power: $this->deffencePower" . "<br>";
            return $str;
        }
    }

    $elang_1 = new Elang("Elang Emas");
    echo $elang_1->atraksi() . "\n";
    echo "<br>";
    
    $harimau_1 = new Harimau("Harimau Sri Langka");
    echo $harimau_1->atraksi() . "\n";
    echo "<br>";
    echo "<br>";

    $harimau_1->serang($elang_1) . "\n";
    echo "<br>";
    echo $elang_1->getInfoHewan();
    echo "<br>";
    echo "<br>";

    $elang_1->serang($harimau_1) . "\n";
    echo "<br>";
    echo $harimau_1->getInfoHewan();
?>
