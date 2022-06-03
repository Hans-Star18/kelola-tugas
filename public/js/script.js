new Swiper(".card-slider", {
    speed: 600,
    loop: true,
    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
    },
    slidesPerView: "auto",
    pagination: {
        el: ".swiper-pagination",
        type: "bullets",
        clickable: true,
    },
});

const verticalExample = document.querySelectorAll(".vertical-example");
verticalExample.forEach(function (e) {
    const ps = new PerfectScrollbar(e, {
        wheelPropagation: true,
        suppressScrollX: true,
    });
});

const horizontalExample = document.querySelectorAll(".horizontal-example");
horizontalExample.forEach(function (e) {
    const ps = new PerfectScrollbar(e, {
        wheelPropagation: true,
        suppressScrollY: true,
    });
});

$(".tombol-kumpulkan").on("click", function () {
    $("#id_task").val($(this).data("id"));
});

$(".tombol-multiple").on("click", function () {
    let i = Math.ceil(Math.random() * 1000);
    let inputBaru = document.createElement("input");
    inputBaru.setAttribute("type", "file");
    inputBaru.setAttribute("id", "inputFile");
    inputBaru.setAttribute("class", "form-control mb-1");
    inputBaru.setAttribute("name", `media_tugas${i}`);
    $(inputBaru).appendTo(".form-input-media");
});

$(".tombol-hapus").on("click", function () {
    let id = $(this).data("id");
    $(".delete-button").attr("action", `/tugas/${id}`);
    $(".konfirmasi").html(
        "Klik <strong>Hapus</strong> untuk menghapus tugas <i>" +
            $(this).data("konfirmasi") +
            "</i>"
    );
});

$(function () {
    $(".edit-button").on("click", function () {
        const id = $(this).data("id");
        $(".modal-body form").attr("action", `/tugas/${id}`);

        $.ajax({
            url: `/tugas/get_data_tugas`,
            data: { id },
            method: "get",
            dataType: "json",
            success: function (data) {
                let i = Math.ceil(Math.random() * 1000);
                let deadline = data.deadline_at.replace(" ", "T");
                $("#create").val(data.tanggal_dibuat);
                $("#update").val(data.tanggal_dikumpul);
                $("#deadline").val(deadline);
                $("#judulTugas").val(data.judul_tugas);
                $("#deskripsiTugas").val(data.deskripsi_tugas);
                $("." + data.mata_pelajaran).attr("selected", true);
                if (data.media_tugas) {
                    let mediaTugas = data.media_tugas.split(",");
                    let gambar_lama = [];
                    let gambar_dihapus = [];
                    mediaTugas.forEach(function (e) {
                        e = e.replace("[", "").replace("]", "");
                        e = e.replace('"', "");
                        e = e.replace('"', "");
                        gambar_lama.push(e);
                        // Membuat elemen wadah
                        let group = document.createElement("div");
                        group.setAttribute("class", "input-group");
                        group.setAttribute("class", "input-group");
                        // Membuat elemen input
                        let previewFile = document.createElement("input");
                        previewFile.setAttribute("type", "text");
                        previewFile.setAttribute("id", "file");
                        previewFile.setAttribute("class", "form-control mb-1");
                        previewFile.setAttribute("readonly", true);
                        previewFile.setAttribute("value", e);
                        // Membuat tombol Preview
                        let tombolPreview = document.createElement("a");
                        let extensi = e.split(".");
                        extensi = extensi[1].replace('"', "");
                        if (extensi == "pdf") {
                            tombolPreview.setAttribute(
                                "href",
                                `/tugas/${data.id}?content_type=application/pdf&media=${e}`
                            );
                        } else if (extensi == "png") {
                            tombolPreview.setAttribute(
                                "href",
                                `/tugas/${data.id}?content_type=image/png&media=${e}`
                            );
                        } else {
                            tombolPreview.setAttribute(
                                "href",
                                `/tugas/${data.id}?content_type=image/jpeg&media=${e}`
                            );
                        }

                        tombolPreview.setAttribute("class", "btn btn-link");
                        tombolPreview.textContent = "Preview";
                        // Membuat tombol Hapus
                        let tombolHapus = document.createElement("a");
                        tombolHapus.setAttribute("class", "btn btn-link");
                        tombolHapus.textContent = "Hapus";
                        // Menambahkan elemen ke wadah
                        group.append(previewFile);
                        group.append(tombolPreview);
                        group.append(tombolHapus);
                        $(".form-media-lama").append(group);
                        // jika tombol hapus di klik
                        tombolHapus.onclick = function () {
                            let i = Math.ceil(Math.random() * 10);
                            group.setAttribute("id", `hapus${i}`);
                            gambar_lama.splice(
                                gambar_lama.indexOf(group.children[0].value),
                                1
                            );
                            gambar_dihapus.push(group.children[0].value);
                            console.log(gambar_dihapus);
                            console.log(gambar_lama);
                            group.remove("#hapus" + i);
                            $("#gambar_lama").val(gambar_lama);
                            $("#gambar_dihapus").val(gambar_dihapus);
                        };
                    });
                    $("#gambar_lama").val(gambar_lama);
                }
            },
        });
    });
});
