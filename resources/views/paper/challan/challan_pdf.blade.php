<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .pdf_wrapper {
        text-align: center;
        width: 380px;
        height: 500px;
    }

    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td,
    th {
        border: 1px solid #dddddd;
        text-align: center;
        padding: 8px;
    }

    thead tr:nth-child(2) th {
        background: yellow;
        color: red;
    }

    thead tr:nth-child(1) th:nth-child(1) {
        text-align: left;
        border-right: 0;
    }

    thead tr:nth-child(1) th:nth-child(2) {
        text-align: right;
        border-left: 0;
    }
    </style>
</head>

<body>
    <div class="pdf_wrapper">
        <table class="table">
            <thead class="">
                <tr>
                    <th colspan="2">{{ $record[0]->model_id }}</th>
                    <th colspan="2">{{ $record[0]->date }}</th>
                </tr>
                <tr>
                    <th>Doz</th>
                    <th>ITEM</th>
                    <th>QTY</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach($record as $item)
                <tr>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->item_name }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->amt }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3">Total Amount</th>
                    <th>{{ $record[0]->total_amount }}</th>
                </tr>
            </tfoot>
        </table>
    </div>
</body>

</html>