<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page Products PDF</title>
    <style>
        /* CSS styling for PDF */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h2 {
            text-align: center;
            color: #333;
            font-size: 24px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 14px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
            color: #333;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .btn {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-top: 20px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <h2>Sold item detail Details</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Buyer name</th>
                <th>Phone Number</th>
                <th>Product Name</th>
                <th>Product Code</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($soldItems as $item)
                <tr>
                    <th>{{ $item->id }}</th>
                    <th>{{ $item->buyer_name }}</th>
                    <th>{{ $item->phone_number }}</th>
                    <th>{{ $item->product_name }}</th>
                    <th>{{ $item->product_code }}</th>
                    <th>{{ $item->quantity }}</th>
                    <th>{{ $item->price }}</th>
                    <th>{{ $item->date }}</th>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
