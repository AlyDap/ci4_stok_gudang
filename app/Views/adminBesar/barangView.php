<?= $this->extend('navbarView') ?>
<?= $this->section('content') ?>


<div class="" style="text-align: center; display: content;">
	<h2>Daftar Barang
	</h2>
</div>
<div class="mb-2 d-flex justify-content-between">
	<!-- <div class="" style="margin-bottom: -10px;"> -->
	<a class="btn btn-warning px-3" href="<?= base_url('DashboardController'); ?>" style="padding-top: 1rem;">
		<i class="fi fi-rr-left text-xl"></i>
	</a>
	<!-- </div> -->
	<div class="">

		<a href="#" class="btn btn-warning" type="button" class="right-0">
			<!-- <i class="fi fi-rr-plus" style="font-size: 1.3rem;\"></i> -->
			Lihat Stok
		</a>
		<button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" id="btn-add" class="right-0">
			<!-- <i class="fi fi-rr-plus" style="font-size: 1.3rem;\"></i> -->
			Tambah Barang
		</button>
	</div>

</div>


<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
 <i class="fi fi-rr-plus" style="font-size: 2rem;"></i>
</button> -->

<?php if (!empty($barang)) :
	$no = 1;
?>
	<div class="table-responsive">
		<table class="table" id="example">
			<thead>
				<tr>
					<th scope="col">No</th>
					<th scope="col">Nama barang</th>
					<th scope="col">Satuan</th>
					<th scope="col">Merek</th>
					<th scope="col">Status</th>
					<th scope="col">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($barang as $row) : ?>
					<!-- saya akan membuat select sendiri untuk tabel barang karena ada jumlah dan merek yang tabelnya terpisah dengan isi field:
     'kode_barang', 'nama_barang', 'satuan', 'harga_beli', 'harga_jual_satuan', 'harga_jual_bijian', 'jumlah_per_satuan', 'foto_barang', 'id_merek', 'status', 
    'jumlah_barang', 'nama_merek' -->
					<tr>
						<th scope="row">
							<?= $no++; ?>
						</th>
						<td>
							<?= $row['nama_barang']; ?>
						</td>
						<td>
							<?= $row['satuan']; ?>
						</td>
						<td>
							<?= $row['nama_merek']; ?>
						</td>
						<td>
							<?= $row['status']; ?>
						</td>
						<td>
							<!-- Tombol Info -->
							<span type="button" class="badge rounded-pill text-bg-primary" style="padding-top: 5px;" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="infoData(
`<?= $row['kode_barang']; ?>`,
`<?= $row['nama_barang']; ?>`,
`<?= $row['satuan']; ?>`,
`<?= $row['harga_beli']; ?>`,
`<?= $row['harga_jual_satuan']; ?>`,
`<?= $row['harga_jual_bijian']; ?>`,
`<?= $row['jumlah_per_satuan']; ?>`,
`<?= $row['foto_barang']; ?>`,
`<?= $row['id_merek']; ?>`,
`<?= $row['status']; ?>`,
`<?= $row['nama_merek']; ?>`,)" id="btn-info">
								<i class="fi fi-rr-info"></i>
							</span>
							<!-- Tombol Edit -->
							<span type="button" class="badge rounded-pill text-bg-warning" style="padding-top: 5px;" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="editData(
`<?= $row['kode_barang']; ?>`,
`<?= $row['nama_barang']; ?>`,
`<?= $row['satuan']; ?>`,
`<?= $row['harga_beli']; ?>`,
`<?= $row['harga_jual_satuan']; ?>`,
`<?= $row['harga_jual_bijian']; ?>`,
`<?= $row['jumlah_per_satuan']; ?>`,
`<?= $row['foto_barang']; ?>`,
`<?= $row['id_merek']; ?>`,
`<?= $row['status']; ?>`,
`<?= $row['nama_merek']; ?>`,)" id="btn-edit">
								<i class="fi fi-rr-edit"></i>
							</span>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
<?php else : ?>
	<p>Tidak ada data Barang.</p>
<?php endif; ?>

<!-- TAMBAH Barang -->
<div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="exampleModalLabel">Barang Baru</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" name="btn-close"></button>
			</div>
			<form method="post" action="<?= base_url('/BarangController/store'); ?>" enctype="multipart/form-data">
				<div class="modal-body">

					<input type="hidden" class="form-control" id="kode_barang" name="kode_barang" value="">

					<div class="mb-3">
						<label for="id_merek" class="col-form-label">Merek</label>
						<input type="text" class="form-control" id="merek-text" disabled>
						<select class="form-select" required size="3" aria-label="Size 3 select example" id="id_merek" name="id_merek">
							<?php foreach ($merekaktif as $ma) { ?>
								<option value="<?= $ma['id_merek'] ?>"><?= $ma['nama_merek'] ?></option>
							<?php } ?>
						</select>
					</div>

					<div class="mb-3">
						<label for="nama_barang" class="col-form-label">Nama Barang</label>
						<input type="text" required class="form-control" id="nama_barang" name="nama_barang" placeholder="masukan nama Barang ...">
					</div>

					<div class="mb-3">
						<label for="satuan" class="col-form-label">Satuan</label>
						<input type="text" required class="form-control" id="satuan" name="satuan" placeholder="masukan satuan Barang ...">
					</div>

					<div class="mb-3">
						<label for="harga_beli" class="col-form-label">Harga Beli</label>
						<input type="number" required class="form-control" min="1" id="harga_beli" name="harga_beli" placeholder="masukan harga beli Barang ...">
					</div>
					<div class="mb-3">
						<label for="harga_jual_satuan" class="col-form-label">Harga Jual Satuan</label>
						<input type="number" required class="form-control" min="1" id="harga_jual_satuan" name="harga_jual_satuan" placeholder="masukan harga jual satuan Barang ...">
					</div>
					<div class="mb-3">
						<label for="harga_jual_bijian" class="col-form-label">Harga Jual Bijian</label>
						<input type="number" required class="form-control" min="1" id="harga_jual_bijian" name="harga_jual_bijian" placeholder="masukan harga jual bijian Barang ...">
					</div>
					<div class="mb-3">
						<label for="jumlah_per_satuan" class="col-form-label">Jumlah Per Satuan</label>
						<input type="number" required class="form-control" min="1" id="jumlah_per_satuan" name="jumlah_per_satuan" placeholder="masukan jumlah per satuan Barang ...">
					</div>

					<div class="mb-3">
						<label for="foto_barang" class="col-form-label">Foto Barang</label>
						<!-- save nama foto barang lama -->
						<input type="hidden" class="form-control" id="foto_barang1" name="foto_barang2" value="">

						<div class="inputgambarbarang">
							<!-- <br> -->
							<input type="file" name="foto_barang" id="input_foto" class="cursor-pointer" accept=".jpg,.jpeg,.png">
						</div>

						<div class="hasilgambarbarang">
							<!-- <br> -->
							<img src="" alt="Foto Barang" id="hasil_foto" style="min-width: 100px;max-width: 321px;">
						</div>
					</div>

					<div class="mb-3">
						<label for="status" class="col-form-label">Status</label>
						<input type="text" required class="form-control" id="status-text" disabled>
						<select class="form-select" aria-label="Default select example" id="status" name="status">
							<option value="aktif" selected>Aktif</option>
							<option value="nonaktif">Nonaktif</option>
						</select>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal" name="btn-close">Close</button>
					<button type="button" class="btn btn-warning" id="btn-reset">Reset</button>
					<button type="button" class="btn btn-warning" id="btn-reset2">Reset</button>
					<button type="submit" class="btn btn-primary" id="btn-form">Save</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- KURANG
tombol reset saat edit belum bisa
-->

<script>
	// datatables
	new DataTable('#example');

	// Tambah & Edit Barang


	const btnAdd = document.getElementById('btn-add');
	const btnClose = document.getElementsByName('btn-close');
	const btnEdit = document.querySelector('#btn-edit');
	const btnForm = document.querySelector('#btn-form');
	const btnInfo = document.querySelector('#btn-info');
	const btnReset = document.querySelector('#btn-reset');
	const btnReset2 = document.querySelector('#btn-reset2');

	const modalExample = document.querySelector('#exampleModal');
	const modelTitle = document.querySelector('#exampleModalLabel');

	const elMerek = document.querySelector('#id_merek');
	const elKode = document.querySelector('#kode_barang');
	const elNama = document.querySelector('#nama_barang');
	const elSatuan = document.querySelector('#satuan');
	const elHargaBeli = document.querySelector('#harga_beli');
	const elHargaJualSatuan = document.querySelector('#harga_jual_satuan');
	const elHargaJualBijian = document.querySelector('#harga_jual_bijian');
	const elJumlah = document.querySelector('#jumlah_per_satuan');
	const elFoto = document.querySelector('#input_foto');
	const elStatus = document.querySelector('#status');
	const elHasilFoto = document.querySelector('#hasil_foto');

	const elHiddenFoto = document.getElementById('foto_barang1');
	const elStatusText = document.querySelector('#status-text');
	const elMerekText = document.querySelector('#merek-text');

	// untuk reset pada update
	let reMerek, reNama, reSatuan, reHargaBeli, reHargaJualSatuan, reHargaJualBijian, reJumlah, reStatus, reFoto, reHiddenFoto, reHasilFoto = "";

	function hapusReadOnly() {
		elNama.removeAttribute('readonly');
		elSatuan.removeAttribute('readonly');
		elHargaBeli.removeAttribute('readonly');
		elHargaJualSatuan.removeAttribute('readonly');
		elHargaJualBijian.removeAttribute('readonly');
		elJumlah.removeAttribute('readonly');
	}

	function beriReadOnly() {
		elNama.setAttribute('readonly', true);
		elSatuan.setAttribute('readonly', true);
		elHargaBeli.setAttribute('readonly', true);
		elHargaJualSatuan.setAttribute('readonly', true);
		elHargaJualBijian.setAttribute('readonly', true);
		elJumlah.setAttribute('readonly', true);
		elMerekText.setAttribute('readonly', true);
		elStatusText.setAttribute('readonly', true);
	}

	function clearForm() {
		elMerek.value = "";
		elKode.value = "";
		elNama.value = "";
		elSatuan.value = "";
		elHargaBeli.value = "";
		elHargaJualSatuan.value = "";
		elHargaJualBijian.value = "";
		elJumlah.value = "";
		elFoto.value = "";
		elStatus.value = "aktif";
		btnForm.innerHTML = 'Tambah';
		elHasilFoto.src = "";
	}

	btnAdd.addEventListener('click', function() {
		btnForm.style.display = 'block';
		btnReset.style.display = 'block';
		btnReset2.style.display = 'none';

		elStatusText.style.display = 'none';
		elMerekText.style.display = 'none';
		elMerek.style.display = 'block';
		elStatus.style.display = 'block';
		elFoto.style.display = 'block';

		modelTitle.innerHTML = 'Tambah Barang';

		clearForm();
		hapusReadOnly();
	});

	btnReset.addEventListener('click', function() {
		clearForm();
	})

	function editData(kode, nama_barang, satuan, harga_beli, harga_jual_satuan, harga_jual_bijian, jumlah_per_satuan, foto_barang, id_merek, status, nama_merek) {
		btnForm.style.display = 'block';
		btnReset.style.display = 'none';
		btnReset2.style.display = 'block';

		elStatusText.style.display = 'none';
		elMerekText.style.display = 'none';
		elMerek.style.display = 'block';
		elStatus.style.display = 'block';
		elFoto.style.display = 'block';

		modelTitle.innerHTML = 'Edit Barang';
		elMerek.value = id_merek;
		// elMerekText.value = nama_merek;
		elKode.value = kode;
		elNama.value = nama_barang;
		elSatuan.value = satuan;
		elHargaBeli.value = harga_beli;
		elHargaJualSatuan.value = harga_jual_satuan;
		elHargaJualBijian.value = harga_jual_bijian;
		elJumlah.value = jumlah_per_satuan;
		elStatus.value = status;
		btnForm.innerHTML = 'Update';
		elHiddenFoto.value = foto_barang;
		console.log(elHiddenFoto.value);

		hapusReadOnly();

		elHasilFoto.src = ambilGambar(foto_barang);

		reMerek = id_merek;
		reNama = nama_barang;
		reSatuan = satuan;
		reHargaBeli = harga_beli;
		reHargaJualSatuan = harga_jual_satuan;
		reHargaJualBijian = harga_jual_bijian;
		reJumlah = jumlah_per_satuan;
		reStatus = status;
		reHiddenFoto = foto_barang;
		reHasilFoto = ambilGambar(foto_barang);
	}

	function ambilGambar(foto_saja) {
		// Menyimpan URL gambar sebelumnya
		let previousImageUrl = ''; // Inisialisasi variabel untuk menyimpan URL gambar sebelumnya

		// Menetapkan URL gambar sebelumnya ke elemen img
		previousImageUrl = foto_saja;

		// Menggabungkan base_url dan previousImageUrl dalam pathGambarBarang
		let pathGambarBarang = '<?= base_url('gambar_barang/') ?>' + previousImageUrl;

		console.log(pathGambarBarang); // Untuk memeriksa pathGambarBarang dalam konsol
		return pathGambarBarang;
	}

	function infoData(kode, nama_barang, satuan, harga_beli, harga_jual_satuan, harga_jual_bijian, jumlah_per_satuan, foto_barang, id_merek, status, nama_merek) {
		btnForm.style.display = 'none';
		btnReset.style.display = 'none';
		btnReset2.style.display = 'none';

		elStatusText.style.display = 'block';
		elMerekText.style.display = 'block';
		elMerek.style.display = 'none';
		elStatus.style.display = 'none';
		elFoto.style.display = 'none';

		modelTitle.innerHTML = 'Info Barang';
		// elMerek.value = id_merek;
		elMerekText.value = nama_merek;
		elKode.value = kode;
		elNama.value = nama_barang;
		elSatuan.value = satuan;
		elHargaBeli.value = harga_beli;
		elHargaJualSatuan.value = harga_jual_satuan;
		elHargaJualBijian.value = harga_jual_bijian;
		elJumlah.value = jumlah_per_satuan;
		elStatusText.value = status;

		beriReadOnly();

		elHasilFoto.src = ambilGambar(foto_barang);
	}

	function resetData() {
		elMerek.value = reMerek;
		// elMerekText.value = nama_merek;
		// elKode.value = kode;
		elNama.value = reNama;
		elSatuan.value = reSatuan;
		elHargaBeli.value = reHargaBeli;
		elHargaJualSatuan.value = reHargaJualSatuan;
		elHargaJualBijian.value = reHargaJualBijian;
		elJumlah.value = reJumlah;
		elStatus.value = reStatus;
		elHiddenFoto.value = reHiddenFoto;
		elHasilFoto.src = reHasilFoto;
		// hapus inputan pada type file foto
		elFoto.value = "";
	}

	btnReset2.addEventListener('click', function() {
		// inputan kembali seperti data awal  
		resetData();
	})

	// Mendengarkan perubahan pada input file
	elFoto.addEventListener('change', function() {
		const file = elFoto.files[0]; // Mengambil file yang dipilih

		// Memeriksa apakah file telah dipilih
		if (file) {
			const reader = new FileReader();

			// Saat file selesai dibaca
			reader.onload = function(event) {
				elHasilFoto.src = event.target.result; // Menampilkan gambar yang dipilih pada elemen img
			};

			// Membaca file sebagai URL data
			reader.readAsDataURL(file);
		} else {
			elHasilFoto.src = previousImageUrl; // Jika tidak ada file yang dipilih, kosongkan elemen img
		}
	});
</script>


<?= $this->endSection('content') ?>