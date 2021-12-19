$(document).ready(function () {
	$("#btn-tambah").click(function () {
		$("#tambahModal").modal("show");
	});

	$("#btn-tambah-program").click(function () {
		$("#tambahProgramModal").modal("show");
		$("#form-program")[0].reset();
	});

	$("#form-program").submit(function (e) {
		e.preventDefault();
		$.ajax({
			url: $(this).attr("action"),
			type: "post",
			data: $(this).serialize(),
			dataType: "json",
			cache: false,
			success: function (response) {
				if (response.status == "sukses") {
					Swal.fire("Sukses !", response.pesan, "success").then(function () {
						location.reload();
					});
				} else {
					Swal.fire("Gagal !", response.pesan, "error");
				}
			},
		});
	});

	$("#tabel-program").on("click", "#btn-hapus", function () {
		var id = $(this).closest("tr").find("#btn-hapus").attr("data-id");
		$("#hapusProgramModal").modal("show");
		$("#program-id").val(id);
	});

	$("#form-hapus-program").submit(function (e) {
		e.preventDefault();
		$.ajax({
			url: $(this).attr("action"),
			type: "post",
			data: $(this).serialize(),
			dataType: "json",
			cache: false,
			success: function (response) {
				if (response.status == "sukses") {
					Swal.fire("Sukses !", response.pesan, "success").then(function () {
						location.reload();
					});
				} else {
					Swal.fire("Gagal !", response.pesan, "error");
				}
			},
		});
	});

	// kegiatan
	$("#btn-tambah-kegiatan").click(function () {
		$("#addModal").modal("show");
		$("#form-kegiatan")[0].reset();
	});

	$("#form-kegiatan").submit(function (e) {
		e.preventDefault();
		$.ajax({
			url: $(this).attr("action"),
			type: "post",
			data: $(this).serialize(),
			dataType: "json",
			cache: false,
			success: function (response) {
				Swal.fire({
					title: "Menyimpan data...",
					allowEscapeKey: false,
					allowOutsideClick: false,
					timer: 2000,
					didOpen: () => {
						Swal.showLoading();
					},
				}).then(function () {
					if (response.status == "sukses") {
						Swal.fire("Sukses !", response.pesan, "success").then(function () {
							location.reload();
						});
					} else {
						Swal.fire("Gagal !", response.pesan, "error");
					}
				});
			},
		});
	});

	$("#tabel-kegiatan").on("click", "#btn-hapus", function () {
		var id = $(this).closest("tr").find("#btn-hapus").data("id");
		$("#hapusKegiatanModal").modal("show");
		$("#kegiatan-id").val(id);
	});

	$("#form-hapus-kegiatan").submit(function (e) {
		e.preventDefault();
		$.ajax({
			url: $(this).attr("action"),
			type: "post",
			data: $(this).serialize(),
			dataType: "json",
			cache: false,
			success: function (response) {
				if (response.status == "sukses") {
					Swal.fire("Sukses !", response.pesan, "success").then(function () {
						location.reload();
					});
				} else {
					Swal.fire("Gagal !", response.pesan, "error");
				}
			},
		});
	});

	// sub kegiatan
	$("#btn-tambah-subkegiatan").click(function () {
		$("#tambahSubKegiatanModal").modal("show");
		$("#form-subkegiatan")[0].reset();
	});

	$("#form-subkegiatan").submit(function (e) {
		e.preventDefault();
		$.ajax({
			url: $(this).attr("action"),
			type: "post",
			data: $(this).serialize(),
			dataType: "json",
			cache: false,
			success: function (response) {
				Swal.fire({
					title: "Menyimpan data...",
					allowEscapeKey: false,
					allowOutsideClick: false,
					timer: 2000,
					didOpen: () => {
						Swal.showLoading();
					},
				}).then(function () {
					if (response.status == "sukses") {
						Swal.fire("Sukses !", response.pesan, "success").then(function () {
							location.reload();
						});
					} else {
						Swal.fire("Gagal !", response.pesan, "error");
					}
				});
			},
		});
	});

	$("#tabel-subkegiatan").on("click", "#btn-hapus", function () {
		var id = $(this).closest("tr").find("#btn-hapus").attr("data-id");
		$("#hapusSubKegiatanModal").modal("show");
		$("#subkegiatan-id").val(id);
	});

	// pagu
	$("#btn-add-pagu").click(function () {
		$("#tambahPaguModal").modal("show");
	});

	//ajax get data kegiatan & sub kegiatan
	$("#program").change(function () {
		var id = $(this).val();
		var opt = "";
		$.ajax({
			url: "get_kegiatan",
			type: "post",
			data: {
				id: id,
			},
			dataType: "json",
			success: function (data) {
				for (var i = 0; i < data.length; i++) {
					opt =
						'<option value="' +
						data[i].id +
						'">' +
						data[i].nama_kegiatan +
						"</option>";
				}
				$("#kegiatan-list").append(opt);
			},
		});
	});

	$("#kegiatan-list").change(function () {
		var id = $(this).val();
		$.ajax({
			url: "get_subkegiatan",
			type: "post",
			data: {
				id: id,
			},
			dataType: "json",
			success: function (data) {
				var opt = "";
				opt = '<option value="">--Pilih--</option>';
				for (var i = 0; i < data.length; i++) {
					opt =
						'<option value="' +
						data[i].id +
						'">' +
						data[i].nama_subkegiatan +
						"</option>";
				}
				$("#subkegiatan").html(opt);
			},
		});
	});

	$("#subkegiatan").select2({
		dropdownParent: "#tambahPaguModal",
	});

	// satuan
	$("#addModalSatuan").on("shown.bs.modal", function () {
		$("#satuan-input").focus();
	});
	$("#form-satuan").submit(function (e) {
		e.preventDefault();
		$.ajax({
			url: $(this).attr("action"),
			type: "post",
			data: $(this).serialize(),
			dataType: "json",
			cache: false,
			success: function (response) {
				if (response.status == "sukses") {
					Swal.fire("Sukses !", response.pesan, "success").then(function () {
						$("#addModalSatuan").modal("hide");
						location.reload();
					});
				} else {
					Swal.fire("Gagal !", response.pesan, "error");
				}
			},
		});
	});

	// user
	$("#form-add-user").submit(function (e) {
		e.preventDefault();
		$.ajax({
			url: $(this).attr("action"),
			type: "post",
			data: $(this).serialize(),
			dataType: "json",
			cache: false,
			success: function (res) {
				if (res.status == "sukses") {
					Swal.fire("Sukses !", res.pesan, "success").then(function () {
						location.reload();
					});
				} else {
					Swal.fire("Gagal !", res.pesan, "error");
				}
			},
		});
	});
	$("#table-list-user").on("click", "#btn-hapus", function () {
		var id = $(this).closest("tr").find("#btn-hapus").data("id");
		$("#hapusModal").modal("show");
		$("#id-user").val(id);
	});
	$("#form-hapus-user").submit(function (e) {
		e.preventDefault();
		$.ajax({
			url: $(this).attr("action"),
			type: "post",
			data: $(this).serialize(),
			dataType: "json",
			cache: false,
			success: function (res) {
				if (res.status == "sukses") {
					Swal.fire("Sukses !", res.pesan, "success").then(function () {
						location.reload();
					});
				} else {
					Swal.fire("Gagal !", res.pesan, "error");
				}
			},
		});
	});

	// role
	$("#form-add-role").submit(function (e) {
		e.preventDefault();
		$.ajax({
			url: $(this).attr("action"),
			type: "post",
			data: $(this).serialize(),
			dataType: "json",
			cache: false,
			success: function (response) {
				if (response.status == "sukses") {
					Swal.fire("Sukses !", response.pesan, "success").then(function () {
						$("#addModalRole").modal("hide");
						location.reload();
					});
				} else {
					Swal.fire("Gagal !", response.pesan, "error");
				}
			},
		});
	});
	$("#table-role").on("click", "#btn-hapus", function () {
		var id = $(this).closest("tr").find("#btn-hapus").data("id");
		$("#hapusModal").modal("show");
		$("#role-id").val(id);
	});
	$("#table-role").on("click", "#btn-edit", function () {
		var id = $(this).closest("tr").find("#btn-edit").data("id");
		$.ajax({
			url: "get_role",
			type: "post",
			data: {
				id: id,
			},
			dataType: "json",
			cache: false,
			success: function (data) {
				$("#editModalRole").modal("show");
				$("#id-role").val(data.id);
				$("#nama_role-edit").val(data.nama_role);
			},
		});
	});
	$("#form-hapus-role").submit(function (e) {
		e.preventDefault();
		$.ajax({
			url: $(this).attr("action"),
			type: "post",
			data: $(this).serialize(),
			dataType: "json",
			cache: false,
			success: function (response) {
				if (response.status == "sukses") {
					Swal.fire("Sukses !", response.pesan, "success").then(function () {
						$("#hapusModal").modal("hide");
						location.reload();
					});
				} else {
					Swal.fire("Gagal !", response.pesan, "error");
				}
			},
		});
	});
	$("#role").select2({
		dropdownParent: $("#addModalUser"),
		placeholder: "Pilih role user",
	});

	// sektor
	$("#table-sektor").on("click", "#btn-hapus", function () {
		let id = $(this).closest("tr").find("#btn-hapus").data("id");
		$("#hapusModalSektor").modal("show");
		$("#sektor-id").val(id);
	});
	$("#table-sektor").on("click", "#btn-edit", function () {
		let id = $(this).closest("tr").find("#btn-edit").data("id");
		let nama = $(this).closest("tr").find("#btn-edit").data("nama");
		$("#editModalSektor").modal("show");
		$("#id-sektor-edit").val(id);
		$("#nama-sektor-edit").val(nama);
	});
	$("#form-add-sektor").submit(function (e) {
		e.preventDefault();
		$.ajax({
			url: $(this).attr("action"),
			type: "post",
			data: $(this).serialize(),
			dataType: "json",
			cache: false,
			success: function (res) {
				if (res.status == "sukses") {
					Swal.fire("Sukses !", res.pesan, "success").then(function () {
						location.reload();
					});
				} else if (res.status == "error") {
					Swal.fire("Peringatan !", res.pesan, "warning");
				} else {
					Swal.fire("Gagal !", res.pesan, "error");
				}
			},
		});
	});
	$("#table-sektor").on("click", "#btn-hapus", function (e) {
		let id = $(this).closest("tr").find("#btn-hapus").data("id");
		$("#hapusModalSektor").modal("show");
		$("#sektor-id").val(id);
	});
	$("#form-hapus-sektor").submit(function (e) {
		e.preventDefault();
		$.ajax({
			url: "delete_sektor",
			type: "post",
			data: $(this).serialize(),
			dataType: "json",
			cache: false,
			success: function (res) {
				if (res.status == "sukses") {
					Swal.fire("Sukses !", res.pesan, "success").then(function () {
						location.reload();
					});
				} else {
					Swal.fire("Error !", res.pesan, "error");
				}
			},
		});
	});

	// Divisi
	$("#sektor-divisi").select2({
		dropdownParent: $("#addModalDivisi"),
		placeholder: "Pilih...",
	});
	$("#form-add-divisi").submit(function (e) {
		e.preventDefault();
		$.ajax({
			url: $(this).attr("action"),
			type: "post",
			data: $(this).serialize(),
			dataType: "json",
			cache: false,
			success: function (res) {
				if (res.status == "sukses") {
					Swal.fire("Sukses !", res.pesan, "success").then(function () {
						location.reload();
					});
				} else if (res.status == "error") {
					Swal.fire("Peringatan !", res.pesan, "warning");
				} else {
					Swal.fire("Gagal !", res.pesan, "error");
				}
			},
		});
	});

	// pagu
	$("#subkegiatan").change(function (e) {
		e.preventDefault();
		var id = $(this).val();
		$.ajax({
			url: "get_data_detil",
			type: "post",
			data: {
				id: id,
			},
			dataType: "json",
			cache: false,
			success: function (data) {
				$("#program").val(data.nm_p);
				$("#kegiatan").val(data.nm_k);
			},
		});
	});
	$("#form-pagu").submit(function (e) {
		e.preventDefault();
		var tipe = $("#tipe").val();
		if (tipe == "update") {
			$.ajax({
				url: "update_pagu",
				type: "post",
				data: $(this).serialize(),
				dataType: "json",
				cache: false,
				success: function (response) {
					Swal.fire({
						title: "Memperbaharui data...",
						allowEscapeKey: false,
						allowOutsideClick: false,
						timer: 2000,
						didOpen: () => {
							Swal.showLoading();
						},
					}).then(function () {
						if (response.status == "sukses") {
							Swal.fire("Sukses !", response.pesan, "success").then(
								function () {
									location.reload();
								}
							);
						} else {
							Swal.fire("Gagal !", response.pesan, "error");
						}
					});
				},
			});
		} else {
			$.ajax({
				url: $(this).attr("action"),
				type: "post",
				data: $(this).serialize(),
				dataType: "json",
				cache: false,
				success: function (response) {
					Swal.fire({
						title: "Menyimpan data...",
						allowEscapeKey: false,
						allowOutsideClick: false,
						timer: 2000,
						didOpen: () => {
							Swal.showLoading();
						},
					}).then(function () {
						if (response.status == "sukses") {
							Swal.fire("Sukses !", response.pesan, "success").then(
								function () {
									location.reload();
								}
							);
						} else {
							Swal.fire("Gagal !", response.pesan, "error");
						}
					});
				},
			});
		}
	});
	$("#satuan").select2({
		dropdownParent: "#tambahPaguModal",
	});
	$("#pagu, #nilai-kontrak").mask("000.000.000.000.000", {
		reverse: true,
	});
	$("#tabel-pagu").on("click", "#btn-edit", function () {
		var id = $(this).closest("tr").find("#btn-edit").data("id");
		$.ajax({
			url: "edit_pagu",
			type: "post",
			data: {
				id: id,
			},
			dataType: "json",
			success: function (data) {
				$("#tambahPaguModal").modal("show");
				$("#modalPaguTitle").html("Update Data");
				$("#btn-submit-pagu").html("Update");
				$("#tipe").val("update");
				$("#id-pagu").val(data.id);
				$("#pekerjaan").val(data.uraian);
				$("#lokasi").val(data.lokasi);
				$("#volume").val(data.volume);
				$("#pagu").val(data.pagu);
				$("#jenis").val(data.jenis);
			},
		});
	});
	$("#tabel-pagu").on("click", "#btn-hapus", function () {
		var id = $(this).closest("tr").find("#btn-hapus").data("id");
		$("#hapusPaguModal").modal("show");
		$("#id-pagu-delete").val(id);
	});
	$("#form-delete-pagu").submit(function (e) {
		e.preventDefault();
		$.ajax({
			url: "delete_pagu",
			type: "post",
			data: $(this).serialize(),
			dataType: "json",
			success: function (res) {
				if (res.status == "sukses") {
					Swal.fire("Sukses !", res.pesan, "success").then(() => {
						location.reload();
					});
				} else {
					Swal.fire("Gagal !", res.pesan, "error");
				}
			},
		});
	});

	// kontrak
	$("#btn-add-kontrak").click(function () {
		$("#addKontrakModal").modal("show");
	});
	$("#addKontrakModal").on("hidden.bs.modal", function () {
		$("#form-kontrak")[0].reset();
	});
	$("#uraian-kontrak").select2({
		dropdownParent: $("#addKontrakModal"),
	});
	$("#uraian-kontrak").change(function (e) {
		var id = $(this).val();
		e.preventDefault();
		$.ajax({
			url: "get_pagu_data",
			type: "post",
			data: {
				id: id,
			},
			dataType: "json",
			beforeSend: function () {
				Swal.fire({
					title: "Mohon Menunggu!",
					html: "Sedang memuat data...",
					timer: 2000,
					timerProgressBar: true,
					didOpen: function () {
						Swal.showLoading();
					},
				});
			},
			success: function (data) {
				$("#program-kontrak").val(data.program);
				$("#kegiatan-kontrak").val(data.kegiatan);
				$("#subkegiatan-kontrak").val(data.sub);
				$("#pagu-kontrak")
					.val(formatRupiah(data.pagu))
					.attr("readonly", "readonly");
				$("#nilai-kontrak").on("change keyup", function () {
					var n = $("#nilai-kontrak").cleanVal();
					var p = $("#pagu-kontrak").val().split(".").join("");
					var sisa = p - n;
					$("#sisa-kontrak").val(sisa).trigger("input");
				});
				$("#sisa-kontrak")
					.mask("000.000.000.000.000", {
						reverse: true,
					})
					.attr("readonly", "readonly");
			},
		});
	});
	$("#form-kontrak").submit(function (e) {
		e.preventDefault();
		$.ajax({
			url: "store_kontrak",
			type: "post",
			data: $(this).serialize(),
			dataType: "json",
			cache: false,
			success: function (response) {
				Swal.fire({
					title: "Menyimpan data...",
					allowEscapeKey: false,
					allowOutsideClick: false,
					timer: 2000,
					didOpen: () => {
						Swal.showLoading();
					},
				}).then(function () {
					if (response.status == "sukses") {
						Swal.fire("Sukses !", response.pesan, "success").then(function () {
							location.reload();
						});
					} else {
						Swal.fire("Gagal !", response.pesan, "error");
					}
				});
			},
		});
	});
	$("#table-kontrak").on("click", "#btn-hapus", function () {
		var id = $(this).closest("tr").find("#btn-hapus").data("id");
		$("#hapusKontrakModal").modal("show");
		$("#id-kontrak").val(id);
	});
	$("#table-kontrak").on("click", "#btn-edit", function () {
		var id = $(this).closest("tr").find("#btn-edit").data("pagu");
		$("#editKontrakModal").modal("show");
		// $('#pagu-kontrak option[value="' + id + '"]').attr('selected', 'selected');
		$("#pilihan-edit-kontrak").val(id).trigger("change");
	});
	$("#pilihan-edit-kontrak").change(function (e) {
		var id = $(this).val();
		e.preventDefault();
		$.ajax({
			url: "get_pagu_data",
			type: "post",
			data: {
				id: id,
			},
			dataType: "json",
			success: function (data) {
				$("#program-edit-kontrak").val(data.program);
				$("#kegiatan-edit-kontrak").val(data.kegiatan);
				$("#subkegiatan-edit-kontrak").val(data.sub);
				$("#pagu-edit-kontrak")
					.val(formatRupiah(data.pagu))
					.attr("readonly", "readonly");
				$("#nilai-edit-kontrak").val(formatRupiah(data.nilai));
				$("#sisa-edit-kontrak").val(
					$("#pagu-edit-kontrak").val().split(".").join("") -
						$("#nilai-edit-kontrak").val().split(".").join("")
				);
				$("#nilai-edit-kontrak").on("change keyup", function () {
					var n = $("#nilai-edit-kontrak").val().split(".").join("");
					var p = $("#pagu-edit-kontrak").val().split(".").join("");
					var sisa = p - n;
					$("#sisa-edit-kontrak")
						.val(formatRupiah(sisa.toString()))
						.trigger("input");
				});
			},
		});
	});
	$("#form-hapus-kontrak").submit(function (e) {
		e.preventDefault();
		$.ajax({
			url: "destroy_kontrak",
			type: "post",
			data: $(this).serialize(),
			dataType: "json",
			success: function (res) {
				if (res.status == "sukses") {
					$("#hapusKontrakModal").modal("hide");
					Swal.fire("Sukses !", res.pesan, "success").then(() => {
						location.reload();
					});
				} else {
					Swal.fire("Gagal !", res.pesan, "error");
				}
			},
		});
	});

	// realisasi
	$("#pekerjaan-realisasi, #bulan-realisasi").select2();
	$("#btn-add-realisasi").click(function () {
		$("#addRealisasiModal").modal("show");
	});
	$("#uraian-realisasi").select2({
		dropdownParent: $("#addRealisasiModal"),
	});
	$("#uraian-realisasi").change(function (e) {
		e.preventDefault();
		var id = $(this).val();
		$.ajax({
			url: "ambil_kontrak",
			type: "post",
			data: {
				id: id,
			},
			dataType: "json",
			success: function (data) {
				$("#nilai-kontrak").val(data.kontrak);
				$("#nilai-pagu").val(data.pagu);
			},
		});
	});
	$("#progress").on("change keyup", function () {
		var kontrak = $("#nilai-kontrak").val();
		var pagu = $("#nilai-pagu").val();
		var uang = $("#progress").cleanVal();
		var sen = (uang / kontrak) * 100;
		var sen2 = (uang / pagu) * 100;
		$("#persentase").val(sen.toFixed(2).replace(".", ","));
		$("#persentase2").val(sen2.toFixed(2).replace(".", ","));
	});
	$("#form-realisasi").submit(function (e) {
		e.preventDefault();
		$.ajax({
			url: "store_keuangan",
			type: "post",
			data: new FormData(this),
			dataType: "json",
			processData: false,
			contentType: false,
			async: false,
			cache: false,
			success: function (res) {
				if (res.status == "sukses") {
					Swal.fire("Sukses !", res.pesan, "success").then(() => {
						location.reload();
					});
				} else if (res.status == "error" || res.status == "upload") {
					Swal.fire("Peringatan !", res.pesan, "warning");
				} else {
					Swal.fire("Gagal !", res.pesan, "error");
				}
			},
		});
	});

	// fisik
	$("#btn-add-fisik").click(function () {
		$("#addfisikModal").modal("show");
	});
	$("#addfisikModal").on("shown.bs.modal", function () {
		$("#pekerjaan").select2({
			dropdownParent: $(this),
		});
	});

	// seksi
	$("#divisi").select2({
		dropdownParent: $("#addModalSeksi"),
		placeholder: "Pilih divisi...",
	});

	$("#form-add-seksi").submit(function (e) {
		e.preventDefault();
		$.ajax({
			url: "add_seksi",
			type: "post",
			data: $(this).serialize(),
			dataType: "json",
			cache: false,
			success: function (res) {
				if (res.status == "sukses") {
					Swal.fire("Sukses !", res.pesan, "success").then(function () {
						location.reload();
					});
				} else {
					Swal.fire("Gagal !", res.pesan, "error");
				}
			},
		});
	});

	// penugasan
	$("#pekerjaan-tugas, #konsultan-tugas").select2({
		dropdownParent: $("#addModalPenugasan"),
	});
	$("#form-add-penugasan").submit(function (e) {
		e.preventDefault();
		$.ajax({
			url: $(this).attr("action"),
			type: "post",
			data: $(this).serialize(),
			dataType: "json",
			cache: false,
			success: function (res) {
				if (res.status == "sukses") {
					Swal.fire("Sukses !", res.pesan, "success").then(function () {
						location.reload();
					});
				} else {
					Swal.fire("Gagal !", res.pesan, "error");
				}
			},
		});
	});
	$("#table-penugasan").on("click", "#btn-hapus", function () {
		let id = $(this).closest("tr").find("#btn-hapus").data("id");
		$("#hapusModalpenugasan").modal("show");
		$("#id-hapus-tugas").val(id);
	});
	$("#form-hapus-penugasan").submit(function (e) {
		e.preventDefault();
		$.ajax({
			url: "hapus_penugasan",
			type: "post",
			data: $(this).serialize(),
			dataType: "json",
			success: function (res) {
				if (res.status == "sukses") {
					Swal.fire("Sukses !", res.pesan, "success").then(() => {
						location.reload();
					});
				} else {
					Swal.fire("Gagal !", res.pesan, "error");
				}
			},
		});
	});
	$("#table-realisasi").on("click", "#btn-hapus-realisasi", function () {
		var id = $(this).closest("tr").find("#btn-hapus-realisasi").data("id");
		var file = $(this).closest("tr").find("#btn-hapus-realisasi").data("file");
		$("#delRealisasiModal").modal("show");
		$("#id-del-realisasi").val(id);
		$("#file-realisasi").val(file);
	});
	$("#form-hapus-realisasi").submit(function (e) {
		e.preventDefault();
		$.ajax({
			url: "destroy_realisasi",
			type: "post",
			data: $(this).serialize(),
			dataType: "json",
			success: function (res) {
				if (res.status == "sukses") {
					$("#delRealisasiModal").modal("hide");
					Swal.fire("Sukses !", res.pesan, "success").then(() => {
						location.reload();
					});
				} else {
					Swal.fire("Gagal !", res.pesan, "error");
				}
			},
		});
	});

	// validasi
	$("#table-validate").on("click", "#btn-validate", function () {
		var id = $(this).closest("tr").find("#btn-validate").data("id");
		$("#validateModal").modal("show");
		$("#id-progres").val(id);
	});
	$("#validateModal").on("shown.bs.modal", function () {
		$("#form-validate")[0].reset();
	});
	$("#form-validate").submit(function (e) {
		e.preventDefault();
		$.ajax({
			url: $(this).attr("action"),
			type: "POST",
			data: $(this).serialize(),
			dataType: "json",
			success: function (res) {
				if (res.status == "sukses") {
					Swal.fire("Sukses !", res.pesan, "success").then(() => {
						location.reload();
					});
				} else {
					Swal.fire("Gagal !", res.pesan, "error");
				}
			},
		});
	});

	// datatables
	$("#tabel-program").DataTable({
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
			},
		},
	});
	$("#tabel-kegiatan").DataTable({
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
			},
		},
	});
	$("#tabel-subkegiatan").DataTable({
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
			},
		},
	});
	$("#tabel-pagu").DataTable({
		order: [],
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
			},
		},
	});
	$("#table-kontrak").DataTable({
		// order: [],
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
			},
		},
	});
	$("#table-role").DataTable({
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
			},
		},
	});
	$("#table-list-user").DataTable({
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
			},
		},
	});
	$("#table-sektor").DataTable({
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
			},
		},
	});
	$("#table-divisi").DataTable({
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
			},
		},
	});
	$("#table-seksi").DataTable({
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
			},
		},
	});
	$("#table-realisasi").DataTable({
		// order: [
		// 	[4, "desc"]
		// ],
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
			},
		},
	});
	$("#table-konwas").DataTable({
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
			},
		},
	});
	$("#table-validate").DataTable({
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
			},
		},
	});

	// tooltip
	$("body").tooltip({
		selector: '[data-toggle="tooltip"]',
	});

	/* graph */
	Highcharts.chart("chart", {
		title: {
			text: "Realisasi Fisik dan Keuangan Dana Otsus Aceh Kabupaten Aceh Barat",
		},
		subtitle: {
			text: "Sumber: Dinas PUPR Kab. Aceh Barat",
		},
		yAxis: {
			title: {
				text: "% Realisasi",
			},
		},
		xAxis: {
			categories: [
				"Jan",
				"Feb",
				"Mar",
				"Apr",
				"May",
				"Jun",
				"Jul",
				"Aug",
				"Sep",
				"Oct",
				"Nov",
				"Dec",
			],
		},
		legend: {
			layout: "vertical",
			align: "right",
			verticalAlign: "middle",
		},
		plotOptions: {
			line: {
				dataLabels: {
					enabled: true,
				},
				enableMouseTracking: true,
			},
		},
		series: [
			{
				name: "Jembatan",
				data: [
					7.0, 6.9, 9.5, 14.5, 18.4, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6,
				],
			},
			{
				name: "Jalan",
				data: [
					3.9, 4.2, 8.7, 8.5, 11.9, 23.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8,
				],
			},
		],
	});

	/**
	 *
	 * @param {*} angka
	 * @returns
	 */
	// Format Rupiah
	function formatRupiah(angka) {
		var number_string = angka.replace(/[^,\d]/g, "").toString(),
			split = number_string.split(","),
			sisa = split[0].length % 3,
			rupiah = split[0].substr(0, sisa),
			ribuan = split[0].substr(sisa).match(/\d{3}/gi);
		// tambahkan titik jika yang di input sudah menjadi angka ribuan
		if (ribuan) {
			separator = sisa ? "." : "";
			rupiah += separator + ribuan.join(".");
		}
		return (rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah);
	}
});
