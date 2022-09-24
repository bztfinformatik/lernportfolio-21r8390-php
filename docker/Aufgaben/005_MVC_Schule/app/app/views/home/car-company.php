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