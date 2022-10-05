@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading"><h3>Paises</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            
                        </div>
                        @livewire('select-paises')
                        <div class="pagination justify-content-end" style="display: none">
                            {{-- {!! $paises->links() !!} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

