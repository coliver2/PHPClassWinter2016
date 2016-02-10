<?php if ( isset ($results)): ?>
<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Data One</th>
            <th>Data Two</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($results as $row): ?>
            <tr>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['corp']; ?></td>
                    <td><?php echo date("m/d/Y",strtotime($row['incorp_dt'])); ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['zipcode']; ?></td>
                    <td><?php echo $row['owner']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                   
                </tr>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php endif; ?>