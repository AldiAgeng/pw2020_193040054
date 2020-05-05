$(document).ready(function () {

  // JQUERY ALAT MUSIK
  $('#tombol-cari-musik').hide();

  $('#keyword-musik').on('keyup', function () {
    $('.loader').show();
    $('#tabel-musik').load('ajax/alat_musik.php?keyword=' + $('#keyword-musik').val());
  });

  // JQUERY PEMINJAMAN
  $('#tombol-cari-peminjaman').hide();

  $('#keyword-peminjaman').on('keyup', function () {
    $('.loader').show();
    $('#tabel-peminjaman').load('ajax/peminjaman.php?keyword=' + $('#keyword-peminjaman').val());
  });
});