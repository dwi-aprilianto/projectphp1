<!DOCTYPE html>
<head>
    <title>Perpustakaan</title>
</head>
<body>
    <h1>Koleksi Buku Indonesia Pustaka</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Pengarang</th>
                <th>Tahun</th>
                <th>Tersedia</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $books = [
                ["judul" => "Arsene Lupin", "pengarang" => "Maurice LeBlanc", "tahun" => 1860, "tersedia" => false],
                ["judul" => "Sherlock Holmes", "pengarang" => "Sir Arthur Conan Doyle", "tahun" => 1920, "tersedia" => true],
                ["judul" => "Game of Thrones", "pengarang" => "George R Martin", "tahun" => 1990, "tersedia" => true]
            ];
            foreach ($books as $book) {
                echo "<tr>
                        <td>{$book['judul']}</td>
                        <td>{$book['pengarang']}</td>
                        <td>{$book['tahun']}</td>
                        <td>" . ($book['tersedia'] ? 'Ya' : 'Tidak') . "</td>
                      </tr>";
            }
            ?>
        </tbody>
    </table>

    <h2>Form Peminjaman Buku</h2>
    <form method="post" action="">
        <label for="namaPeminjam">Nama Peminjam:</label>
        <input type="text" id="namaPeminjam" name="namaPeminjam" required><br><br>
        <label for="namaBuku">Nama Buku:</label>
        <input type="text" id="namaBuku" name="namaBuku" required><br><br>
        <button type="submit" name="submit">Pinjam Buku</button>
    </form>

    <p id="hasil">

        <?php
        $members = ["agan", "budi", "citra", "dewi"];

        if (isset($_POST['submit'])) {
            $namaPeminjam = strtolower($_POST['namaPeminjam']);
            $namaBuku = strtolower($_POST['namaBuku']);

            if (!in_array($namaPeminjam, $members)) {
                echo "Nama tidak terdaftar sebagai member.";
            } else {

                $foundBook = null;
                foreach ($books as $book) {
                    if (strtolower($book['judul']) == $namaBuku) {
                        $foundBook = $book;
                        break;
                    }
                }

                if ($foundBook) {
                    if ($foundBook['tersedia']) {
                        echo "Selamat! Buku telah berhasil dipinjam<br>";
                        echo "Berikut data buku yang dipinjam: <br><br>";
                        echo "Judul: " . $foundBook['judul'] . "<br>";
                        echo "Pengarang: " . $foundBook['pengarang'] . "<br>";
                        echo "Tahun: " . $foundBook['tahun'];
                    } else {
                        echo "Buku tidak tersedia.";
                    }
                } else {
                    echo "Buku tidak ditemukan.";
                }
            }
        }
        ?>
    </p>
</body>
</html>