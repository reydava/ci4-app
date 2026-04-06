<h2>Data Buku</h2>

<a href="/books/create">Tambah Buku</a>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Judul</th>
        <th>Author</th>
        <th>Aksi</th>
    </tr>

    <?php foreach ($books as $b): ?>
    <tr>
        <td><?= $b['id'] ?></td>
        <td><?= $b['title'] ?></td>
        <td><?= $b['author'] ?></td>
        <td>
            <a href="/books/edit/<?= $b['id'] ?>">Edit</a>
            <a href="/books/delete/<?= $b['id'] ?>">Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>