@extends('layout.app')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Edit Asset</h3>
            </div>

            <!-- Body -->
            <div class="card-body">
                <form action="{{route('mobil.update', $mobil->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama_mobil">Nama Mobil:</label>
                                <input type="text" class="form-control" id="nama_mobil" name="nama_mobil" value="{{ $mobil->nama_mobil }}" required>
                            </div>
                            <div class="form-group">
                                <label for="jenis_mobil">Jenis Mobil:</label>
                                <input type="text" class="form-control" id="jenis_mobil" name="jenis_mobil" value="{{ $mobil->jenis_mobil }}" required>
                            </div>
                            <div class="form-group">
                                <label for="plat_mobil">Plat Mobil:</label>
                                <input type="text" class="form-control" id="plat_mobil" name="plat_mobil" value="{{ $mobil->plat_mobil }}" required>
                            </div>
                            <div class="form-group">
                                <label for="harga_sewa">Harga Sewa Mobil Perbulannya</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp</span>
                                    </div>
                                    <input type="text" class="form-control currency" id="harga_sewa" name="harga_sewa" value="{{$mobil->harga_sewa}}" onkeyup="formatInput(this)">
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary ml-2" onclick="window.location.href='{{ route('mobil.index') }}'">Batal</button> 
                </form>
            </div>
        </div>

    </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.7/jquery.inputmask.min.js"></script>
<script>
    $(document).ready(function(){
        $('[data-mask]').inputmask();
        
        // Remove symbols before form submission
        $('form').on('submit', function() {
            let no_tlp = $('#no_tlp').val();
            // Remove all non-numeric characters
            no_tlp = no_tlp.replace(/\D/g, '');
            $('#no_tlp').val(no_tlp);
        });
    });
</script>
<script>
    function formatInput(input) {
        let value = input.value.replace(/[^0-9]/g, '');
        if (value) {
            value = parseInt(value, 10).toLocaleString('en-US').replace(/,/g, '.');
        }
        input.value = value;
    }

    function unformatInput(input) {
        return input.value.replace(/[^0-9.]/g, '').replace(/\./g, '');
    }

    document.getElementById('currencyForm').addEventListener('submit', function(event) {
        let currencyFields = document.querySelectorAll('.currency');
        currencyFields.forEach(function(field) {
            field.value = unformatInput(field);
        });
    });
</script>

@endsection