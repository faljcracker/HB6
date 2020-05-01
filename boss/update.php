<?php

require "config.php";

/* get information form database based on query */
try {
  $connection = new PDO($dsn, $username, $password, $options);

  $sql = "SELECT * FROM parcels";

  $statement = $connection->prepare($sql);
  $statement->execute();

  $result = $statement->fetchAll();
} catch(PDOException $error) {
  echo $sql . "<br>" . $error->getMessage();
}
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin - Update</title>

    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>

<body>

    <div class="container-fluid p-5">
        <h2 class="my-5 text-primary"><strong>Update items</strong></h2>

        <table class="table table-responsive">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>collection_date_time</th>
                    <th>delivery_schedule</th>
                    <th>last_location</th>
                    <th>origin</th>
                    <th>destination</th>
                    <th>service_mode</th>
                    <th>service_type</th>
                    <th>shipping_description</th>
                    <th>sender_name</th>
                    <th>sender_phone</th>
                    <th>sender_address</th>
                    <th>recipient_name</th>
                    <th>recipient_phone</th>
                    <th>recipient_address</th>
                    <th>shipping_history</th>
                    <th>tracking_number</th>
                    <th>shipping_state</th>
                    <th>shipping_date_time</th>
                    <th>remarks</th>
                    <th>weight_kg</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $row) : ?>
                <!-- loop through information and display them in table -->
                <tr>
                    <td><?php echo $row["id"]; ?></td>
                    <td><?php echo $row["collection_date_time"]; ?></td>
                    <td><?php echo $row["delivery_schedule"]; ?></td>
                    <td><?php echo $row["last_location"]; ?></td>
                    <td><?php echo $row["origin"]; ?></td>
                    <td><?php echo $row["destination"]; ?></td>
                    <td><?php echo $row["service_mode"]; ?></td>
                    <td><?php echo $row["service_type"]; ?></td>
                    <td><?php echo $row["shipping_description"]; ?></td>
                    <td><?php echo $row["sender_name"]; ?></td>
                    <td><?php echo $row["sender_phone"]; ?></td>
                    <td><?php echo $row["sender_address"]; ?></td>
                    <td><?php echo $row["recipient_name"]; ?></td>
                    <td><?php echo $row["recipient_phone"]; ?></td>
                    <td><?php echo $row["recipient_address"]; ?></td>
                    <td><?php echo $row["shipping_history"]; ?></td>
                    <td><?php echo $row["tracking_number"]; ?></td>
                    <td><?php echo $row["shipping_state"]; ?></td>
                    <td><?php echo $row["shipping_date_time"]; ?></td>
                    <td><?php echo $row["remarks"]; ?></td>
                    <td><?php echo $row["weight_kg"]; ?></td>
                    <td><a class="btn btn-success px-4 py-1"
                            href="update-single.php?id=<?php echo $row["id"]; ?>">Edit</a></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <a class="btn btn-danger btn-lg w-25 my-3" href="/boss/index.php">menu</a> <!-- back to main menu -->

</body>

</html>