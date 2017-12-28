<table class="table striped">
<tr>
    <th>Blog name</th>
    <th>Blog description</th>
</tr>
<?php foreach($blogs as $blog):?>

<tr>
    <td><?= $blog->name ?></td>
    <td><?= $blog->description ?></td>
</tr>

<?php endforeach; ?>
</table>