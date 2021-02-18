// Product Order
$(document).ready(function () {
    // getCount Keranjang
    let id_customer = $("#id_customer").text();
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
    // tambah kerjanjang function
    $("#tambahKeranjang").click(function () {
        let id_produk = $("#id_produk").val();
        let id_customer = $("#id_customer").val();
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
});
