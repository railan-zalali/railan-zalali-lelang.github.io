<div class="row">
    <div class="col-md-12">
        <div class="table-wapper-scroll-y my-custom-scrollbar" style="position: relative; height: 350px; overflow: auto; display: block;">
            <table class="table table-bordered table-striped mb-0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>nama Barang</th>
                        <th>Foto</th>
                        <th>Tanggal</th>
                        <th>Harga</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $id_user = $_SESSION['id_user'];
                    $query = mysqli_query($db, "SELECT * FROM tb_barang WHERE id_user = '$id_user'");
                    while ($data = mysqli_fetch_assoc($query)) { ?>
                        <tr>
                            <td style="width: auto;" class="center"><?php echo $no++ ?></td>
                            <td style="width: auto;" class="center"><?php echo $data['nama_barang']; ?></td>
                            <td style="width: auto;" class="center"><img class="foto-thumbnail" style="width: 55px; height: 55px" src='assets/img/<?php echo $data['gambar']; ?>' alt="Foto Barang"></td>
                            <td style="width: auto;" class="center"><?php echo date('d-m-Y', strtotime($data['tgl'])); ?></td>
                            <td style="width: auto;" class="center select2"><?php echo "Rp." . number_format ($data['harga_awal']); ?></td>
                            <td style="width: auto;" class="center"><?php echo $data['deskripsi_barang']; ?></td>

                        </td>
                        <td style="width: 115px;" class="center">
                            <a title="Ubah" class="btn btn-outline-info" href="?page=ubah&id_barang=<?php echo $data['id_barang'];?>"><i class="fas fa-edit"></i></a>
                            <a title="Hapus" class="btn btn-outline-danger" href="forms/proses/proses_hapus.php?id_barang=<?php echo $data['id_barang'];?>" onclick="return confirm('Anda yakin ingin menghapus barang <?php echo $data['id_barang'];?>?');"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php
                } ?>
            </tbody>
        </table>
    </div>
</div>
</div>
