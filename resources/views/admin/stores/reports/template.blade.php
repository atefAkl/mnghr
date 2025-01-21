<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prit Tempalte</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        table {
            width: 21cm;

            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        table table thead th {
            background-color: #777;
            color: #fff;
        }
        th, td {
            padding: 5px;
            text-align: left;
        }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>
                    <div class="bg-secondary">
                        <h3>Headdddddddddddddddddddddddddddddddddddddddder</h3>
                    </div>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    
                    <div class="row">
                        <div class="col col-6">
                            <div class="row">
                                <div class="col col-3">Company</div>
                                <div class="col col-9">kjbn alf;' ;ma;mn' ld' ;</div>
                                <div class="col col-3">Company </div>
                                <div class="col col-9">kjbn alf;'mp ;ma;' ld' ;</div>
                                <div class="col col-3">Company </div>
                                <div class="col col-9">kjbn alf;'mp ;;mn' ld' ;</div>
                            </div>
                        </div>
                        <div class="col col-6">
                            <div class="row">
                                <div class="col col-3">Company </div>
                                <div class="col col-9">kjbn alf;'mp ;ma;' ld' ;</div>
                                <div class="col col-3">Company </div>
                                <div class="col col-9">kjbn alf;'mp ;ma;n' ld' ;</div>
                                <div class="col col-3">Company </div>
                                <div class="col col-9">kjbn alf;'mp ;ma;' ld' ;</div>
                            </div>
                        </div>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Item</th>
                                <th>Date</th>
                                <th>Dir</th>
                                <th>Representative</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($c =0; $c<=100; $c++)
                                <tr>
                                    <td>{{ $c }}</td>
                                    <td>Item No {{ $c }}</td>
                                    <td>Date {{ time() }}</td>
                                    <td>Dir</td>
                                    <td>Representative</td>
                                    <td>Status</td>
                                </tr>
                            @endfor
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4">Totals</td>
                                <td>5400</td>
                                <td>12854</td>
                            </tr>
                        </tfoot>
                    </table>


                    <div class="row">
                        <div class="col col-4">
                            <br><br>
                            <hr>
                            Manager signature
                            <br><br>
                        </div>
                        <div class="col col-4">
                            <br><br>
                            <hr>
                            Representative signature
                            <br><br>
                        </div>
                        <div class="col col-4">
                            <br><br>
                            <hr>
                            Somebody signature
                            <br><br>
                        </div>
                    </div>
                </td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td>
                    <div class="bg-secondary">
                        <h3>Foooooooooooooooooooooooooooooooooooooooooooter</h3>
                    </div>
                </td>
            </tr>
        </tfoot>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>