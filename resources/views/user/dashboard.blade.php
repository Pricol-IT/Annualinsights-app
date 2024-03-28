@extends('layout.app')
@section('title')
{{__('Dashboard')}}
@endsection
@section('main')
<main id="main" class="main">
    <div class="container">
        <div>
            @livewire(\App\Livewire\StatsOverview::class)
        </div>
        <div class="row mt-3">
            <div class="col-lg-6">@livewire(\App\Livewire\BlogPostsChart::class)</div>
        </div>
        <div>

        </div>

    </div>
</main><!-- End #main -->
@endsection
