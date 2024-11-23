@extends('student.main')

@section('custom-css')
@endsection

@section('content')
    {{-- Page Header --}}
    <div class="page-header d-print-none mt-2">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h3 class="page-title">
                        {{ $title }}
                    </h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards" style="height: 80vh;">
                <div class="col-12" style="display: flex; justify-content: center; align-items: center;">
                    <h1>Halaman kontak</h1>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('library-js')
@endsection

@section('custom-js')
    <script>
    </script>
@endsection