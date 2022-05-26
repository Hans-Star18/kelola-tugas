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
    console.log(e);
    const ps = new PerfectScrollbar(e, {
        wheelPropagation: true,
        suppressScrollX: true,
    });
});

const horizontalExample = document.querySelectorAll(".horizontal-example");
horizontalExample.forEach(function (e) {
    console.log(e);
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
    inputBaru = document.createElement("input");
    inputBaru.setAttribute("type", "file");
    inputBaru.setAttribute("id", "inputFile");
    inputBaru.setAttribute("class", "form-control mb-1");
    inputBaru.setAttribute("name", `media_tugas${i}`);
    $("#inputMedia").append(inputBaru);
});
