<?php 
class Person {
  private $data = array();
  
  public function __construct() {
    echo "Object created<br>";
  }
  
  public function __destruct() {
    echo "Object destroyed<br>";
  }
  
  public function __get($name) {
    return isset($this->data[$name]) ? $this->data[$name] : null;
  }
  
  public function __set($name, $value) {
    $this->data[$name] = $value;
  }
  
  public function __call($name, $arguments) {
    echo "Calling method: $name<br>";
  }
  
  public static function __callStatic($name, $arguments) {
    echo "Calling static method: $name<br>";
  }
  
  public function __toString() {
    return "This is a person object<br>";
  }
}

$person = new Person(); // Output: "Object created"
$person->name = "John Doe";
echo $person->name."<br>"; // Output: "John Doe"
$person->foo(); // Output: "Calling method: foo"
echo $person; // Output: "This is a person object<br>"
Person::bar(); // Output: "Calling static method: bar<br>"
unset($person); // Output: "Object destroyed"

?>