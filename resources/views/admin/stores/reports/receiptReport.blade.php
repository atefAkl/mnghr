<!DOCTYPE html>
<html>
<head>
    <title>Report</title>
</head>
<body>
    <h1>Store Receipts Report</h1>
    <p>Date: {{ date('m/d/Y') }}</p>
    <table border="1">
        <thead>
            <tr>
                <th>Serial Number</th>
                <th>Status</th>
                <th>Direction</th>
                <th>Reference Type</th>
                <th>Admin ID</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($receipts as $receipt)
                <tr>
                    <td>{{ $receipt->serial }}</td>
                    <td>{{ $receipt->status }}</td>
                    <td>{{ $receipt->direction }}</td>
                    <td>{{ $receipt->reference_type }}</td>
                    <td>{{ $receipt->admin_id }}</td>
                    <td>{{ $receipt->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
