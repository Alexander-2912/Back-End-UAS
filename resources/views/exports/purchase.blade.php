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
    <h2>Purchase Details</h2>
    <table>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Seller Name</th>
                    <th>Phone Number</th>
                    <th>Product Name</th>
                    <th>Product Code</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($purchases as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->sellerName }}</td>
                        <td>{{ $item->phoneNumber }}</td>
                        <td>{{ $item->productName }}</td>
                        <td>{{ $item->productCode }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->date }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </table>
</body>

</html>
