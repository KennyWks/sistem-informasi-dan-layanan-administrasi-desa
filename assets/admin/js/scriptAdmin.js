//TODO : Prloading
$(window).load(function () {
	// Animate loader off screen
	$(".se-pre-con").fadeOut("slow");;
});

//TODO: Kostumisasi modal tambah & ubah menu
$(function () {

	$('.tombolTambahData').on('click', function () {
		$('#judulModal').html('Tambah Data Menu');
		$('.menu').val('');
		$('.modal-footer button[type=submit]').html('Tambah Menu');
	});

	$('.tampilModalUbah').on('click', function () {
		const baseurl2 = $('.baseurl').data('base_url');

		$('#judulModal').html('Ubah Data Menu');
		$('.modal-footer button[type=submit]').html('Ubah Menu');
		$('.modal-body form').attr('action', baseurl2 + 'Menu/ubahMenu');

		const id = $(this).data('id');

		$.ajax({
			url: baseurl2 + 'Menu/getDataUbahMenu',
			data: {
				id: id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('#id').val(data.id);
				$('.menu').val(data.menu);
			},
			error: function (response) {
				const responseJson = jQuery.parseJSON(response.responseText);
				console.log(responseJson.Message); //Logs the exception message
			}
		});
	});
});

//TODO: Kostumisasi modal ubah Submenu
$(function () {

	$('.tampilModalTambahSubMenu').on('click', function () {
		$('#judulModal').html('Tambah Data Submenu');
		$('.nama_menu').val('');
		$('.nama_url').val('');
		$('.nama_icon').val('');
		$('.modal-footer button[type=submit]').html('Tambah Submenu');
	});

	$('.tampilModalUbahSubMenu').on('click', function () {
		const baseurl1 = $('.baseurl').data('base_url');

		$('#judulModal').html('Ubah Data Submenu');
		$('.modal-footer button[type=submit]').html('Ubah Submenu');
		$('.modal-body form').attr('action', baseurl1 + 'Menu/ubahSubMenu');

		const id = $(this).data('id');

		$.ajax({
			url: baseurl1 + 'Menu/getDataUbahSubMenu',
			data: {
				id: id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('#id').val(data.id);
				$('.nama_menu').val(data.judul);
				$('.menu_id').val(data.menu_id);
				$('.nama_url').val(data.url);
				$('.nama_icon').val(data.icon);
			},
			error: function (response) {
				const responseJson = jQuery.parseJSON(response.responseText);
				console.log(responseJson.Message); //Logs the exception message
			}
		});
	});
});

//TODO: Kostumasi tambah & ubah role
$(function () {

	$('.tombolTambahDataRole').on('click', function () {
		$('#judulModal').html('Tambah Data Role');
		$('.nama_role').val('');
		$('.modal-footer button[type=submit]').html('Tambah Role');
	});

	$('.tampilModalUbahRole').on('click', function () {
		const baseurl4 = $('.baseurl').data('base_url');

		$('#judulModal').html('Ubah Data Role');
		$('.modal-footer button[type=submit]').html('Ubah Role');
		$('.modal-body form').attr('action', baseurl4 + 'Super_Admin/ubahRole');

		const id = $(this).data('id');

		$.ajax({
			url: baseurl4 + 'Super_Admin/getDataUbahRole',
			data: {
				id: id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('#id').val(data.id);
				$('.nama_role').val(data.role);
			},
			error: function (response) {
				const responseJson = jQuery.parseJSON(response.responseText);
				console.log(responseJson.Message); //Logs the exception message
			}
		});
	});
});

//TODO: Kostumasi data role
$('.akses-role').on('click', function () {
	const menuId = $(this).data('menu');
	const roleId = $(this).data('role');
	const baseurl3 = $('.baseurl').data('base_url');

	$.ajax({
		url: baseurl3 + 'Super_Admin/ubahAkses',
		type: 'post',
		data: {
			menuId: menuId,
			roleId: roleId
		},
		success: function () {
			document.location.href = baseurl3 + 'Super_Admin/roleAkses/' + roleId;
		}
	});
});

//TODO: upload foto (tampil nama foto di input)
$('.custom-file-input').on('change', function () {
	let fileName = $(this).val().split('\\').pop();
	$(this).next('.custom-file-label').addClass("selected").html(fileName);
});

//TODO: baca komentar by SA
$(function () {
	$('.tampilmodalBacaKomentar').on('click', function () {
		const baseurl8 = $('.baseurl').data('base_url');
		$('#judulModal').html('Isi Komentar');
		$('.tombolTutup').hide('');
		const id = $(this).data('id');

		$.ajax({
			url: baseurl8 + 'Super_Admin/getDataKomentar',
			data: {
				id: id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('#id').val(data.id_komentar);
				$('.deskripsi').html(data.isi_komentar);
				$('.nama_depan').html(data.nama);
				$('.nama_belakang').html(data.hp);
			},
			error: function (response) {
				const responseJson = jQuery.parseJSON(response.responseText);
				console.log(responseJson.Message); //Logs the exception message
			}
		});

		$('.tutup button[type=submit]').on('click', function () {

			$.ajax({
				url: baseurl8 + 'Super_Admin/ubahBacaKomentar',
				data: {
					id: id
				},
				type: 'post',
				success: function () {
					$('.daftarKomentar').load(baseurl8 + 'Super_Admin/daftarKomentar .daftarKomentar');
					$('.judulHalaman').html('Daftar Komentar')
				},
				error: function () {}
			});
		});
	});
});

$('#alertsDropdown').on('click', function () {
	$('.komentar').html('');
});

//TODO: baca berita (SA)
$(function () {
	$('.modalBacaBeritaBySA').on('click', function () {

		$('.modal-footer button[type=submit]').hide('');

		const baseurl9 = $('.baseurl').data('base_url');
		const id = $(this).data('id');

		$.ajax({
			url: baseurl9 + 'Super_Admin/getDataBerita',
			data: {
				id: id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('.modal-title').text(data.judul);
				$('.deskripsi').html(data.deskripsi);
			},
			error: function (response) {
				const responseJson = jQuery.parseJSON(response.responseText);
				console.log(responseJson.Message); //Logs the exception message
			}
		});
	});
});

//TODO: Modal baca pesan by (SA)
$(function () {
	$('.tampilModalBacaPesan').on('click', function () {
		const baseurl5 = $('.baseurl').data('base_url');
		$('.tombolTutup').hide('');
		$('#judulModal').html('Isi Pesan');
		$('.modal-body form').attr('action', baseurl5 + 'Super_Admin/ubahBacaPesan/');

		const id = $(this).data('id');

		$.ajax({
			url: baseurl5 + 'Super_Admin/getDataPesan',
			data: {
				id: id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('#id').val(data.id_pesan);
				$('.baca').val(data.baca);
				$('.deskripsi').text(data.pesan);
				$('.nama_depan').text(data.nama_depan);
				$('.nama_belakang').text(data.nama_belakang);
			},
			error: function (response) {
				const responseJson = jQuery.parseJSON(response.responseText);
				console.log(responseJson.Message); //Logs the exception message
			}
		});

		$('.tutup button[type=submit]').on('click', function () {

			$.ajax({
				url: baseurl5 + 'Super_Admin/ubahBacaPesan',
				data: {
					id: id
				},
				type: 'post',
				success: function () {
					$('#dataTable').load(baseurl5 + 'Super_Admin/daftarPesan #dataTable');
					$('.judulHalaman').html('Daftar Pesan')
				},
				error: function () {}
			});
		});
	});
});

$('#messagesDropdown').on('click', function () {
	$('.pesan').html('');
});

//TODO: Modal ubah Pengurus Karang Taruna
$(function () {
	$('.tampilModalUbahKT').on('click', function () {
		const baseurl11 = $('.baseurl').data('base_url');
		$('.judulModal').html('Ubah Data Pengurus Karang Taruna');
		$('.modal-body form').attr('action', baseurl11 + 'Super_Admin/ubahPengurusKT/');

		const id = $(this).data('id');

		$.ajax({
			url: baseurl11 + 'Super_Admin/getDataUbahKT',
			data: {
				id_kt: id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('#id_aparat').val(data.id_kt);
				$('.nama').val(data.nama);
			},
			error: function (response) {
				const responseJson = jQuery.parseJSON(response.responseText);
				console.log(responseJson.Message); //Logs the exception message
			}
		});
	});
});

//TODO: Modal LPM
$(function () {
	const baseurl12 = $('.baseurl').data('base_url');

	$('.tombolTambahDataLPM').on('click', function () {
		$('.judulModal').html('Tambah Anggota LPM');
		$('.nama').val('');
		$('.modal-footer button[type=submit]').html('Tambah');
		$('.modal-body form').attr('action', baseurl12 + 'Super_Admin/daftarPengurusLPM');
	});

	$('.tampilModalUbahLPM').on('click', function () {

		$('.judulModal').html('Ubah Data Pengurus LPM');
		$('.modal-footer button[type=submit]').html('Ubah');
		$('.modal-body form').attr('action', baseurl12 + '/Super_Admin/ubahPengurusLPM');

		const id = $(this).data('id');

		$.ajax({
			url: baseurl12 + 'Super_Admin/getDataUbahLPM',
			data: {
				id_lpm: id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('#id_aparat').val(data.id_lpm);
				$('.nama').val(data.nama);
			},
			error: function (response) {
				const responseJson = jQuery.parseJSON(response.responseText);
				console.log(responseJson.Message); //Logs the exception message
			}
		});
	});
});

//TODO: Modal PKK
$(function () {
	const baseurl13 = $('.baseurl').data('base_url');

	$('.tombolTambahDataPKK').on('click', function () {
		$('.judulModal').html('Tambah Anggota PKK');
		$('.nama').val('');
		$('.modal-footer button[type=submit]').html('Tambah');
		$('.modal-body form').attr('action', baseurl13 + 'Super_Admin/daftarPengurusPKK');
	});

	$('.tampilModalUbahPKK').on('click', function () {

		$('.judulModal').html('Ubah Data Pengurus PKK');
		$('.modal-footer button[type=submit]').html('Ubah');
		$('.modal-body form').attr('action', baseurl13 + 'Super_Admin/ubahPengurusPKK');

		const id = $(this).data('id');

		$.ajax({
			url: baseurl13 + 'Super_Admin/getDataUbahPKK',
			data: {
				id_pkk: id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('#id_aparat').val(data.id_pkk);
				$('.nama').val(data.nama);
			},
			error: function (response) {
				const responseJson = jQuery.parseJSON(response.responseText);
				console.log(responseJson.Message); //Logs the exception message
			}
		});
	});
});

//TODO: Modal BPD
$(function () {
	const baseurl14 = $('.baseurl').data('base_url');

	$('.tombolTambahDataBPD').on('click', function () {
		$('.judulModal').html('Tambah Anggota BPD');
		$('.nama').val('');
		$('.modal-footer button[type=submit]').html('Tambah');
		$('.modal-body form').attr('action', baseurl14 + 'Super_Admin/daftarPengurusBPD');
	});

	$('.tampilModalUbahBPD').on('click', function () {

		$('.judulModal').html('Ubah Data Pengurus BPD');
		$('.modal-footer button[type=submit]').html('Ubah');
		$('.modal-body form').attr('action', baseurl14 + 'Super_Admin/ubahPengurusBPD');

		const id = $(this).data('id');

		$.ajax({
			url: baseurl14 + 'Super_Admin/getDataUbahBPD',
			data: {
				id_bpd: id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('#id_aparat').val(data.id_bpd);
				$('.nama').val(data.nama);
			},
			error: function (response) {
				const responseJson = jQuery.parseJSON(response.responseText);
				console.log(responseJson.Message); //Logs the exception message
			}
		});
	});
});

//TODO: Modal Aparat Pemerintah
$(function () {
	const baseurl15 = $('.baseurl').data('base_url');
	// tambah kepala dusun
	$('.tambahKepalaDusun').on('click', function () {
		$('.judulModal').html('Tambah Kepala Dusun');
		$('.nama').val('');
		$('.jabatan').val('');
		$('.jabatan').show('');
		$('.modal-footer button[type=submit]').html('Tambah');
		$('.modal-body form').attr('action', baseurl15 + 'Super_Admin/tambahKepalaDusun');
	});

	// tambah aparat
	$('.tambahAparatPemerintah').on('click', function () {
		$('.judulModal').html('Tambah Aparat Pemerintah');
		$('.nama').val('');
		$('.jabatan').val('');
		$('.jabatan').show('');
		$('.modal-footer button[type=submit]').html('Tambah');
		$('.modal-body form').attr('action', baseurl15 + 'Super_Admin/daftarAparatPemerintah');
	});

	// ubah semua aparat
	$('.tampilModalUbahAparat').on('click', function () {

		$('.judulModal').html('Ubah Data Aparat Pemerintah');
		$('.jabatan').show('');
		$('.modal-footer button[type=submit]').html('Ubah');
		$('.modal-body form').attr('action', baseurl15 + 'Super_Admin/ubahAparatPemerintah');

		const id = $(this).data('id');

		$.ajax({
			url: baseurl15 + 'Super_Admin/getDataAparatPemerintah',
			data: {
				id_pem: id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('#id_pem').val(data.id_pem);
				$('.nama').val(data.nama);
				$('.jabatan').val(data.jabatan);
			},
			error: function (response) {
				const responseJson = jQuery.parseJSON(response.responseText);
				console.log(responseJson.Message); //Logs the exception message
			}
		});
	});

	//TODO: ubah khusus sekdes
	$('.tampilModalUbahSekdes').on('click', function () {
		$('.jabatan').hide('');
		$('.judulModal').html('Ubah Data Sekretaris Desa');
		$('.modal-footer button[type=submit]').html('Ubah');
		$('.modal-body form').attr('action', baseurl15 + 'Super_Admin/ubahSekdes');

		const id = $(this).data('id');

		$.ajax({
			url: baseurl15 + 'Super_Admin/getDataAparatPemerintah',
			data: {
				id_pem: id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('#id_pem').val(data.id_pem);
				$('.nama').val(data.nama);
			},
			error: function (response) {
				const responseJson = jQuery.parseJSON(response.responseText);
				console.log(responseJson.Message); //Logs the exception message
			}
		});
	});
});

//TODO: tambah + ubah wilayah
$(function () {
	$('.tombolTambahDataWilayah').on('click', function () {
		$('#judulModal').html('Tambah Data Wilayah');
		$('.nomor_dusun').val('');
		$('.nomor_rw').val('');
		$('.nomor_rt').val('');
		$('.modal-footer button[type=submit]').html('Tambah Wilayah');
	});

	$('.tampilModalUbahWilayah').on('click', function () {
		const baseurl12 = $('.baseurl').data('base_url');

		$('#judulModal').html('Ubah Data Wilayah');
		$('.modal-footer button[type=submit]').html('Ubah Wilayah');
		$('.modal-body form').attr('action', baseurl12 + 'Super_Admin/ubahWilayah');

		const id = $(this).data('id');

		$.ajax({
			url: baseurl12 + 'Super_Admin/getDataUbahWilayah',
			data: {
				id_wilayah: id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('#id_wilayah').val(data.id_wilayah);
				$('.nomor_dusun').val(data.dusun);
				$('.nomor_rw').val(data.rw);
				$('.nomor_rt').val(data.rt);
			},
			error: function (response) {
				const responseJson = jQuery.parseJSON(response.responseText);
				console.log(responseJson.Message); //Logs the exception message
			}
		});
	});
});

//TODO: tambah + ubah saspras
$(function () {

	$('.tombolTambahDataSaspras').on('click', function () {
		$('.modal-title').html('Tambah Data Saspras');
		$('.nama').val('');
		$('.modal-footer button[type=submit]').html('Tambah Saspras');
	});

	$('.tampilModalUbahSaspras').on('click', function () {
		const baseurl7 = $('.baseurl').data('base_url');

		$('.modal-title').html('Ubah Data Saspras');
		$('.modal-footer button[type=submit]').html('Ubah Saspras');
		$('.modal-body form').attr('action', baseurl7 + 'Super_Admin/ubahSaspras');

		const id = $(this).data('id');

		$.ajax({
			url: baseurl7 + 'Super_Admin/getDataUbahSaspras',
			data: {
				id_saspras: id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('#id_saspras').val(data.id_saspras);
				$('.nama').val(data.nama);
				$('.kondisi').val(data.kondisi);
				$('.pemilik').val(data.pemilik);
				$('.jenis').val(data.jenis);
			},
			error: function (response) {
				const responseJson = jQuery.parseJSON(response.responseText);
				console.log(responseJson.Message); //Logs the exception message
			}
		});
	});
});

//TODO : Format angka dalam bentuk mata uang
$(document).ready(function ($) {
	$('.uang').mask('000,000,000,000', {
		reverse: true
	});
})

//TODO: Kostumasi tambah & ubah role
$(function () {

	$('.tombolTambahDataSK').on('click', function () {
		$('.nama').val('');
		$('.nomor').val('');
	});

	$('.tampilModalUbahSK').on('click', function () {
		const baseurl6 = $('.baseurl').data('base_url');

		$('.nama').prop('readonly', 'readonly');
		$('.judulModal').html('Ubah Data Surat Keterangan');
		$('.modal-footer button[type=submit]').html('Ubah');
		$('.modal-body form').attr('action', baseurl6 + 'Super_Admin/ubahSK');

		const id = $(this).data('id');

		$.ajax({
			url: baseurl6 + 'Super_Admin/getDataUbahSK',
			data: {
				id_sk: id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('#id_sk').val(data.id_sk);
				$('.nama').val(data.nama);
				$('.nomor').val(data.nomor2);
			},
			error: function (response) {
				const responseJson = jQuery.parseJSON(response.responseText);
				console.log(responseJson.Message); //Logs the exception message
			}
		});
	});
});

$('.aktif').on('click', function () {
	const baseurl10 = $('.baseurl').data('base_url');
	const id = $(this).data('id');

	$.ajax({
		url: baseurl10 + 'Super_Admin/aktifSK',
		data: {
			id: id
		},
		type: 'post',
		success: function () {
			$('#dataTable').load(baseurl10 + 'Super_Admin/daftarSK #dataTable');
		},
		error: function (response) {
			const responseJson = jQuery.parseJSON(response.responseText);
			console.log(responseJson.Message); //Logs the exception message
		}
	});
});

$('.non-aktif').on('click', function () {
	const baseurl10 = $('.baseurl').data('base_url');
	const id = $(this).data('id');

	$.ajax({
		url: baseurl10 + 'Super_Admin/nonAktifSK',
		data: {
			id: id
		},
		type: 'post',
		success: function () {
			$('#dataTable').load(baseurl10 + 'Super_Admin/daftarSK #dataTable');
		},
		error: function (response) {
			const responseJson = jQuery.parseJSON(response.responseText);
			console.log(responseJson.Message); //Logs the exception message
		}
	});
});

//pilihan data verifikasi sk
$('.pilih').change(function () {
	const baseurl16 = $('.baseurl').data('base_url');
	const pilih = $('.pilih').find('option:selected').val();
	if (pilih == 1) {
		$('.tabel-data').show();
		$.ajax({
			url: baseurl16 + "Surat_Keterangan/daftarSkTdkmampu",
			method: "Post",
			dataType: "json",
			success: function (data) {
				$('.tabel-data').html(data);
			}
		});

		$(document).on('click', '.ubahStatusSKTM', function () {
			$('.judulModal').html('Verifikasi SK Tidak Mampu');
			$('.modal-body form').attr('action', baseurl16 + 'Surat_Keterangan/ubahStatusSKTM');
			$('.nosurat').val('');
			const tgl = $(this).data('tgl');

			$.ajax({
				url: baseurl16 + 'Surat_Keterangan/getDataSKTM',
				data: {
					tgl: tgl
				},
				method: 'post',
				dataType: 'json',
				success: function (data) {
					$('#tgl_buat').val(data.tgl);
					$('.tgl_buat').val('SKTM' + data.tgl);
				},
				error: function (response) {
					const responseJson = jQuery.parseJSON(response.responseText);
					console.log(responseJson.Message); //Logs the exception message
				}
			});
		});
	} else if (pilih == 2) {
		$('.tabel-data').show();
		$.ajax({
			url: baseurl16 + "Surat_Keterangan/daftarSkSusunanK",
			method: "Post",
			dataType: "json",
			success: function (data) {
				$('.tabel-data').html(data);
			}
		});

		$(document).on('click', '.ubahStatusSKSK', function () {
			$('.judulModal').html('Verifikasi SK Susunan Keluarga');
			$('.modal-body form').attr('action', baseurl16 + 'Surat_Keterangan/ubahStatusSKSK');
			$('.nosurat').val('');
			const tgl = $(this).data('tgl');

			$.ajax({
				url: baseurl16 + 'Surat_Keterangan/getDataSKSK',
				data: {
					tgl: tgl
				},
				method: 'post',
				dataType: 'json',
				success: function (data) {
					$('#tgl_buat').val(data.tgl);
					$('.tgl_buat').val('SKSK' + data.tgl);
				},
				error: function (response) {
					const responseJson = jQuery.parseJSON(response.responseText);
					console.log(responseJson.Message); //Logs the exception message
				}
			});
		});
	} else if (pilih == 3) {
		$('.tabel-data').show();
		$.ajax({
			url: baseurl16 + "Surat_Keterangan/daftarSkDomisili",
			method: "Post",
			dataType: "json",
			success: function (data) {
				$('.tabel-data').html(data);
			}
		});

		$(document).on('click', '.ubahStatusSKD', function () {
			$('.judulModal').html('Verifikasi SK Domisili');
			$('.modal-body form').attr('action', baseurl16 + 'Surat_Keterangan/ubahStatusSKD');
			$('.nosurat').val('');
			const tgl = $(this).data('tgl');

			$.ajax({
				url: baseurl16 + 'Surat_Keterangan/getDataSKD',
				data: {
					tgl: tgl
				},
				method: 'post',
				dataType: 'json',
				success: function (data) {
					$('#tgl_buat').val(data.tgl);
					$('.tgl_buat').val('SKD' + data.tgl);
				},
				error: function (response) {
					const responseJson = jQuery.parseJSON(response.responseText);
					console.log(responseJson.Message); //Logs the exception message
				}
			});
		});
	} else if (pilih == 4) {
		$('.tabel-data').show();
		$.ajax({
			url: baseurl16 + "Surat_Keterangan/daftarSkKematian",
			method: "Post",
			dataType: "json",
			success: function (data) {
				$('.tabel-data').html(data);
			}
		});

		$(document).on('click', '.ubahStatusSKK', function () {
			$('.judulModal').html('Verifikasi SK Kematian');
			$('.modal-body form').attr('action', baseurl16 + 'Surat_Keterangan/ubahStatusSKK');
			$('.nosurat').val('');
			const id = $(this).data('id');

			$.ajax({
				url: baseurl16 + 'Surat_Keterangan/getDataSKK',
				data: {
					id: id
				},
				method: 'post',
				dataType: 'json',
				success: function (data) {
					$('#tgl_buat').val(data.id_peddk);
					$('.tgl_buat').val('SKK' + data.id_peddk);
				},
				error: function (response) {
					const responseJson = jQuery.parseJSON(response.responseText);
					console.log(responseJson.Message); //Logs the exception message
				}
			});
		});
	} else if (pilih == 5) {
		$('.tabel-data').show();
		$.ajax({
			url: baseurl16 + "Surat_Keterangan/daftarSkJbTernak",
			method: "Post",
			dataType: "json",
			success: function (data) {
				$('.tabel-data').html(data);
			}
		});

		$(document).on('click', '.ubahStatusSKJBT', function () {
			$('.judulModal').html('Verifikasi SK Jual Beli Ternak');
			$('.modal-body form').attr('action', baseurl16 + 'Surat_Keterangan/ubahStatusSKJBT');
			$('.nosurat').val('');
			const tgl = $(this).data('tgl');

			$.ajax({
				url: baseurl16 + 'Surat_Keterangan/getDataSKJBT',
				data: {
					tgl: tgl
				},
				method: 'post',
				dataType: 'json',
				success: function (data) {
					$('#tgl_buat').val(data.tgl);
					$('.tgl_buat').val('SKJBT' + data.tgl);
				},
				error: function (response) {
					const responseJson = jQuery.parseJSON(response.responseText);
					console.log(responseJson.Message); //Logs the exception message
				}
			});
		});
	} else if (pilih == 8) {
		$('.tabel-data').show();
		$.ajax({
			url: baseurl16 + "Surat_Keterangan/daftarSkUsaha",
			method: "Post",
			dataType: "json",
			success: function (data) {
				$('.tabel-data').html(data);
			}
		});

		$(document).on('click', '.ubahStatusSKU', function () {
			$('.judulModal').html('Verifikasi SK Usaha');
			$('.modal-body form').attr('action', baseurl16 + 'Surat_Keterangan/ubahStatusSKU');
			$('.nosurat').val('');
			const tgl_buat = $(this).data('tgl');

			$.ajax({
				url: baseurl16 + 'Surat_Keterangan/getDataSKU',
				data: {
					tgl_buat: tgl_buat
				},
				method: 'post',
				dataType: 'json',
				success: function (data) {
					$('#tgl_buat').val(data.tgl_buat);
					$('.tgl_buat').val('SKU' + data.tgl_buat);
				},
				error: function (response) {
					const responseJson = jQuery.parseJSON(response.responseText);
					console.log(responseJson.Message); //Logs the exception message
				}
			});
		});
	} else {
		$('.tabel-data').hide();
	}
});
