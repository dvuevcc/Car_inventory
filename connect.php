<?php
class Car
{
    public $name;
    public $model;
    public $year;

    public function __construct($name, $model, $year)
    {
        $this->name = $name;
        $this->model = $model;
        $this->year = $year;
    }
}

class ElectricCar extends Car
{
    public $battery_capa;

    public function __construct($name, $model, $year, $battery_capa)
    {
        parent::__construct($name, $model, $year);
        $this->battery_capa = $battery_capa;
    }
}

class GasCar extends Car
{
    public $fuel_eff;

    public function __construct($name, $model, $year, $fuel_eff)
    {
        parent::__construct($name, $model, $year);
        $this->fuel_eff = $fuel_eff;
    }
}

//form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieving data
    $type = $_POST["car-type"];
    $name = $_POST["car-name"];
    $model = $_POST["car-model"];
    $year = isset($_POST["car-year"]) ? $_POST["car-year"] : null;
    $battery_capa = isset($_POST["car-battery"]) ? $_POST["car-battery"] : null;
    $fuel_eff = isset($_POST["car-fuel-efficiency"]) ? $_POST["car-fuel-efficiency"] : null;

    //condition to check whether the car is electric or gas
    if ($type === "Electric") {
        $car = new ElectricCar($name, $model, $year, $battery_capa);
        // Set fuel_eff to null for Electric cars
        $fuel_eff = null;
    } else if ($type === "Gas") {
        $car = new GasCar($name, $model, $year, $fuel_eff);
        // Set battery_capa to null for Gas cars
        $battery_capa = null;
    } else {
        echo "Invalid car type. Please enter 'Electric' or 'Gas'.";
        exit; 
    }

    //database conncetion
    $conn = new mysqli('localhost', 'root', '', 'car_inventory');
    if ($conn->connect_error) {
        die('Connection Failed : ' . $conn->connect_error);
    }

    // Prepare and execute the SQL statement
    $stmt = $conn->prepare("INSERT INTO cars(type, name, model, year, battery_capa, fuel_eff) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssii", $type, $car->name, $car->model, $car->year, $battery_capa, $fuel_eff);
    $execval = $stmt->execute();

    if ($execval) {
        // JSON response indicating success
        echo json_encode(array('success' => true, 'message' => 'Thank you for submitting the car details.'));
    } else {
        // JSON response indicating failure
        echo json_encode(array('success' => false, 'message' => 'Error: ' . $stmt->error));
    }

    //conncetion close
    $stmt->close();
    $conn->close();


}
?>