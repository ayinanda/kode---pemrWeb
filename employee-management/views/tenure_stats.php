<?php include 'header.php'; ?>

<h2>Tenure Statistics</h2>

<table border="1" cellpadding="8">
    <tr>
        <th>Masa Kerja</th>
        <th>Total Karyawan</th>
    </tr>

    <?php foreach ($stats as $row): ?>
        <tr>
            <td><?= $row['masa_kerja']; ?></td>
            <td><?= number_format($row['total_karyawan']); ?></td>

        </tr>
    <?php endforeach; ?>
</table>

<?php include 'footer.php'; ?>
