<!DOCTYPE html>
<html>

<head>
    <title>Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }
        .header {
            /* background-color: #4CAF50; */
            color: white;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #348c02;
        }
        .logo {
            width: 15%;
            height: auto;
        }
        .address {
            text-align: right;
            padding: -50px -50px;
        }

        .section {
            padding: 20px;
        }

        .title {
            font-size: 24px;
            text-align: center;
            text-transform: uppercase;
            margin-bottom: 10px;
        }

        .subtitle {
            font-size: 16px;
            text-align: center;
            color: #666;
            margin-top: 0;
        }

        .table-container {
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            /* color: #333; */
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tbody tr:hover {
            background-color: #f1f1f1;
        }

        .footer {
            /* background-color: #858785; */
            color: white;
            text-align: center;
            padding: 10px 0;
            border-top: 2px solid #2b7b06;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
    </style>
</head>

<body>
    <div class="header">
        <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/assets/img/logo.png'))) }}" alt="Company Logo" class="logo">
        <div class="address">
            <h2 style="color: red;">Sheba Group</h2>
            <p style="color: black;">Sheba Bhaban. House # 55, Road # 4A, Dhanmondi, Dhaka - 1209.</p>
        </div>
    </div>

    <div class="section">
        <div class="title">Daily Report</div>
        <div class="subtitle">Name: {{ $item->name }}, Position:{{ $item->position_name }}</div>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Question</th>
                        <th>Answer</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $item['title'] }}</td>
                            <td>
                                @if (is_array($item['answer']))
                                    {{ implode(', ', $item['answer']) }}
                                @else
                                    {{ $item['answer'] }}
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="footer">
        <p style="color: red;">© 2024 Sheba Group All rights reserved.</p>
    </div>
</body>

</html>
