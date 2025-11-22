<?php include 'header.php'; ?>

<h2>Employee Overview</h2>

<table border="1" cellpadding="8">
    <tr>
        <th>Total Karyawan</th>
        <th>Total Gaji per Bulan</th>
        <th>Rata-rata Masa Kerja (Tahun)</th>
    </tr>

    <tr>
        <td><?= $stats['total_karyawan']; ?></td>
        <td><?= number_format($stats['total_gaji_per_bulan'], 2); ?></td>
        <td><?= number_format($stats['rata_rata_masa_kerja'], 2); ?></td>
    </tr>
</table>

<?php include 'footer.php'; ?>
