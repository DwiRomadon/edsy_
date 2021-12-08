/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";

$(document).ready(function($){
    $('body').on('click', '.tpengetahuan', function () {
        var id = $(this).data('id');

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:"POST",
            url: "cekmapelkomponen",
            data: { id: id },
            dataType: 'json',
            success: function(response){
                $('#typekomponen').html(response[1].type);
                $('#typekomponen2').html(response[1].type);
                $('#totalpresentase').html(response[2].totalbobot);
                $('#sisapresentase').html(100 - response[2].totalbobot);
                $('#inputpengetahuan').modal('show');
              //  console.log(response)

                if (response[2].totalbobot >= 100){

                    Swal.fire({
                        type: 'warning',
                        title: 'Oops...',
                        text: 'Jumlah Presentase Komponen Sudah Melebihi 100%',

                    }).then (function() {
                        $('#inputpengetahuan').modal('hide');
                    });
                }else {

                    $('#kpmapel').val(response[0].Namamapel);
                    $('#kpkelompokkelas').val(response[0].KelompokKelas +" "+ response[0].Jurusan +" "+ response[0].NamaKelompokKelas);
                    $('#kptasemester').val(response[0].Tahun +" "+ response[0].Semester);
                    $('#paramsnya').val(response[0].NIP+">"+response[0].idMapel+">"+response[0].Tahun+">"+response[0].Semester+">"+response[0].idkelompokkls+">"+response[1].type);

                    $('#sisabobot').val(100 - response[2].totalbobot);
                }

            },
            error:function(response){

                Swal.fire({
                    type: 'error',
                    title: 'Oops...',
                    text: 'Gagal Terhubung!',

                });

                console.log(response);
            }
        });
    });


    $('body').on('click', '.tpketerampilan', function () {
        var id = $(this).data('id');

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:"POST",
            url: "cekmapelkomponen",
            data: { id: id },
            dataType: 'json',
            success: function(response){
                $('#typekomponen').html(response[1].type);
                $('#typekomponen2').html(response[1].type);
                $('#totalpresentase').html(response[2].totalbobot);
                $('#sisapresentase').html(100 - response[2].totalbobot);
                $('#inputpengetahuan').modal('show');
                //console.log(response)

                if (response[2].totalbobot >= 100){

                    Swal.fire({
                        type: 'warning',
                        title: 'Oops...',
                        text: 'Jumlah Presentase Komponen Sudah Melebihi 100%',

                    }).then (function() {
                        $('#inputpengetahuan').modal('hide');
                    });
                }else {

                    $('#kpmapel').val(response[0].Namamapel);
                    $('#kpkelompokkelas').val(response[0].KelompokKelas + " " + response[0].Jurusan + " " + response[0].NamaKelompokKelas);
                    $('#kptasemester').val(response[0].Tahun + " " + response[0].Semester);
                    $('#paramsnya').val(response[0].NIP + ">" + response[0].idMapel + ">" + response[0].Tahun + ">" + response[0].Semester + ">" + response[0].idkelompokkls + ">" + response[1].type);

                    $('#sisabobot').val(100 - response[2].totalbobot);
                }
            },
            error:function(response){

                Swal.fire({
                    type: 'error',
                    title: 'Oops...',
                    text: 'Gagal Terhubung!',

                });

                console.log(response);
            }
        });
    });

    $('body').on('click', '#simpankp', function () {

        var paramsnya = $("#paramsnya").val();
        var bobot = $("#bobot").val();
        var namakomponen = $("#namakomponen").val();

        var sisabobot = $("#sisabobot").val();

        $('#simpankp').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Loading...');


        if (namakomponen == '' || bobot == ''){

            Swal.fire({
                type: 'warning',
                title: 'Oops...',
                text: 'Mohon Isi Bobot dan Nama Komponen !',

            });

            $('#simpankp').html('Coba Lagi');

        }else {

            if (Number(bobot) > Number(sisabobot)) {

                Swal.fire({
                    type: 'warning',
                    title: 'Oops...',
                    text: 'Jumlah Bobot Presentase yang Anda Masukan Melebihi Kapasitas Presentase !',

                });

               // console.log(Number(bobot) > Number(sisabobot))

                $('#simpankp').html('Coba Lagi');

            } else {


                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "POST",
                    url: "simpankomponen",
                    data: {
                        paramsnya: paramsnya,
                        bobot: bobot,
                        namakomponen: namakomponen
                    },
                    // dataType: 'json',
                    success: function (response) {

                        if (response == "success") {


                            $('#simpankp').html('Simpan');

                            $("#bobot").val('');
                            $("#namakomponen").val('');

                            Swal.fire({
                                type: 'success',
                                title: 'Berhasil!',
                                text: 'Data komponen berhasil disimpan',

                            });

                            $('#inputpengetahuan').modal('hide');

                        } else {
                            Swal.fire({
                                type: 'error',
                                title: 'Oops...',
                                text: 'Gagal Tersimpan!',

                            });

                            $('#simpankp').html('Coba Lagi');

                        }

                    },
                    error: function (response) {

                        Swal.fire({
                            type: 'error',
                            title: 'Oops...',
                            text: 'Gagal Terhubung!',

                        });
                        $('#simpankp').html('Coba Lagi');
                        console.log(response);
                    }
                });

            }

        }

    });


    $('body').on('click', '.editpengetahuan', function () {

        var id = $(this).data('id');

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:"POST",
            url: "/manajemennilai/cekeditkomponen",
            data: { id: id },
            dataType: 'json',
            success: function(response){

                $('#editKomponen').modal('show');
               //   console.log(response)
                $('#idkp').val(response[0].id);

                $('#titleeditkomponen').html(response[1].type);
                $('#editbobot').val(response[0].bobot);
                $('#editnamakomponen').val(response[0].nama_komponen);
                $('#totalpresentase2').html(response[2].totalbobot);

                var totalbobot = response[2].totalbobot
                var bobotyangdipilih = response[0].bobot

                var xsum = totalbobot - bobotyangdipilih

                $('#nilaiawalkp').val(xsum);
                // jika bobot baru ditambah xsum hasilnya melebihi 100 maka tidak bisa update

            },
            error:function(response){

                Swal.fire({
                    type: 'error',
                    title: 'Oops...',
                    text: 'Gagal Terhubung!',

                });

                console.log(response);
            }
        });
    });

    $('body').on('click', '.editketerampilan', function () {

        var id = $(this).data('id');

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:"POST",
            url: "/manajemennilai/cekeditkomponen",
            data: { id: id },
            dataType: 'json',
            success: function(response){

                $('#editKomponen').modal('show');
                //   console.log(response)
                $('#idkp').val(response[0].id);

                $('#titleeditkomponen').html(response[1].type);
                $('#editbobot').val(response[0].bobot);
                $('#editnamakomponen').val(response[0].nama_komponen);
                $('#totalpresentase2').html(response[2].totalbobot);

                var totalbobot = response[2].totalbobot
                var bobotyangdipilih = response[0].bobot

                var xsum = totalbobot - bobotyangdipilih

                $('#nilaiawalkp').val(xsum);
                // jika bobot baru ditambah xsum hasilnya melebihi 100 maka tidak bisa update

            },
            error:function(response){

                Swal.fire({
                    type: 'error',
                    title: 'Oops...',
                    text: 'Gagal Terhubung!',

                });

                console.log(response);
            }
        });
    });


    $('body').on('click', '#simpanubahkp', function () {

        var nilaiawal = $("#nilaiawalkp").val();
        var editbobot = $("#editbobot").val();
        var editnamakomponen = $("#editnamakomponen").val();

        var idkp = $("#idkp").val();



        $('#simpanubahkp').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Loading...');


        if (editbobot == '' || editnamakomponen == ''){

            Swal.fire({
                type: 'warning',
                title: 'Oops...',
                text: 'Mohon Isi Bobot dan Nama Komponen !',

            });

            $('#simpanubahkp').html('Coba Lagi');

        }else {

            if ((Number(nilaiawal) + Number(editbobot)) > 100) {

                Swal.fire({
                    type: 'warning',
                    title: 'Oops...',
                    text: 'Jumlah Bobot Presentase yang Anda Masukan Melebihi Kapasitas Presentase !',

                });

                // console.log(Number(bobot) > Number(sisabobot))

                $('#simpanubahkp').html('Coba Lagi');

            } else {

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "PUT",
                    url: "/manajemennilai/simpanubah/"+idkp,
                    data: {
                        editbobot: editbobot,
                        editnamakomponen: editnamakomponen
                    },
                    // dataType: 'json',
                    success: function (response) {

                        if (response == "success") {


                            $('#simpanubahkp').html('Simpan');
                            $('#editKomponen').modal('hide');

                            Swal.fire({
                                type: 'success',
                                title: 'Berhasil!',
                                text: 'Data komponen berhasil disimpan',

                            }).then (function() {
                                window.location.reload();

                            });


                        } else {
                            Swal.fire({
                                type: 'error',
                                title: 'Oops...',
                                text: 'Gagal Tersimpan!',

                            });

                            $('#simpanubahkp').html('Coba Lagi');

                        }

                    },
                    error: function (response) {

                        Swal.fire({
                            type: 'error',
                            title: 'Oops...',
                            text: 'Gagal Terhubung!',

                        });
                        $('#simpanubahkp').html('Coba Lagi');
                        console.log(response);
                    }
                });

            }

        }

    });


})

