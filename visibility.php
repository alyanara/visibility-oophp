<?php
class Product{ 
    public $Barang, 
            $Merk;
             protected $Diskon;
             private $Harga;

    public function getCetak(){ 
        return "$this->Barang, $this->Merk, (Rp. $this->Harga)"; 
    }
    public function __construct($Barang="jenis barang", $Merk="merk barang", $Harga=0, $Display="display", $Kapasitas="kapasitas"){
    	$this->Barang = $Barang;
    	$this->Merk = $Merk;
    	$this->Harga = $Harga;
        $this->Display = $Display;
        $this->Kapasitas = $Kapasitas;
    }
    public function cetakInfo(){
        $str="{$this->Barang}, {$this->getCetak()}";
        return $str;
    }
    public function getHarga(){
        return $this->Harga - ($this->Harga * $this->Diskon / 100);
    }
} 

class Laptop extends Product{
    public $Display;
    public function __construct($Barang, $Merk, $Harga, $Display){
        parent::__construct($Barang, $Merk, $Harga);
        $this->Display=$Display;
    }
    public function cetakInfo(){
        $str="Laptop: ".parent::getCetak()." | Display: {$this->Display}";
        return $str;
    }
     public function setDiskon($Diskon){
        $this->Diskon=$Diskon;
    }
}
class Flashdisk extends Product{
    public $Kapasitas;
    public function __construct($Barang, $Merk, $Harga, $Kapasitas){
        parent::__construct($Barang, $Merk, $Harga);
        $this->Kapasitas=$Kapasitas;
    }
      public function cetakInfo(){
        $str="Flashdisk: ".parent::getCetak()." | Kapasitas: {$this->Kapasitas}";
        return $str;
    }
}

$Product1 = new Laptop("Laptop"," ASUS", 6000000, "14 Inch"); 
$Product2 = new Flashdisk("Flashdisk","Sandisk", 300000, "16 GB");

echo $Product1->cetakInfo(); 
echo "<br>"; 
echo $Product2->cetakInfo(); 
echo "<br>"; 
echo "<hr>"; 
$Product1->setDiskon(20);
echo $Product1->getHarga();
?>