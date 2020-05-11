$(document).ready(function () {
  $('#tombol-cari-mahasiswa').hide();
  $('#keyword-mahasiswa').on('keyup', function () {
    $('.loader').show();
    $('#tabel-mahasiswa').load('ajax/mahasiswa.php?keyword=' + $('#keyword-mahasiswa').val());
  });
});