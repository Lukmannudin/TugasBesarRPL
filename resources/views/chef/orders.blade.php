<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <th>Table</th>
            <th>Customer Name</th>
            <th>Status</th>
            <th>Menu Orders</th>
        </tr>
        <?php foreach ($orders as $order):  ?>
        <tr>
            <td><?php echo $order->identifier; ?></td>
            <td><?php echo $order->customer_name; ?></td>
            <td><?php echo $order->statusOrder; ?></td>
            <td></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <pre>
    <?php var_dump($orders) ?>
</body>
</html>