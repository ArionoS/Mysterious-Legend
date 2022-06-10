<?php
require_once('includes/init.php');
$judul_page = 'Assesment Employee - TOPSIS & SAW';
require_once('template-parts/header.php');
?>



<?php $user_role ?>

<div class="main-content-row">
    <div class="container clearfix">

        <div class="main-content the-content" style="float:none;width: 100%;padding: 0%;">
            <h1>Online User</h1>

            <?php
            $query = $pdo->prepare('SELECT id_user, username, nama, role,email,password FROM user');
            $query->execute();
            // menampilkan berupa nama field
            $query->setFetchMode(PDO::FETCH_ASSOC);

            if ($query->rowCount() > 0) :
            ?>

                <table class="pure-table pure-table-striped">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Nama</th>
                            <th>Role</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Edit</th>
                            <th>Hapus</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($hasil = $query->fetch()) : ?>
                            <tr>
                                <td><?php echo $hasil['username']; ?></td>
                                <td><?php echo $hasil['nama']; ?></td>
                                <td>
                                    <?php
                                    if ($hasil['role'] == 1) {
                                        echo 'Administrator';
                                    } elseif ($hasil['role'] == 2) {
                                        echo 'Petugas';
                                    }
                                    ?>
                                </td>
                                <td><?php echo $hasil['email']; ?></td>
                                <td><?php echo $hasil['password']; ?></td>
                                <td><a href="edit-user.php?id=<?php echo $hasil['id_user']; ?>"><span class="fa fa-pencil"></span> Edit</a></td>
                                <td><a href="hapus-user.php?id=<?php echo $hasil['id_user']; ?>" class="red yaqin-hapus"><span class="fa fa-times"></span> Hapus</a></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>

            <?php else : ?>
                <p>Maaf, belum ada data untuk user.</p>
            <?php endif; ?>
        </div>
    </div>
</div>






<?php
require_once('template-parts/footer.php');
?>