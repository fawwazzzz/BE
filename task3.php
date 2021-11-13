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
    foreach($this->animals as $animal) {
      echo "$animal <br>";
    }
    return $this;
  }

  # method store - menambahkan hewan baru
  # parameter: hewan baru
  public function store($data)
  {
    # gunakan method array_push untuk menambahkan data baru
    array_push($this->animals, $data);
    $this->index();
    return $this;
  }

  # method update - mengupdate hewan
  # parameter: index dan hewan baru
  public function update($animal, $data)
  {
    $ANIMAL = $this->find($animal);
    $this->animals[$ANIMAL] = $data;

    $this->index();
    return $this;
  }

  # method delete - menghapus hewan
  # parameter: index
  public function destroy($animal)
  {
    # gunakan method unset atau array_splice untuk menghapus data array
    $ANIMAL = $this->find($animal);
    array_splice($this->animals, $ANIMAL, 1);
    $this->index();
    return $this;
  }
  private function find($animal) {
    return array_search($animal, $this->animals);
  }
}

# membuat object
# kirimkan data hewan (array) ke constructor
$animal = new Animal(['Kancil', 'Rubah', 'Musang']);

echo "Index - Menampilkan seluruh hewan <br>";
$animal->index();
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