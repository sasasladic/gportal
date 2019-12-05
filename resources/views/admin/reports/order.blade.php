<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body {
            font-family: sans-serif;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        table, th, td {
            border: 1px solid slategray;
            margin: 5px;
            text-align: center;
            font-size: 12px;
        }

        th {
            height: 20px;
        }

        td {
            padding-top: 6px;
        }

        .item {
            border: none;
        }

        p {
            padding: 0;
            margin: 0.25em;
            font-size: 12px;
        }

        .table1 td, .table1 th, .table1 {
            border: none;
        }

        .table2 td, .table2 {
            border: none;
            width: 260px;
            text-align: left;
        }

        .table2 th {
            border: none;
            text-align: left;
            padding-left: 20px;
        }
    </style>
</head>
<body>
<div style="float: right">
    <h1 style="margin-right: 10px;color: #1d68a7;font-size: 35px;margin-top: 40px;">FAKTURA</h1>
</div>
<div style="margin-top: 2.7em">
    <table class="table2">
        <tr style="color: #1d68a7;">
            <th style="font-size: 20px;">[IME PREDUZECA]</th>
        </tr>
        <tr>
            <th></th>
        </tr>
        <tr>
            <td>[Ulica i broj]</td>
        </tr>
        <tr>
            <td>[Grad, drzava, postanski broj]</td>
        </tr>
        <tr>
            <td>Telefon: [000]000-00000</td>
        </tr>
        <tr>
            <td>e-mail: gameportal@gmail.test</td>
        </tr>
    </table>
</div>
<div style="width: 315px;float: right;">
    <table style="width: 100%;margin-top: 12px;" class="table1">
        <tr style="background-color: #1d68a7; color: white">
            <th>BROJ FAKTURE</th>
            <th>DATUM</th>
        </tr>
        <tr>
            <td>1</td>
            <td>03-12-2019</td>
        </tr>
        <tr>
            <th></th>
            <th></th>
        </tr>
        <tr>
            <th></th>
            <th></th>
        </tr>
        <tr style="background-color: #1d68a7; color: white;">
            <th>ID KLIJENTA</th>
            <th>USLOVI</th>
        </tr>
        <tr>
            <td>{{$user_id}}</td>
            <td>Ostavlja priznanicu</td>
        </tr>
    </table>
</div>
<br>
<div style="margin-top: 5em;">
    <table style="margin-top: 30px;" class="table2">
        <tr style="background-color: #1d68a7; color: white">
            <th>NAPLATI OD</th>
        </tr>
        <tr>
            <td>{{ ucwords($user) }}</td>
        </tr>
        <tr>
            <td>{{$country}}</td>
        </tr>
        <tr>
            <td>Novi Sad 21000</td>
        </tr>
        <tr>
            <td>[e-mail]</td>
        </tr>
    </table>
</div>
<table style="margin-top: 3em">
    <tr style="background-color: #1d68a7;color: white">
        <th>ID</th>
        <th>Server name</th>
        <th>Number of slots</th>
        <th>Price per slot</th>
        <th>Mod</th>
        <th>Iznos</th>
    </tr>
    <tr>
        <td class="item">{{$id}}</td>
        <td class="item">{{$name}}</td>
        <td class="item">{{$slots}}</td>
        <td class="item">{!!$price_per_slot . ' ' . config('constants.currency')!!}</td>
        <td class="item">{{$mod}}</td>
        <td class="item">{{$sum . ' ' . config('constants.currency')}}</td>
    </tr>
    <tr>
        <td colspan="6" class="item" style="height:100px;"></td>
    </tr>
    <tr>
        <td colspan="4" style="text-align: left;height:30px;padding-left: 15px;"><b>TOTAL: </b></td>
        <td colspan="2" style="height:30px;"><b>{{$sum . ' '. config('constants.currency')}}</b></td>
    </tr>
    <tr style="height:30px;">
        <td colspan="4" style="text-align: left;height:30px;padding-left: 15px;"><b>The prices are without VAT and
                without transport expenses</b></td>
        <td colspan="2" style="height:30px;"></td>
    </tr>
    <tr>
        <td colspan="6" style="vertical-align: top;text-align: left;font-size: 10px;height:30px;padding-left: 15px;">
            Comment:
        </td>
    </tr>
</table>
</body>
</html>
