<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
    <title>Laporan</title>
</head>

<body>

    <div style="display: flex; justify-content: center; flex-direction: column; align-items: center; margin-bottom: 15px;">
        <h2>Laporan Antrian</h2>
        <div>
            <?= tgl_i(date("Y-m-d")) ?>
        </div>
    </div>
    <hr>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Antrian</th>
                <th>Nama Pasien</th>
                <th>Nama Dokter</th>
                <th>Tanggal</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($antrian as $index => $antrian) : ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= $antrian->antrian ?></td>
                    <td><?= $antrian->nama_pasien ?></td>
                    <td><?= $antrian->nama_dokter ?></td>
                    <td><?= $antrian->tanggal ?></td>
                    <td>
                        <?= $antrian->status_konsul ?? "-" ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>

</body>

</html>