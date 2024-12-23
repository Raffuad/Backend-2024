
<?php

# membuat class Animal
class Animal
{
    # property animals
    public $animals;
    # method constructor - mengisi data awal
    # parameter: data hewan (array)
    public function __construct($data)
    {
        $this->animals = $data;
    }

    # method index - menampilkan data animals
    public function index()
    {
        # gunakan foreach untuk menampilkan data animals (array)
        foreach ($this->animals as $animal){
            echo "$animal<br>";
        }
        return $this->animals;
    }

    # method store - menambahkan hewan baru
    # parameter: hewan baru
    public function store($data)
    {
        # gunakan method array_push untuk menambahkan data baru
        array_push($this->animals, $data);
        return $this;
    }
    

    # method update - mengupdate hewan
    # parameter: index dan hewan baru
    public function update($index, $data)
    {
        $this->animals[$index]=$data;   
        return $this;
    }

    # method delete - menghapus hewan
    # parameter: index
    public function destroy($index)
    {
        # gunakan method unset atau array_splice untuk menghapus data array
        array_splice($this->animals, $index, 1);
        return $this;
    }
}

# membuat object
# kirimkan data hewan (array) ke constructor
$animal = new Animal(["Ayam", "Ikan"]);

echo "Index - Menampilkan seluruh hewan <br>";
$animal->index("Ayam","ikan");
echo "<br>";

echo "Store - Menambahkan hewan baru <br>";
$animal->store('burung');
$animal->index();
echo "<br>";

echo "Update - Mengupdate hewan <br>";
$animal->update(0, 'Kucing Anggora');
$animal->index();
echo "<br>";

echo "Destroy - Menghapus hewan <br>";
$animal->destroy(1);
$animal->index();
echo "<br>";