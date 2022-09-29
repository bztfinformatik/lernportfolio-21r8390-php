---
tags:
    - PHP
    - Framework
---

# Hinzufügen einer Datei

Eine der wichtigsten **Tätigkeiten** ist das Hinzufügen von Dateien am richtigen Ort. Das ist nicht immer ganz einfach, da die [Ordnerstruktur](Aufbau.md#ordnerstruktur) nicht immer ganz klar ist. Zudem sollte die **Vererbung** beachtet werden. Im Folgenden wird erklärt wie Dateien hinzugefügt werden sollten und wie die Vererbung funktioniert.

## Controller

Die Controller werden in der Regel in der Ordnerstruktur `app/Controller` abgelegt. Die Datei sollte den Namen des Controllers haben, also z.B. `app/Controller/CarCompany.php`. Der Controller sollte die Klasse `Controller` erweitern. Die Datei sollte folgenden Inhalt haben:

=== "CarCompany"

    ```php
    <?php
    class CarCompany extends Controller
    {
        public function index()
        {
            echo 'carCompany/index';
        }

        public function test()
        {
            // Model laden
            $car = $this->loadModel('Car');

            // Werte initialisieren
            $car->brand = 'BMW';
            $car->model = 'M3';
            $car->color = 'schwarz';
            $car->description = 'This is a BMW M3';
            $car->year = '2018';
            $car->price = '100000';

            // View erstellen
            $this->loadView('home/car-company', ['car' => $car]);
        }
    }
    ```

=== "Base Controller"

    ```php
    <?php
    class Controller
    {
        protected function loadModel(string $model)
        {
            if (file_exists('../app/models/' . $model . '.php')) {
                require_once '../app/models/' . $model . '.php';
                return new $model();
            } else {
                echo 'Error : Model does not exists!';
            }
        }

        protected function loadView(string $view, $data = [])
        {
            if (file_exists('../app/views/' . $view . '.php')) {
                require_once '../app/views/' . $view . '.php';
            } else {
                echo 'Error : View does not exists!';
            }
        }
    }
    ```

## Model

Die Models sind Entitäten, welche in der Datenbank gespeichert werden oder eine andere Businesslogik besitzen. Die Models werden unter `app/Model` abgelegt. Es wäre sinnvoll, wenn die Entität **Getter/Setter** besitzt, um die [Zugriffe](../OOP.md#zugriffsmodifizierer) zu limitieren.

```php
<?php
class Car
{
    public string $brand;
    public string $model;
    public string $color;
    public string $description;
    public int $year;
    public float $price;
}
```

## View

Die Views sind die Darstellung der Daten zuständig. Sie werden mit PHP geschrieben und nehmen aus einem [assoziativen Array](../Aufgaben/Arrays.md) die Daten entgegen. So könnte jeder Controller die View benutzen. Die Views werden unter `app/View` gespeichert.

=== "Ausgabe"

    | :fontawesome-solid-building: Brand: | BMW              |
    | ----------------------------------- | ---------------- |
    | **Model**                           | M3               |
    | **Color**                           | schwarz          |
    | **Description**                     | This is a BMW M3 |
    | **Year**                            | 2018             |
    | **Price**                           | 100000           |

=== "Source"

    ```html
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="row">Brand:</th>
                <th><?= $data['car']->brand ?></th>
        </thead>
        <tbody class="table-group-divider">
            <tr>
                <th scope="row">Model</th>
                <td><?= $data['car']->model ?></td>
            </tr>
            <tr>
                <th scope="row">Color</th>
                <td><?= $data['car']->color ?></td>
            </tr>
            <tr>
                <th scope="row">Description</th>
                <td><?= $data['car']->description ?></td>
            </tr>
            <tr>
                <th scope="row">Year</th>
                <td><?= $data['car']->year ?></td>
            </tr>
            <tr>
                <th scope="row">Price</th>
                <td><?= $data['car']->price ?></td>
            </tr>
        </tbody>
    </table>
    ```
