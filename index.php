<?php
require 'config.php';
require 'Model.php';

// Načti všechny modely s výrobcem
$models = VehicleModel::with('manufacturer')->get();

echo "<h2>Modely s výrobci</h2>";
echo "<table border='1'><tr><th>Model</th><th>Výrobce</th></tr>";
foreach ($models as $model) {
    echo "<tr>";
    echo "<td>{$model->model_name}</td>";
    echo "<td>{$model->manufacturer->manufacturer_name}</td>";
    echo "</tr>";
}
echo "</table>";

// Načti auta s majiteli
$cars = Car::with(['model.manufacturer', 'owner'])->get();

echo "<h2>Auta s majiteli</h2>";
echo "<table border='1'><tr><th>Model</th><th>Výrobce</th><th>VIN</th><th>Majitel</th></tr>";
foreach ($cars as $car) {
    $model = $car->model;
    $owner = $car->owner;
    echo "<tr>";
    echo "<td>{$model->model_name}</td>";
    echo "<td>{$model->manufacturer->manufacturer_name}</td>";
    echo "<td>{$car->vin_code}</td>";
    echo "<td>" . ($owner ? "{$owner->first_name} {$owner->last_name}" : "neznámý") . "</td>";
    echo "</tr>";
}
echo "</table>";
