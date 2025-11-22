<?php include 'header.php'; ?>

<h2>Salary Statistics</h2>

<table border="1" cellpadding="8">
    <tr>
        <th>Department</th>
        <th>Average Salary</th>
        <th>Highest Salary</th>
        <th>Lowest Salary</th>
    </tr>

    <?php foreach ($stats as $row): ?>
        <tr>
            <td><?= $row['department']; ?></td>
            <td><?= number_format($row['avg_salary'], 2); ?></td>
            <td><?= number_format($row['max_salary'], 2); ?></td>
            <td><?= number_format($row['min_salary'], 2); ?></td>

        </tr>
    <?php endforeach; ?>
</table>

<?php include 'footer.php'; ?>
