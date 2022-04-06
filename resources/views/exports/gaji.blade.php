<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Gaji</title>
    <style>
        * {
            box-sizing: border-box;
            padding: 0;
            margin: 0;
            font-family: sans-serif;
        }

        .container {
            width: 90vw;
            margin: 0 auto;
            padding-top: 10px;
        }

        .header {
            text-align: center;
        }

        .styled-table {
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 0.9em;
            font-family: sans-serif;
            width: 100%;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
            border-radius: 5px;
            overflow: hidden;
        }

        .styled-table thead tr {
            background-color: #009879;
            color: #ffffff;
            text-align: left;
        }

        .styled-table th,
        .styled-table td {
            padding: 12px 15px;
        }

        .styled-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        .styled-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        .styled-table tbody tr:last-of-type {
            border-bottom: 2px solid #009879;
        }

        .styled-table tbody tr.active-row {
            font-weight: bold;
            color: #009879;
        }

        .description {
            line-height: 25px;
            width: 30%;
        }

        .ttd {
            display: flex;
            width: 100%;
            justify-content: space-between;
            align-items: start;
        }

        .ttd .left,
        .ttd .right{
            display: flex;
            flex-direction: column;
        }

    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>PT. Examples</h1>
            <h3>Gaji Pegawai</h3>
        </div>
        <table class="description">
            <tbody>
                <tr>
                    <td>Nama Pegawai</td>
                    <td>:</td>
                    <td>Example</td>
                </tr>
                <tr>
                    <td>NIK</td>
                    <td>:</td>
                    <td>56768757676767</td>
                </tr>
                <tr>
                    <td>Jabatan</td>
                    <td>:</td>
                    <td>Manager</td>
                </tr>
                <tr>
                    <td>Bulan</td>
                    <td>:</td>
                    <td>Januari</td>
                </tr>
                <tr>
                    <td>Tahun</td>
                    <td>:</td>
                    <td>2022</td>
                </tr>
            </tbody>
        </table>

        <table class="styled-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Keterangan</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>djsffhksdjfh</td>
                    <td>djsffhksdjfh</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>djsffhksdjfh</td>
                    <td>djsffhksdjfh</td>
                </tr>
                <tr>
                    <td colspan="2" align="right" style="font-weight: 900;">Jumlah</td>
                    <td style="font-weight: 900;">djsffhksdjfh</td>
                </tr>
            </tbody>
        </table>

        <div class="ttd">
            <div class="left">
                <span>Pegawai</span>
                <span style="margin-top: 50px;">Wahli</span>
            </div>
            <div class="right">
                <span>Karawang, 23 Maret 2022</span>
                <span>Finance</span>
            </div>
        </div>
    </div>
</body>

</html>
