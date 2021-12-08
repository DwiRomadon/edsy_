
<?php  for ($i=1; $i <= $jumlahsoalpg ; $i++) { ?>
<div class="row mb-5">
    <!--begin::Col-->


    <div class="col-md-12 fv-row">
        <!--begin::Label-->
        <label class="required fs-5 fw-bold mb-2">Soal {{$i}}</label>
        <!--end::Label-->
        <!--begin::Select-->
        <textarea type="text" class="form-control form-control-solid" placeholder="Masukan Soal Nomor {{$i}}" name="soal_{{$i}}"></textarea>
        <!--end::Select-->
    </div>

</div>

<div class="row mb-5">
    <!--begin::Col-->
    <div class="col-md-6 fv-row">
        <div class="position-relative d-flex align-items-center">
            <!--begin::Icon-->
            <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
            <span class="svg-icon svg-icon-2 position-absolute mx-4"><b>A.</b></span>
            <!--end::Svg Icon-->
            <!--end::Icon-->
            <!--begin::Datepicker-->
            <input class="form-control form-control-solid ps-12" placeholder="Pilihan A" name="jwb_{{$i}}_a" />
            <!--end::Datepicker-->
        </div>
    </div>
    <!--end::Col-->
    <!--begin::Col-->
    <div class="col-md-6 fv-row">
        <div class="position-relative d-flex align-items-center">
            <!--begin::Icon-->
            <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
            <span class="svg-icon svg-icon-2 position-absolute mx-4"><b>B</b></span>
            <!--end::Svg Icon-->
            <!--end::Icon-->
            <!--begin::Datepicker-->
            <input class="form-control form-control-solid ps-12" placeholder="Pilihan B" name="jwb_{{$i}}_b" />
            <!--end::Datepicker-->
        </div>
    </div>
    <!--end::Col-->
</div>
<div class="row mb-5">
    <!--begin::Col-->
    <div class="col-md-6 fv-row">
        <div class="position-relative d-flex align-items-center">
            <!--begin::Icon-->
            <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
            <span class="svg-icon svg-icon-2 position-absolute mx-4"><b>C</b></span>
            <!--end::Svg Icon-->
            <!--end::Icon-->
            <!--begin::Datepicker-->
            <input class="form-control form-control-solid ps-12" placeholder="Pilihan C" name="jwb_{{$i}}_c" />
            <!--end::Datepicker-->
        </div>
    </div>
    <!--end::Col-->
    <!--begin::Col-->
    <div class="col-md-6 fv-row">
        <div class="position-relative d-flex align-items-center">
            <!--begin::Icon-->
            <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
            <span class="svg-icon svg-icon-2 position-absolute mx-4"><b>D</b></span>
            <!--end::Svg Icon-->
            <!--end::Icon-->
            <!--begin::Datepicker-->
            <input class="form-control form-control-solid ps-12" placeholder="Pilihan D" name="jwb_{{$i}}_d" />
            <!--end::Datepicker-->
        </div>
    </div>
    <!--end::Col-->
</div>
<div class="row mb-5">
    <!--begin::Col-->
    <div class="col-md-6 fv-row">
        <div class="position-relative d-flex align-items-center">
            <!--begin::Icon-->
            <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
            <span class="svg-icon svg-icon-2 position-absolute mx-4"><b>E</b></span>
            <!--end::Svg Icon-->
            <!--end::Icon-->
            <!--begin::Datepicker-->
            <input class="form-control form-control-solid ps-12" placeholder="Pilihan E" name="jwb_{{$i}}_e" />
            <!--end::Datepicker-->
        </div>
    </div>
    <!--end::Col-->
    <!--begin::Col-->
    <div class="col-md-6 fv-row">
        <div class="position-relative d-flex align-items-center">
            <!--begin::Icon-->
            <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
            <span class="svg-icon svg-icon-2 position-absolute mx-4"><i class="fas fa-key"></i></span>
             <input class="form-control form-control-solid ps-12" placeholder="Masukan Kunci Jawaban Ex: A " name="kunci_{{$i}}" />
        </div>
    </div>
    <!--end::Col-->
</div>

<?php } ?>


<div class="row mb-5">
    <!--begin::Col-->


    <div class="col-md-12 fv-row">
        <div class="form-group">

            <input id="idf" value="1" type="hidden" />
            <button type="button" class="btn btn-success btn-sm" onclick="tambahForm(); return false;"><i class="fa fa-plus"></i> Tambah Essay</button>
            <br/><br/><div id="divHobi"></div>

        </div>
    </div>

</div>


<script language="javascript">
    function tambahForm() {
        var idf = document.getElementById("idf").value;
        var stre;
        stre="<p id='srow" + idf + "'><textarea type='text' class='form-control form-control-solid' name='essay[]' placeholder='Masukan Essay'></textarea> " +
            "<a href='#' class='btn btn-danger btn-flat' onclick='hapusElemen(\"#srow" + idf + "\"); return false;'><i class='fas fa-trash-alt'></i></a></p>";
        $("#divHobi").append(stre);
        idf = (idf-1) + 2;
        document.getElementById("idf").value = idf;
    }
    function hapusElemen(idf) {
        $(idf).remove();
    }
</script>
