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
    {{ $trans->transaction_value }}
    {{ $amountSpell}} <br>
    {{ $trans->transaction_type }}<br>
    cashier:
    {{ Auth::user()->name }}<br>recp:
    {{ $trans->id}}
</body>

</html>
