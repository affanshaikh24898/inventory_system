<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inventory System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>{{$body['message']}}</h1>
                @if(isset($body['products']))
                    <table class="table" style="border-collapse: collapse; border: 1px solid black;">
                        <thead>
                            <tr>
                                <th style="border: 1px solid black;">product Name</th>
                                <th style="border: 1px solid black;">product Qty</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($body['products'] as $product)
                                <tr>
                                    <td style="border: 1px solid black;">{{ $product->name }}</td>
                                    <td style="border: 1px solid black;">{{ $product->qty }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
                @if(isset($body['products_lot']))
                    <table class="table" style="border-collapse: collapse; border: 1px solid black;">
                        <thead>
                            <tr>
                                <th style="border: 1px solid black;">product lot Name</th>
                                <th style="border: 1px solid black;">product lot expireydate</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($body['products_lot'] as $products_lot)
                                <tr>
                                    <td style="border: 1px solid black;">{{ $products_lot->title }}</td>
                                    <td style="border: 1px solid black;">{{ $products_lot->expiration_date }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
</body>
</html>
