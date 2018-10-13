<html>
<head>My PDF</head>
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even){background-color: #f2f2f2}

    th {
        background-color: #4CAF50;
        color: white;
    }
</style>
<body>

<table>
    <tr><th>THIS IS A TEST VIEW {{$name}}</th></tr>
    <tr><td>
            <img src="{{ url('').'/img/drc_logo.png' }}" />
        </td></tr>
    <tr><td>More text</td></tr>
</table>
</body>
</html>