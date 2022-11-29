@extends('navbar')

@section('content')
<div class="d-flex justify-content-center align-items-center">
    <div class="card w-100">
        <div class="card-header bg-light">
            <span class="fw-semibold">Rekomendasi Jamu</span>
        </div>
        <div class="card-body">
            <div class="row px-5 g-5">
                <div class="col">
                    <div class="text-center mb-3 mt-3">
                        <h5>Isi data jamu</h5>
                    </div>
                    <form action="{{ route('jamu.store') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="" class="form-label">Keluhan</label>
                            <div class="row">
                                <div class="col">
                                    <input type="text" class="form-control" name="keluhan1">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" name="keluhan2">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="" class="form-label">Tahun lahir</label>
                            <select name="tahun" id="" class="form-select">
                                <option value="" selected disabled>-- Pilih tahun --</option>
                                @for($i = 1880; $i <= date('Y'); $i++) <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                            </select>
                        </div>
                        <div class="text-center">
                            <input type="submit" value="Oke" class="btn btn-primary w-25">
                        </div>
                    </form>
                </div>
                <div class="col">
                    <div class="text-center mb-5 mt-3">
                        <h5>Preview data jamu</h5>
                    </div>
                    <div class="mb-3">
                        <span class="text-capitalize">Nama jamu : @isset($data)<span id="output1" class="fw-semibold">{{ $data['jamu'] }}</span>@endisset</span>
                    </div>
                    <div class="mb-3">
                        <span class="text-capitalize">Umur : @isset($data)<span id="output2" class="fw-semibold">{{ $data['umur'] }}</span>@endisset</span>
                    </div>
                    <div class="mb-3">
                        <span class="text-capitalize">Saran penggunaan : @isset($data)<span id="output8" class="fw-semibold">{{ $data['saran'] }}</span>@endisset</span>
                    </div>
                    <div class="mb-3">
                        <span class="text-capitalize">Khasiat : @isset($data)<span id="output8" class="fw-semibold">{{ $data['khasiat'] }}</span>@endisset</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
