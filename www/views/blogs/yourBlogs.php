<table class="table striped">
<tr>
    <th>Blog name</th>
    <th>Blog description</th>
</tr>
<?php foreach($blogs as $blog):?>

<tr>
    <td><a href="/blogs/view?id=<?= $blog->id?>"><?= $blog->name ?></a></td>
    <td><?= $blog->description ?></td>
</tr>

<?php endforeach; ?>
</table>