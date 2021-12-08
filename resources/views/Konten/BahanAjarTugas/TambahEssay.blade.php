<?php  for ($i=1; $i <= $jumlahsoalpg ; $i++) { ?>
<div class="row mb-5">
    <!--begin::Col-->


    <div class="col-md-12 fv-row">
        <!--begin::Label-->
        <label class="required fs-5 fw-bold mb-2">Soal {{$i}}</label>
        <!--end::Label-->
        <!--begin::Select-->
        <textarea type="text" class="form-control form-control-solid" rows="3" placeholder="Masukan Soal Nomor {{$i}}" name="soal_{{$i}}"></textarea>
        <!--end::Select-->

    </div>

</div>

<?php } ?>
