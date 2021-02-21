// Product Order
$(document).ready(function () {
    // getCount Keranjang
    let id_customer = $("#id_customer1").text();
    if (id_customer) {
        $.ajax({
            url: "/jumlah-keranjang/" + id_customer,
            type: "get",
            dataType: "json",
            success: function (response) {
                $(".jumlah-keranjang").text(response);
            },
        });
    }
    /* Fungsi formatRupiah */
    // $("#harga-barang");
    // alert(qty_order);
    $("#qty-order").change(function () {
        let harga_barang = $("#hargabarang").text();
        let qty_order = $("#qty-order").val();
        let sub_total = harga_barang * qty_order;

        let number_string = sub_total.toString();
        (split = number_string.split(",")),
            (sisa = split[0].length % 3),
            (rupiah = split[0].substr(0, sisa)),
            (ribuan = split[0].substr(sisa).match(/\d{1,3}/gi));

        if (ribuan) {
            separator = sisa ? "." : "";
            rupiah += separator + ribuan.join(".");
        }
        rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
        $("#sub-total").text(rupiah);
    });
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    function formatRupiah(harga_produk, prefix) {
        var number_string = harga_produk.toString(),
            split = number_string.split(","),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi harga_produk ribuan
        if (ribuan) {
            separator = sisa ? "." : "";
            rupiah += separator + ribuan.join(".");
        }

        rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
        return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
    }
    // tambah kerjanjang function
    $("#tambahKeranjang").click(function () {
        let id_produk = $("#id_produk").val();
        let id_customer = $("#id_customer1").text();
        let qtyorder = $("#qty-order").val();
        let _token = $('meta[name="csrf-token"]').attr("content");
        if (id_customer != null) {
            $.ajax({
                url: "/tambahkeranjang",
                type: "POST",
                data: {
                    _token: _token,
                    id_produk: id_produk,
                    id_customer: id_customer,
                    qtyorder: qtyorder,
                },
                success: function (result) {
                    if (result) {
                        Swal.fire({
                            position: "top-end",
                            icon: "success",
                            title: "Item Di Tambahkan ke Keranjang",
                            showConfirmButton: false,
                            timer: 1500,
                        }).then(function () {
                            window.location.href = "/";
                        });
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Sepertinya ada yang salah!",
                            showConfirmButton: false,
                            timer: 900,
                        });
                    }
                },
            });
        } else {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Anda Harus Login Dulu",
                showConfirmButton: false,
                timer: 900,
            });
        }
    });

    $("#pengiriman").change(function () {
        var id = $("#pengiriman").val();
        $.ajax({
            url: "/getPengiriman" + "/" + id,
            type: "get",
            success: function (result) {
                var harga_pengiriman = result.harga_pengiriman;
                $("#hrg-pengiriman").text(
                    formatRupiah(harga_pengiriman, "Rp. ")
                );
                // total order
                var harga_produk = 0;
                $(".harga-produk").each(function () {
                    harga_produk += parseFloat($(this).text());
                });
                // ppn
                var ppn = (harga_produk + harga_pengiriman) * 0.1;
                $("#ppn").text(formatRupiah(ppn, "Rp."));
                var total = harga_produk;
                $("#total-harga-keranjang").text(formatRupiah(total, "Rp."));
                // console.log(harga_produk);
                var total_banget = total + harga_pengiriman + ppn;
                $("#total").text(formatRupiah(total_banget, "Rp."));
                // pengiriman
            },
        });
    });

    // make order
    $("#makeorder").click(function () {
        // alert("Button Clicked");
        var sub_total1 = 0;
        $(".harga-produk").each(function () {
            sub_total1 += parseFloat($(this).text());
        });
        let id_pengiriman = $("#pengiriman").val();
        let id_customer = $("#id_customer1").text().replace(/\s+/g, "");
        let sub_total = sub_total1;
        let ppn = $("#ppn").text();
        let ppn_final = ppn.replace(/[^,\d]/g, "");
        let total = $("#total").text();
        let total_final = total.replace(/[^,\d]/g, "");
        let _token = $('meta[name="csrf-token"]').attr("content");
        $.ajax({
            url: "/make-order",
            type: "POST",
            data: {
                _token: _token,
                id_customer: id_customer,
                id_pengiriman: id_pengiriman,
                sub_total: sub_total,
                ppn: ppn_final,
                total: total_final,
                catatan: "Catatan",
            },
            success: function (result) {
                console.log(result);
                if (result) {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title:
                            "Order Berhasil dibuat, Tunggu sebentar anda akan di alihkan ke halaman pembayaran",
                        showConfirmButton: false,
                        timer: 2000,
                    }).then(function () {
                        window.location.href = "/";
                    });
                } else {
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Sepertinya ada yang salah!",
                        showConfirmButton: false,
                        timer: 900,
                    });
                }
            },
        });
    });
});

// del from keranjang
function deleteItem(value) {
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: "btn btn-success",
            cancelButton: "btn btn-danger",
        },
        buttonsStyling: false,
    });
    swalWithBootstrapButtons
        .fire({
            title: "Anda Yakin?",
            text: "Item yang adana Hapus tidak bisa di restore!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Ya, Saya Yakin",
            cancelButtonText: "Tidak, Batalkan!",
            reverseButtons: true,
        })
        .then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "/keranjang-delete" + "/" + value,
                    type: "get",
                    success: function () {
                        Swal.fire(
                            "Deleted!",
                            "Your file has been deleted.",
                            "success"
                        );
                        setTimeout(function () {
                            location.reload(); //Refresh page
                        }, 500);
                    },
                });
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire("Batal");
            }
        });
}
