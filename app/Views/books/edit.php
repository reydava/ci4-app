<h2>Edit Buku</h2>

<form action="/books/update/<?= $book['id'] ?>" method="post">
    Judul: <input type="text" name="title" value="<?= $book['title'] ?>"><br>
    Author: <input type="text" name="author" value="<?= $book['author'] ?>"><br>
    Publisher: <input type="text" name="publisher" value="<?= $book['publisher'] ?>"><br>
    Tahun: <input type="text" name="year" value="<?= $book['year'] ?>"><br>

    <button type="submit">Update</button>
</form>