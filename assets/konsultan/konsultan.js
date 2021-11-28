$(document).ready(function () {
	// select2
	$('#pekerjaan-rab, #uraian-rab, #jenis-rab, #option-anak-uraian').select2({
		dropdownParent: $('#addModalRAB'),
		placeholder: 'Pilih disini...'
	});
	$('#rab-id-adendum').select2({
		dropdownParent: $('#addModalAdendum'),
		placeholder: 'Pilih...'
	});

	// RAB
	$('#jenis-rab').change(function (e) {
		let id = $(this).val();
		let opt = '';
		e.preventDefault();
		$.ajax({
			url: 'get_seksi',
			type: 'post',
			data: {
				id: id
			},
			dataType: 'json',
			cache: false,
			success: function (data) {
				for (let i = 0; i < data.length; i++) {
					opt += '<option value="' + data[i].id + '">' + data[i].nama_seksi + '</option>';
				}
				$('#uraian-rab').html(opt).trigger('change');
			}
		})
	});
	$('#harga-rab').on('change keyup', function () {
		$(this).val(formatRupiah($(this).val()));
		total_harga();
	});
	$('#volume').on('change keyup', function () {
		$(this).val(formatRupiah($(this).val()));
		total_harga();
	});
	$('#uraian-rab').on('change', function (e) {
		e.preventDefault();
		let id = $(this).val();
		$.ajax({
			url: 'get_nama_seksi',
			type: 'post',
			data: {
				id: id
			},
			dataType: 'json',
			success: function (data) {
				if (data == 'Lainnya') {
					$('#label-lain').removeAttr('style');
					$('#seksi-lain').prop("type", "text");
					$('#anak-uraian').removeAttr('style');
				} else {
					$('#label-lain').css('display', 'none');
					$('#anak-uraian').css('display', 'none');
					$('#seksi-lain').prop("type", "hidden");
				}
			}
		})
	});

	$('#option-anak-uraian').change(function () {
		let id = $(this).val();
		if (id == 1) {
			$('#input-anak-uraian').removeAttr('style');
		} else {
			$('#input-anak-uraian').css('display', 'none');
		}
	})

	function total_harga() {
		let harga = $('#harga-rab').val().split(".").join("").replace(',', '.');
		let vol = $('#volume').val().split(".").join("").replace(',', '.');
		let total = parseFloat(vol) * harga;
		$('#jumlah-rab').val(total.toFixed(2)).trigger('input');
		$('#jumlah-rab').mask("#.##0,00", {
			reverse: true
		}).prop('readonly', true);
	}
	$('#form-add-rab').submit(function (e) {
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
	$('#table-rab').on('click', '#btn-hapus', function () {
		let id = $(this).closest('tr').find('#btn-hapus').data('id');
		$('#hapusModalRAB').modal('show');
		$('#rab-id').val(id);
	});
	$('#form-hapus-rab').submit(function (e) {
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

	// progres
	$('#bulan-tampil').select2({
		placeholder: 'Pilih bulan'
	});
	$('#bulan-tampil').on('change', function () {
		let id = $(this).val();
		$.ajax({
			url: 'get_progres',
			type: 'post',
			data: {
				id: id
			},
			dataType: 'json',
			success: function (data) {
				$('#table-progres').find('tbody').empty();
				// var array = ['70', '71', '72', '73', '74', '75', '76', '77', '78', '79', '80'];
				var header = data.header;
				var isi = data.progres;
				var jlh = data.jumlah;
				var akhir = data.total;
				var pajak = (akhir.total_akhir * 0.1).toFixed(2);
				var p = akhir.total_akhir * 0.1;
				//var harga_total = (akhir.total_akhir + p);
				var tr = '';
				for (var i = 0; i < header.length; i++) {
					var nd = i + 1;
					tr += '<tr><td class="judul" colspan="12">Divisi ' + nd + '. ' + header[i].divisi + '</td></tr>';
					for (var j = 0; j < isi.length; j++) {
						if (isi[j].divisi_id == header[i].id) {
							var no = j + 1;
							tr += '<tr>' +
								'<td class="text-center">' + no + '</td>';
							// if ($.inArray(isi[j].seksi_id, array) == 1) {
							// 	tr += '<td>' + isi[j].seksi_lain + '</td>';
							// } else {
							// 	tr += '<td>' + isi[j].nama_seksi + '</td>';
							// }
							if (isi[j].nama_seksi == 'Lainnya' && isi[j].cabang_seksi_lainnya != null) {
								tr += '<td>' + isi[j].cabang_seksi_lain + '</td>';
							} else if (isi[j].nama_seksi != 'Lainnya') {
								tr += '<td>' + isi[j].nama_seksi + '</td>';
							} else {
								tr += '<td>' + isi[j].seksi_lain + '</td>';
							}
							tr += '<td class="text-center">' + isi[j].satuan + '</td>' +
								'<td class="text-center">' + isi[j].vol_sebelum + ' </td>' +
								'<td class="text-center" nowrap>Rp. ' + formatRupiah(isi[j].jlh_harga_sebelum.replace(".", ",")) + '</td>' +
								'<td class="text-center">' + isi[j].bobot_sebelum + '</td>' +
								'<td class="text-center">' + isi[j].vol_sekarang + '</td>' +
								'<td class="text-center" nowrap>Rp. ' + formatRupiah(isi[j].jlh_harga_sekarang.replace(".", ",")) + '</td>' +
								'<td class="text-center">' + isi[j].bobot_sekarang + '</td>' +
								'<td class="text-center">' + isi[j].vol_total + '</td>' +
								'<td class="text-center" nowrap>Rp. ' + formatRupiah(isi[j].harga_total.replace(".", ",")) + '</td>' +
								'<td class="text-center">' + isi[j].bobot_total + '</td>' +
								'</tr>';
						}
					}
					for (var n = 0; n < jlh.length; n++) {
						if (jlh[n].idd == header[i].id) {
							tr += '<tr><td colspan="3">Jumlah</td>' +
								'<td></td>' +
								'<td></td>' +
								'<td></td>' +
								'<td class="text-center">' + jlh[n].vol_tot_skrg.replace(".", ",") + '</td>' +
								'<td nowrap><strong>Rp. ' + formatRupiah(jlh[n].total_sekarang.replace(".", ",")) + '</strong></td>' +
								'<td class="text-center">' + jlh[n].bobot_tot_skrg.replace(".", ",") + '</td>' +
								'</tr>';
						}
					}
				}
				tr += '<tr><td colspan="6"> JUMLAH HARGA (TERMASUK BIAYA UMUM DAN KEUNTUNGAN )+PPN</td>' +
					'<td class="text-center"></td>' +
					'<td nowrap><strong>Rp. ' + formatRupiah(akhir.total_akhir.replace(".", ",")) + '</strong></td>' +
					'<td class="text-center"></td>' +
					'</tr>';
				tr += '<tr><td colspan="6">PAJAK PERTAMBAHAN NILAI (PPN) 10%</td>' +
					'<td class="text-center"></td>' +
					'<td nowrap><strong>Rp. ' + formatRupiah(pajak.toString().replace(".", ",")) + '</strong></td>' +
					'<td class="text-center"></td>' +
					'</tr>';
				tr += '<tr><td colspan="6">TOTAL HARGA</td>' +
					'<td class="text-center"></td>' +
					'<td nowrap><strong>Rp. ' + formatRupiah((Number(p) + Number(akhir.total_akhir)).toFixed(2).toString().replace(".", ",")) + '</strong></td>' +
					'<td class="text-center"></td>' +
					'</tr>';
				console.log(pajak.toString().replace(".", ","));
				$('#table-progres').prepend(tr);
			}
		})
	});
	$('#pekerjaan-progres,#seksi-progres, #divisi-progres, #bulan').select2({
		dropdownParent: $('#addModalProgres'),
		placeholder: 'Pilih disini...'
	});
	$('#pekerjaan-progres').on('change', function (e) {
		e.preventDefault();
		let ids = $(this).val();
		$.ajax({
			url: 'divisi_rab',
			type: 'post',
			data: {
				id: ids
			},
			dataType: 'json',
			success: function (data) {
				var opt = '';
				for (var i = 0; i < data.length; i++) {
					opt += '<option value="' + data[i].id + '">' + data[i].nama_divisi + '</option>';
				}
				$('#divisi-progres').html(opt).trigger('change');
			}
		})
	});
	$('#divisi-progres').on('change', function (e) {
		e.preventDefault();
		let ids = $(this).val();
		var seksi, seksi2;
		$.ajax({
			url: 'seksi_rab',
			type: 'post',
			data: {
				id: ids
			},
			dataType: 'json',
			success: function (data) {
				var opt = '';
				opt += '<option value="">--Pilih--</option>';
				for (var i = 0; i < data.length; i++) {
					if (data[i].nama_seksi == 'Lainnya') {
						if (data[i].cabang_seksi_lain != null) {
							seksi2 = ' - ' + data[i].cabang_seksi_lain;
						} else {
							seksi2 = '';
						}
						seksi = data[i].seksi_lain + seksi2;
					} else {
						seksi2 = '';
						seksi = data[i].nama_seksi + seksi2;
					}
					opt += '<option value="' + data[i].id + '" data-nama="' + seksi + '">' + seksi + '</option>';
				}
				$('#seksi-progres').html(opt);
			}
		})
	});
	$('#seksi-progres').on('change', function (e) {
		e.preventDefault();
		let id = $(this).val();
		let nama_seksi = $(this).find('option:selected').data('nama');
		let pekerjaan_id = $('#pekerjaan-progres').val();
		$.ajax({
			url: 'get_rab_id',
			type: 'post',
			data: {
				id: id,
				idp: pekerjaan_id,
				seksi: nama_seksi
			},
			dataType: 'json',
			cache: false,
			success: function (data) {
				$('#id-rab').val(data.id);
				$('#volume-progress').on('change keyup', function () {
					let vol = $(this).val().split(".").join("").replace(',', '.');
					let harga = parseFloat(vol * data.harga_satuan);
					let bobot_awal = data.bobot.replace(",", ".");
					let item = harga / data.jumlah * 100;
					let bobot = (bobot_awal / 100 * item).toString().replace(".", ",");
					console.log(harga.toString().replace(".", ","), bobot_awal, bobot, vol);
					$('#jumlah-progres').val(formatRupiah(harga.toString().replace(".", ","))).prop('readonly', true);
					$('#bobot-progres').val(bobot).prop('readonly', true);
				});
			}
		})
	});
	$('#bulan').on('change', function (e) {
		e.preventDefault();
		ambil_progres();
	})
	// ambil data progres yang sudah ada
	function ambil_progres() {
		let id = $('#id-rab').val();
		let bulan = $('#bulan').val();
		$.ajax({
			url: 'ambil_progres',
			type: 'post',
			data: {
				id: id,
				bulan: bulan
			},
			dataType: 'json',
			success: function (data) {
				$('#vol_sebelum').val(data.vol);
				$('#harga_sebelum').val(data.harga);
				$('#bobot_sebelum').val(data.bobot);
			}
		})
	}
	$('#form-add-progress').submit(function (e) {
		e.preventDefault();
		$.ajax({
			url: $(this).attr('action'),
			type: 'post',
			data: $(this).serialize(),
			dataType: 'json',
			cache: false,
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
	$('#table-progres').on('click', '#btn-hapus', function () {
		$('#hapusModalProgres').modal('show');
	});

	// adendum
	$('#rab-id-adendum').change(function (e) {
		e.preventDefault();
		$('#jlh-harga').val('');
		$('#vol-baru').val('');
		var id = $(this).val();
		$.ajax({
			url: 'get_rab_adendum',
			type: 'post',
			data: {
				id: id
			},
			dataType: 'json',
			cache: false,
			success: function (data) {
				var harga_satuan = data.harga_satuan;
				$('#vol-lama').val(data.volume);
				$('#jumlah-lama').val(data.jumlah);
				$('#vol-baru').on('change keyup', function () {
					var vol = $('#vol-baru').val().replace(",", ".");
					var harga_baru = parseInt(vol * harga_satuan);
					$('#jlh-harga').val(formatRupiah(harga_baru.toString()));
				});
			}
		})
	});
	$('#addModalAdendum').on('hidden.bs.modal', function () {
		$('#form-add-adendum')[0].reset();
		$("#rab-id-adendum").val('').trigger('change')
	});
	$('#form-add-adendum').submit(function (e) {
		e.preventDefault(),
			$.ajax({
				url: 'store_adendum',
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
						Swal.fire('peringatan !', res.pesan, 'warning')
					} else {
						Swal.fire('Gagal !', res.pesan, 'error')
					}
				}
			})
	})


	// Format Rupiah
	function formatRupiah(angka) {
		var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split = number_string.split(','),
			sisa = split[0].length % 3,
			rupiah = split[0].substr(0, sisa),
			ribuan = split[0].substr(sisa).match(/\d{3}/gi);
		// tambahkan titik jika yang di input sudah menjadi angka ribuan
		if (ribuan) {
			separator = sisa ? '.' : '';
			rupiah += separator + ribuan.join('.');
		}
		return rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
	}

	// Datatables
	// $('#table-rab').DataTable({
	// 	language: {
	// 		sEmptyTable: "Tidak ada data yang tersedia pada tabel ini",
	// 		sProcessing: "Sedang memproses...",
	// 		sLengthMenu: "Tampilkan _MENU_ data",
	// 		sZeroRecords: "Tidak ditemukan data yang sesuai",
	// 		sInfo: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
	// 		sInfoEmpty: "Menampilkan 0 sampai 0 dari 0 data",
	// 		sInfoFiltered: "(disaring dari _MAX_ data keseluruhan)",
	// 		sInfoPostFix: "",
	// 		sSearch: "Cari:",
	// 		sUrl: "",
	// 		oPaginate: {
	// 			sFirst: "Pertama",
	// 			sPrevious: "&lt",
	// 			sNext: "&gt",
	// 		}
	// 	},
	// });
})
