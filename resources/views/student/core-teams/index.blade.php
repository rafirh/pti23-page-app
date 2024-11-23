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
            <div class="row row-cards">
                @foreach ($coreTeams as $team)
                    
                @endforeach
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