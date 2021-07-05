const flashlogin = $('.se-pre-con').data('flashdata');
const kirimpesan = $('.kirim-pesan').data('flashdata');
const kirimkomentar = $('.kirim-komentar').data('flashdata');
const ubahdata = $('.ubah-data').data('flashdata');
const tambahdata = $('.tambah-data').data('flashdata');
const error = $('.error').data('flashdata');
const errorUploadFoto = $('.error-UploadFoto').data('flashdata');
const belumDaftar = $('.belum-daftar').data('flashdata');
const verifikasi = $('.verifikasi').data('flashdata');

if (verifikasi) {
	Swal.fire({
		title: 'Verifikasi ' + verifikasi + ' Berhasil!',
		text: '',
		icon: 'success',
		confirmButtonText: 'Ok, Terima Kasih.'
	});
}

if (belumDaftar) {
	Swal.fire({
		title: 'Maaf, Anda Belum ' + belumDaftar,
		text: 'Mohon periksa kembali nomor kartu keluarga anda, jika masih gagal segera kunjungi kantor desa sambil membawa kartu keluarga anda untuk dilakukan proses pemuktahiran data.',
		icon: 'error',
		confirmButtonText: 'Ok, Terima Kasih.'
	});
}

if (ubahdata) {
	Swal.fire({
		title: 'Data ' + ubahdata + ' Berhasil Diubah!',
		text: '',
		icon: 'success',
		confirmButtonText: 'Ok, Terima Kasih.'
	});
}

if (errorUploadFoto) {
	Swal.fire({
		title: 'Maaf, Foto Gagal Diupload!',
		text: 'Lihat catatan (Ketentuan file yang boleh upload).',
		icon: 'error',
		confirmButtonText: 'Ok, Terima Kasih.'
	});
}

if (error) {
	Swal.fire({
		title: 'Maaf, Pilihan Gagal Dieksekusi!',
		text: error,
		icon: 'error',
		confirmButtonText: 'Ok, Terima Kasih.'
	});
}

if (tambahdata) {
	Swal.fire({
		title: 'Data ' + tambahdata + ' Berhasil Ditambahkan!',
		text: '',
		icon: 'success',
		confirmButtonText: 'Ok, Terima Kasih.'
	});
}

if (flashlogin) {
	Swal.fire({
		title: '' + flashlogin + ', anda berhasil login!',
		text: 'Mohon periksa kembali data anda pada halaman profil sebelum membuat surat keterangan.',
		icon: 'success',
		confirmButtonText: 'Ok, Terima Kasih.'
	});
}

if (kirimpesan) {
	Swal.fire({
		title: 'Pesan Anda Berhasil ' + kirimpesan + '!',
		text: '',
		icon: 'success',
		confirmButtonText: 'Ok, Terima Kasih.'
	});
}

if (kirimkomentar) {
	Swal.fire({
		title: 'Komentar Anda Berhasil ' + kirimkomentar + '!',
		text: 'Terima kasih atas komentar anda, Mohon bijak dalam berkomentar.',
		icon: 'success',
		confirmButtonText: 'Ok, Terima Kasih.'
	});
}

$('.tombol-hapus').on('click', function (e) {
	e.preventDefault();
	const href = $(this).attr('href');

	const swalWithBootstrapButtons = Swal.mixin({
		customClass: {
			confirmButton: 'btn btn-success',
			cancelButton: 'btn btn-danger'
		},
		buttonsStyling: false
	})

	swalWithBootstrapButtons.fire({
		title: 'Anda ingin mengahapus data ini?',
		text: "Data ini akan dihapus!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonText: 'Ya, hapus !',
		cancelButtonText: 'Tidak, batal !',
		reverseButtons: true
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
			swalWithBootstrapButtons.fire(
				'Data Terhapus!',
				'Data anda berhasil dihapus.',
				'success'
			)
		} else if (
			/* Read more about handling dismissals below */
			result.dismiss === Swal.DismissReason.cancel
		) {
			swalWithBootstrapButtons.fire(
				'Data gagal dihapus!',
				'Data batal dihapus.',
				'error'
			)
		}
	})
});
