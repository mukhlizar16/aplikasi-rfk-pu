$(document).ready(function () {
	$('#btn-tambah').click(function () {
		$('#tambahModal').modal('show');
	});

	$('#btn-tambah-program').click(function () {
		$('#tambahProgramModal').modal('show')
		$('#form-program')[0].reset()
	});

	$('#form-program').submit(function (e) {
		e.preventDefault()
		$.ajax({
			url: $(this).attr('action'),
			type: 'post',
			data: $(this).serialize(),
			dataType: 'json',
			cache: false,
			success: function (response) {
				if (response.status == 'sukses') {
					Swal.fire(
						'Sukses !',
						response.pesan,
						'success'
					).then(function () {
						location.reload()
					})
				} else {
					Swal.fire(
						'Gagal !',
						response.pesan,
						'error'
					)
				}
			}
		})
	});

	$('#tabel-program').on('click', '#btn-hapus', function () {
		var id = $(this).closest('tr').find('#btn-hapus').attr('data-id')
		$('#hapusProgramModal').modal('show')
		$('#program-id').val(id)
	});

	$('#form-hapus-program').submit(function (e) {
		e.preventDefault()
		$.ajax({
			url: $(this).attr('action'),
			type: 'post',
			data: $(this).serialize(),
			dataType: 'json',
			cache: false,
			success: function (response) {
				if (response.status == 'sukses') {
					Swal.fire(
						'Sukses !',
						response.pesan,
						'success'
					).then(function () {
						location.reload()
					})
				} else {
					Swal.fire(
						'Gagal !',
						response.pesan,
						'error'
					)
				}
			}
		})
	});

	// kegiatan
	$('#btn-tambah-kegiatan').click(function () {
		$('#addModal').modal('show')
		$('#form-kegiatan')[0].reset()
	});

	$('#form-kegiatan').submit(function (e) {
		e.preventDefault()
		$.ajax({
			url: $(this).attr('action'),
			type: 'post',
			data: $(this).serialize(),
			dataType: 'json',
			cache: false,
			success: function (response) {
				Swal.fire({
					title: 'Menyimpan data...',
					allowEscapeKey: false,
					allowOutsideClick: false,
					timer: 2000,
					didOpen: () => {
						Swal.showLoading()
					}
				}).then(function () {
					if (response.status == 'sukses') {
						Swal.fire(
							'Sukses !',
							response.pesan,
							'success'
						).then(function () {
							location.reload()
						})
					} else {
						Swal.fire(
							'Gagal !',
							response.pesan,
							'error'
						)
					}
				})
			}
		})
	});

	$('#tabel-kegiatan').on('click', '#btn-hapus', function () {
		var id = $(this).closest('tr').find('#btn-hapus').data('id')
		$('#hapusKegiatanModal').modal('show')
		$('#kegiatan-id').val(id)
	});

	$('#form-hapus-kegiatan').submit(function (e) {
		e.preventDefault()
		$.ajax({
			url: $(this).attr('action'),
			type: 'post',
			data: $(this).serialize(),
			dataType: 'json',
			cache: false,
			success: function (response) {
				if (response.status == 'sukses') {
					Swal.fire(
						'Sukses !',
						response.pesan,
						'success'
					).then(function () {
						location.reload()
					})
				} else {
					Swal.fire(
						'Gagal !',
						response.pesan,
						'error'
					)
				}
			}
		})
	});

	// sub kegiatan
	$('#btn-tambah-subkegiatan').click(function () {
		$('#tambahSubKegiatanModal').modal('show')
		$('#form-subkegiatan')[0].reset()
	});

	$('#form-subkegiatan').submit(function (e) {
		e.preventDefault()
		$.ajax({
			url: $(this).attr('action'),
			type: 'post',
			data: $(this).serialize(),
			dataType: 'json',
			cache: false,
			success: function (response) {
				Swal.fire({
					title: 'Menyimpan data...',
					allowEscapeKey: false,
					allowOutsideClick: false,
					timer: 2000,
					didOpen: () => {
						Swal.showLoading()
					}
				}).then(function () {
					if (response.status == 'sukses') {
						Swal.fire(
							'Sukses !',
							response.pesan,
							'success'
						).then(function () {
							location.reload()
						})
					} else {
						Swal.fire(
							'Gagal !',
							response.pesan,
							'error'
						)
					}
				})
			}
		})
	});

	$('#tabel-subkegiatan').on('click', '#btn-hapus', function () {
		var id = $(this).closest('tr').find('#btn-hapus').attr('data-id')
		$('#hapusSubKegiatanModal').modal('show')
		$('#subkegiatan-id').val(id)
	});

	// pagu
	$('#btn-add-pagu').click(function () {
		$('#tambahPaguModal').modal('show')
	});


	//ajax get data kegiatan & sub kegiatan
	$('#program').change(function () {
		var id = $(this).val();
		var opt = '';
		$.ajax({
			url: 'get_kegiatan',
			type: 'post',
			data: {
				id: id
			},
			dataType: 'json',
			success: function (data) {
				for (var i = 0; i < data.length; i++) {
					opt = '<option value="' + data[i].id + '">' + data[i].nama_kegiatan + '</option>';
				}
				$('#kegiatan-list').append(opt)
			}
		})
	});

	$('#kegiatan-list').change(function () {
		var id = $(this).val();
		$.ajax({
			url: 'get_subkegiatan',
			type: 'post',
			data: {
				id: id
			},
			dataType: 'json',
			success: function (data) {
				var opt = '';
				opt = '<option value="">--Pilih--</option>'
				for (var i = 0; i < data.length; i++) {
					opt = '<option value="' + data[i].id + '">' + data[i].nama_subkegiatan + '</option>';
				}
				$('#subkegiatan').html(opt)
			}
		})
	});

	$('#subkegiatan').select2({
		dropdownParent: ('#tambahPaguModal')
	});

	// satuan
	$('#addModalSatuan').on('shown.bs.modal', function () {
		$('#satuan-input').focus();
	});
	$('#form-satuan').submit(function (e) {
		e.preventDefault()
		$.ajax({
			url: $(this).attr('action'),
			type: 'post',
			data: $(this).serialize(),
			dataType: 'json',
			cache: false,
			success: function (response) {
				if (response.status == 'sukses') {
					Swal.fire(
						'Sukses !',
						response.pesan,
						'success'
					).then(function () {
						$('#addModalSatuan').modal('hide')
						location.reload()
					})
				} else {
					Swal.fire(
						'Gagal !',
						response.pesan,
						'error'
					)
				}
			}
		})
	});

	// user
	$('#form-add-user').submit(function (e) {
		e.preventDefault()
		$.ajax({
			url: $(this).attr('action'),
			type: 'post',
			data: $(this).serialize(),
			dataType: 'json',
			cache: false,
			success: function (res) {
				if (res.status == 'sukses') {
					Swal.fire('Sukses !', res.pesan, 'success').then(function () {
						location.reload()
					})
				} else {
					Swal.fire('Gagal !', res.pesan, 'error')
				}
			}
		})
	});
	$('#table-list-user').on('click', '#btn-hapus', function () {
		var id = $(this).closest('tr').find('#btn-hapus').data('id')
		$('#hapusModal').modal('show')
		$('#id-user').val(id)
	});
	$('#form-hapus-user').submit(function (e) {
		e.preventDefault()
		$.ajax({
			url: $(this).attr('action'),
			type: 'post',
			data: $(this).serialize(),
			dataType: 'json',
			cache: false,
			success: function (res) {
				if (res.status == 'sukses') {
					Swal.fire('Sukses !', res.pesan, 'success').then(function () {
						location.reload()
					})
				} else {
					Swal.fire('Gagal !', res.pesan, 'error')
				}
			}
		})
	});

	// role
	$('#form-add-role').submit(function (e) {
		e.preventDefault()
		$.ajax({
			url: $(this).attr('action'),
			type: 'post',
			data: $(this).serialize(),
			dataType: 'json',
			cache: false,
			success: function (response) {
				if (response.status == 'sukses') {
					Swal.fire('Sukses !', response.pesan, 'success').then(function () {
						$('#addModalRole').modal('hide')
						location.reload()
					})
				} else {
					Swal.fire('Gagal !', response.pesan, 'error')
				}
			}
		})
	});
	$('#table-role').on('click', '#btn-hapus', function () {
		var id = $(this).closest('tr').find('#btn-hapus').data('id')
		$('#hapusModal').modal('show')
		$('#role-id').val(id)
	});
	$('#table-role').on('click', '#btn-edit', function () {
		var id = $(this).closest('tr').find('#btn-edit').data('id')
		$.ajax({
			url: 'get_role',
			type: 'post',
			data: {
				id: id
			},
			dataType: 'json',
			cache: false,
			success: function (data) {
				$('#editModalRole').modal('show')
				$('#id-role').val(data.id)
				$('#nama_role-edit').val(data.nama_role)
			}
		})
	});
	$('#form-hapus-role').submit(function (e) {
		e.preventDefault()
		$.ajax({
			url: $(this).attr('action'),
			type: 'post',
			data: $(this).serialize(),
			dataType: 'json',
			cache: false,
			success: function (response) {
				if (response.status == 'sukses') {
					Swal.fire('Sukses !', response.pesan, 'success').then(function () {
						$('#hapusModal').modal('hide')
						location.reload()
					})
				} else {
					Swal.fire('Gagal !', response.pesan, 'error')
				}
			}
		})
	});
	$('#role').select2({
		dropdownParent: $('#addModalUser'),
		placeholder: 'Pilih role user'
	});

	// sektor
	$('#table-sektor').on('click', '#btn-hapus', function () {
		let id = $(this).closest('tr').find('#btn-hapus').data('id');
		$('#hapusModalSektor').modal('show');
		$('#sektor-id').val(id);
	});
	$('#table-sektor').on('click', '#btn-edit', function () {
		let id = $(this).closest('tr').find('#btn-edit').data('id');
		let nama = $(this).closest('tr').find('#btn-edit').data('nama');
		$('#editModalSektor').modal('show');
		$('#id-sektor-edit').val(id);
		$('#nama-sektor-edit').val(nama);
	});
	$('#form-add-sektor').submit(function (e) {
		e.preventDefault()
		$.ajax({
			url: $(this).attr('action'),
			type: 'post',
			data: $(this).serialize(),
			dataType: 'json',
			cache: false,
			success: function (res) {
				if (res.status == 'sukses') {
					Swal.fire('Sukses !', res.pesan, 'success').then(function () {
						location.reload()
					})
				} else if (res.status == 'error') {
					Swal.fire('Peringatan !', res.pesan, 'warning')
				} else {
					Swal.fire('Gagal !', res.pesan, 'error')
				}
			}
		})
	});
	$('#table-sektor').on('click', '#btn-hapus', function (e) {
		let id = $(this).closest('tr').find('#btn-hapus').data('id');
		$('#hapusModalSektor').modal('show');
		$('#sektor-id').val(id);

	});
	$('#form-hapus-sektor').submit(function (e) {
		e.preventDefault();
		$.ajax({
			url: 'delete_sektor',
			type: 'post',
			data: $(this).serialize(),
			dataType: 'json',
			cache: false,
			success: function (res) {
				if (res.status == 'sukses') {
					Swal.fire("Sukses !", res.pesan, "success").then(function () {
						location.reload()
					})
				} else {
					Swal.fire("Error !", res.pesan, "error")
				}
			}
		})
	})

	// Divisi
	$('#sektor-divisi').select2({
		dropdownParent: $('#addModalDivisi'),
		placeholder: 'Pilih...'
	});
	$('#form-add-divisi').submit(function (e) {
		e.preventDefault()
		$.ajax({
			url: $(this).attr('action'),
			type: 'post',
			data: $(this).serialize(),
			dataType: 'json',
			cache: false,
			success: function (res) {
				if (res.status == 'sukses') {
					Swal.fire('Sukses !', res.pesan, 'success').then(function () {
						location.reload()
					})
				} else if (res.status == 'error') {
					Swal.fire('Peringatan !', res.pesan, 'warning')
				} else {
					Swal.fire('Gagal !', res.pesan, 'error')
				}
			}
		})
	});

	// pagu
	$('#subkegiatan').change(function (e) {
		e.preventDefault()
		var id = $(this).val();
		$.ajax({
			url: 'get_data_detil',
			type: 'post',
			data: {
				id: id
			},
			dataType: 'json',
			cache: false,
			success: function (data) {
				$('#program').val(data.nm_p)
				$('#kegiatan').val(data.nm_k)
			}
		})
	});
	$('#form-pagu').submit(function (e) {
		e.preventDefault()
		var tipe = $('#tipe').val();
		if (tipe == 'update') {
			$.ajax({
				url: 'update_pagu',
				type: 'post',
				data: $(this).serialize(),
				dataType: 'json',
				cache: false,
				success: function (response) {
					Swal.fire({
						title: 'Memperbaharui data...',
						allowEscapeKey: false,
						allowOutsideClick: false,
						timer: 2000,
						didOpen: () => {
							Swal.showLoading()
						}
					}).then(function () {
						if (response.status == 'sukses') {
							Swal.fire(
								'Sukses !',
								response.pesan,
								'success'
							).then(function () {
								location.reload()
							})
						} else {
							Swal.fire(
								'Gagal !',
								response.pesan,
								'error'
							)
						}
					})
				}
			})
		} else {
			$.ajax({
				url: $(this).attr('action'),
				type: 'post',
				data: $(this).serialize(),
				dataType: 'json',
				cache: false,
				success: function (response) {
					Swal.fire({
						title: 'Menyimpan data...',
						allowEscapeKey: false,
						allowOutsideClick: false,
						timer: 2000,
						didOpen: () => {
							Swal.showLoading()
						}
					}).then(function () {
						if (response.status == 'sukses') {
							Swal.fire(
								'Sukses !',
								response.pesan,
								'success'
							).then(function () {
								location.reload()
							})
						} else {
							Swal.fire(
								'Gagal !',
								response.pesan,
								'error'
							)
						}
					})
				}
			})
		}
	});
	$('#satuan').select2({
		dropdownParent: ('#tambahPaguModal')
	});
	$('#pagu, #nilai-kontrak').mask('000.000.000.000.000', {
		reverse: true
	});
	$('#tabel-pagu').on('click', '#btn-edit', function () {
		var id = $(this).closest('tr').find('#btn-edit').data('id')
		$.ajax({
			url: 'edit_pagu',
			type: 'post',
			data: {
				id: id
			},
			dataType: 'json',
			success: function (data) {
				$('#tambahPaguModal').modal('show')
				$('#modalPaguTitle').html('Update Data')
				$('#btn-submit-pagu').html('Update')
				$('#tipe').val('update');
				$('#id-pagu').val(data.id)
				$('#pekerjaan').val(data.uraian)
				$('#lokasi').val(data.lokasi)
				$('#volume').val(data.volume)
				$('#pagu').val(data.pagu)
				$('#jenis').val(data.jenis)
			}
		})
	});
	$('#tabel-pagu').on('click', '#btn-hapus', function () {
		var id = $(this).closest('tr').find('#btn-hapus').data('id');
		$('#hapusPaguModal').modal('show');
		$('#id-pagu-delete').val(id);
	});
	$('#form-delete-pagu').submit(function (e) {
		e.preventDefault();
		$.ajax({
			url: 'delete_pagu',
			type: 'post',
			data: $(this).serialize(),
			dataType: 'json',
			success: function (res) {
				if (res.status == 'sukses') {
					Swal.fire('Sukses !', res.pesan, 'success').then(() => {
						location.reload();
					})
				} else {
					Swal.fire('Gagal !', res.pesan, 'error')
				}
			}
		})
	});

	// kontrak
	$('#btn-add-kontrak').click(function () {
		$('#addKontrakModal').modal('show')
	});
	$('#uraian-kontrak').select2({
		dropdownParent: $('#addKontrakModal')
	});
	$('#uraian-kontrak').change(function (e) {
		var id = $(this).val()
		e.preventDefault()
		$.ajax({
			url: 'get_pagu_data',
			type: 'post',
			data: {
				id: id
			},
			dataType: 'json',
			success: function (data) {
				$('#program-kontrak').val(data.program);
				$('#kegiatan-kontrak').val(data.kegiatan);
				$('#subkegiatan-kontrak').val(data.sub);
				$('#pagu-kontrak').val(data.pagu).mask('000.000.000.000.000', {
					reverse: true
				}).attr('readonly', 'readonly');
				$('#nilai-kontrak').on('change keyup', function () {
					var n = $('#nilai-kontrak').cleanVal();
					var p = $('#pagu-kontrak').cleanVal();
					var sisa = p - n;
					$('#sisa-kontrak').val(sisa).trigger('input');
				});
				$('#sisa-kontrak').mask('000.000.000.000.000', {
					reverse: true
				}).attr('readonly', 'readonly');
			}
		})
	});
	$('#form-kontrak').submit(function (e) {
		e.preventDefault()
		$.ajax({
			url: 'store_kontrak',
			type: 'post',
			data: $(this).serialize(),
			dataType: 'json',
			cache: false,
			success: function (response) {
				Swal.fire({
					title: 'Menyimpan data...',
					allowEscapeKey: false,
					allowOutsideClick: false,
					timer: 2000,
					didOpen: () => {
						Swal.showLoading()
					}
				}).then(function () {
					if (response.status == 'sukses') {
						Swal.fire(
							'Sukses !',
							response.pesan,
							'success'
						).then(function () {
							location.reload()
						})
					} else {
						Swal.fire(
							'Gagal !',
							response.pesan,
							'error'
						)
					}
				})
			}
		})
	});

	// realisasi
	$('#btn-add-realisasi').click(function () {
		$('#addRealisasiModal').modal('show')
	});
	$('#uraian-realisasi').select2({
		dropdownParent: $('#addRealisasiModal')
	});
	$('#uraian-realisasi').change(function (e) {
		e.preventDefault()
		var id = $(this).val()
		$.ajax({
			url: 'ambil_kontrak',
			type: 'post',
			data: {
				id: id
			},
			dataType: 'json',
			success: function (data) {
				$('#nilai-kontrak').val(data.kontrak)
				$('#nilai-pagu').val(data.pagu)
			}
		})
	});
	$('#progress').on('change keyup', function () {
		var kontrak = $('#nilai-kontrak').val();
		var pagu = $('#nilai-pagu').val();
		var uang = $('#progress').cleanVal();
		var sen = (uang / kontrak) * 100;
		var sen2 = (uang / pagu) * 100;
		$('#persentase').val(sen.toFixed(2))
		$('#persentase2').val(sen2.toFixed(2))
	});

	// fisik
	$('#btn-add-fisik').click(function () {
		$('#addfisikModal').modal('show')
	});
	$('#addfisikModal').on('shown.bs.modal', function () {
		$('#pekerjaan').select2({
			dropdownParent: $(this)
		})
	})

	// seksi
	$('#divisi').select2({
		dropdownParent: $('#addModalSeksi'),
		placeholder: 'Pilih divisi...'
	})

	$('#form-add-seksi').submit(function (e) {
		e.preventDefault();
		$.ajax({
			url: 'add_seksi',
			type: 'post',
			data: $(this).serialize(),
			dataType: 'json',
			cache: false,
			success: function (res) {
				if (res.status == 'sukses') {
					Swal.fire('Sukses !', res.pesan, 'success').then(function () {
						location.reload();
					});
				} else {
					Swal.fire('Gagal !', res.pesan, 'error');
				}
			}
		})
	})


	// penugasan
	$('#pekerjaan-tugas, #konsultan-tugas').select2({
		dropdownParent: $('#addModalPenugasan'),
	});
	$('#form-add-penugasan').submit(function (e) {
		e.preventDefault();
		$.ajax({
			url: $(this).attr('action'),
			type: 'post',
			data: $(this).serialize(),
			dataType: 'json',
			cache: false,
			success: function (res) {
				if (res.status == 'sukses') {
					Swal.fire('Sukses !', res.pesan, 'success').then(function () {
						location.reload()
					})
				} else {
					Swal.fire('Gagal !', res.pesan, 'error')
				}
			}
		})
	});
	$('#table-penugasan').on('click', '#btn-hapus', function () {
		let id = $(this).closest('tr').find('#btn-hapus').data('id');
		$('#hapusModalpenugasan').modal('show');
		$('#id-hapus-tugas').val(id);
	});
	$('#form-hapus-penugasan').submit(function (e) {
		e.preventDefault();
		$.ajax({
			url: 'hapus_penugasan',
			type: 'post',
			data: $(this).serialize(),
			dataType: 'json',
			success: function (res) {
				if (res.status == 'sukses') {
					Swal.fire('Sukses !', res.pesan, 'success').then(() => {
						location.reload();
					})
				} else {
					Swal.fire('Gagal !', res.pesan, 'error')
				}
			}
		})
	});

	// datatables
	$('#tabel-program').DataTable({
		language: {
			sEmptyTable: "Tidak ada data yang tersedia pada tabel ini",
			sProcessing: "Sedang memproses...",
			sLengthMenu: "Tampilkan _MENU_ data",
			sZeroRecords: "Tidak ditemukan data yang sesuai",
			sInfo: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
			sInfoEmpty: "Menampilkan 0 sampai 0 dari 0 data",
			sInfoFiltered: "(disaring dari _MAX_ data keseluruhan)",
			sInfoPostFix: "",
			sSearch: "Cari:",
			sUrl: "",
			oPaginate: {
				sFirst: "Pertama",
				sPrevious: "&lt",
				sNext: "&gt",
			}
		}
	});
	$('#tabel-kegiatan').DataTable({
		language: {
			sEmptyTable: "Tidak ada data yang tersedia pada tabel ini",
			sProcessing: "Sedang memproses...",
			sLengthMenu: "Tampilkan _MENU_ data",
			sZeroRecords: "Tidak ditemukan data yang sesuai",
			sInfo: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
			sInfoEmpty: "Menampilkan 0 sampai 0 dari 0 data",
			sInfoFiltered: "(disaring dari _MAX_ data keseluruhan)",
			sInfoPostFix: "",
			sSearch: "Cari:",
			sUrl: "",
			oPaginate: {
				sFirst: "Pertama",
				sPrevious: "&lt",
				sNext: "&gt",
			}
		},
	});
	$('#tabel-subkegiatan').DataTable({
		language: {
			sEmptyTable: "Tidak ada data yang tersedia pada tabel ini",
			sProcessing: "Sedang memproses...",
			sLengthMenu: "Tampilkan _MENU_ data",
			sZeroRecords: "Tidak ditemukan data yang sesuai",
			sInfo: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
			sInfoEmpty: "Menampilkan 0 sampai 0 dari 0 data",
			sInfoFiltered: "(disaring dari _MAX_ data keseluruhan)",
			sInfoPostFix: "",
			sSearch: "Cari:",
			sUrl: "",
			oPaginate: {
				sFirst: "Pertama",
				sPrevious: "&lt",
				sNext: "&gt",
			}
		},
	});
	$('#tabel-pagu').DataTable({
		language: {
			sEmptyTable: "Tidak ada data yang tersedia pada tabel ini",
			sProcessing: "Sedang memproses...",
			sLengthMenu: "Tampilkan _MENU_ data",
			sZeroRecords: "Tidak ditemukan data yang sesuai",
			sInfo: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
			sInfoEmpty: "Menampilkan 0 sampai 0 dari 0 data",
			sInfoFiltered: "(disaring dari _MAX_ data keseluruhan)",
			sInfoPostFix: "",
			sSearch: "Cari:",
			sUrl: "",
			oPaginate: {
				sFirst: "Pertama",
				sPrevious: "&lt",
				sNext: "&gt",
			}
		},
	});
	$('#table-kontrak').DataTable({
		language: {
			sEmptyTable: "Tidak ada data yang tersedia pada tabel ini",
			sProcessing: "Sedang memproses...",
			sLengthMenu: "Tampilkan _MENU_ data",
			sZeroRecords: "Tidak ditemukan data yang sesuai",
			sInfo: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
			sInfoEmpty: "Menampilkan 0 sampai 0 dari 0 data",
			sInfoFiltered: "(disaring dari _MAX_ data keseluruhan)",
			sInfoPostFix: "",
			sSearch: "Cari:",
			sUrl: "",
			oPaginate: {
				sFirst: "Pertama",
				sPrevious: "&lt",
				sNext: "&gt",
			}
		},
	});
	$('#table-role').DataTable({
		language: {
			sEmptyTable: "Tidak ada data yang tersedia pada tabel ini",
			sProcessing: "Sedang memproses...",
			sLengthMenu: "Tampilkan _MENU_ data",
			sZeroRecords: "Tidak ditemukan data yang sesuai",
			sInfo: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
			sInfoEmpty: "Menampilkan 0 sampai 0 dari 0 data",
			sInfoFiltered: "(disaring dari _MAX_ data keseluruhan)",
			sInfoPostFix: "",
			sSearch: "Cari:",
			sUrl: "",
			oPaginate: {
				sFirst: "Pertama",
				sPrevious: "&lt",
				sNext: "&gt",
			}
		},
	});
	$('#table-list-user').DataTable({
		language: {
			sEmptyTable: "Tidak ada data yang tersedia pada tabel ini",
			sProcessing: "Sedang memproses...",
			sLengthMenu: "Tampilkan _MENU_ data",
			sZeroRecords: "Tidak ditemukan data yang sesuai",
			sInfo: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
			sInfoEmpty: "Menampilkan 0 sampai 0 dari 0 data",
			sInfoFiltered: "(disaring dari _MAX_ data keseluruhan)",
			sInfoPostFix: "",
			sSearch: "Cari:",
			sUrl: "",
			oPaginate: {
				sFirst: "Pertama",
				sPrevious: "&lt",
				sNext: "&gt",
			}
		},
	});
	$('#table-sektor').DataTable({
		language: {
			sEmptyTable: "Tidak ada data yang tersedia pada tabel ini",
			sProcessing: "Sedang memproses...",
			sLengthMenu: "Tampilkan _MENU_ data",
			sZeroRecords: "Tidak ditemukan data yang sesuai",
			sInfo: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
			sInfoEmpty: "Menampilkan 0 sampai 0 dari 0 data",
			sInfoFiltered: "(disaring dari _MAX_ data keseluruhan)",
			sInfoPostFix: "",
			sSearch: "Cari:",
			sUrl: "",
			oPaginate: {
				sFirst: "Pertama",
				sPrevious: "&lt",
				sNext: "&gt",
			}
		},
	});
	$('#table-divisi').DataTable({
		language: {
			sEmptyTable: "Tidak ada data yang tersedia pada tabel ini",
			sProcessing: "Sedang memproses...",
			sLengthMenu: "Tampilkan _MENU_ data",
			sZeroRecords: "Tidak ditemukan data yang sesuai",
			sInfo: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
			sInfoEmpty: "Menampilkan 0 sampai 0 dari 0 data",
			sInfoFiltered: "(disaring dari _MAX_ data keseluruhan)",
			sInfoPostFix: "",
			sSearch: "Cari:",
			sUrl: "",
			oPaginate: {
				sFirst: "Pertama",
				sPrevious: "&lt",
				sNext: "&gt",
			}
		},
	});
	$('#table-seksi').DataTable({
		language: {
			sEmptyTable: "Tidak ada data yang tersedia pada tabel ini",
			sProcessing: "Sedang memproses...",
			sLengthMenu: "Tampilkan _MENU_ data",
			sZeroRecords: "Tidak ditemukan data yang sesuai",
			sInfo: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
			sInfoEmpty: "Menampilkan 0 sampai 0 dari 0 data",
			sInfoFiltered: "(disaring dari _MAX_ data keseluruhan)",
			sInfoPostFix: "",
			sSearch: "Cari:",
			sUrl: "",
			oPaginate: {
				sFirst: "Pertama",
				sPrevious: "&lt",
				sNext: "&gt",
			}
		},
	});

	// tooltip
	$('body').tooltip({
		selector: '[data-toggle="tooltip"]'
	});

	/* graph */
	Highcharts.chart('chart', {
		title: {
			text: 'Realisasi Fisik dan Keuangan Dana Otsus Aceh Kabupaten Aceh Barat'
		},
		subtitle: {
			text: 'Sumber: Dinas PUPR Kab. Aceh Barat'
		},
		yAxis: {
			title: {
				text: '% Realisasi'
			}
		},
		xAxis: {
			categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
		},
		legend: {
			layout: 'vertical',
			align: 'right',
			verticalAlign: 'middle'
		},
		plotOptions: {
			line: {
				dataLabels: {
					enabled: true
				},
				enableMouseTracking: true
			}
		},
		series: [{
				name: 'Jembatan',
				data: [7.0, 6.9, 9.5, 14.5, 18.4, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
			},
			{
				name: 'Jalan',
				data: [3.9, 4.2, 8.7, 8.5, 11.9, 23.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
			}
		]
	});
})
