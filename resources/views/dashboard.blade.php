@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')
    <div class="d-flex justify-content-center align-items-center">
        <h2>Seja bem-vindo, {{ $user_name }}!</h2>
    </div>
@endsection

@push('js')
    <script src="{{ asset('white') }}/js/plugins/chartjs.min.js"></script>
    <script>
        $(document).ready(function() {
          demo.initDashboardPageCharts();
        });
    </script>
@endpush
