// Product
$(document).ready(function () {
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
});
