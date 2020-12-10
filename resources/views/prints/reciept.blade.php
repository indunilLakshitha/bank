<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <br><br><br><br><br><br><br><br><br><br><br><br>
    {{ $data[0]->created_at }} <br>
    {{ $data[0]->customer_id }}
    {{ $data[0]->full_name }}<br>
    {{ $data[0]->account_number }}
    Normal Savings
    CASH <br>
    {{ $data[0]->transaction_value }}
    {{ $amountSpell}} <br>
    {{-- {{ $data[0]->account_type }} --}}
</body>

</html>
