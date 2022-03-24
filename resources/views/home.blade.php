@extends('layouts.main')

@section('title', 'Dashboard')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if (session('status'))

            <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>

            @endif
            <div class="card">
                <div class="card-header">
                    <a href="{{ url('/create') }}" class="btn btn-primary btn-sm">New +</a>
                </div>

                <div class="card-body row">
                    @if (count($todo) === 0)
                        <span class="text-center">Anda Belom Memiliki Todo</span>
                    @endif
                    @foreach ($todo as $item)

                    <div class="col-md-3">
                        <div class="card text-dark bg-warning mb-3" style="max-width: 18rem;">
                            <div class="card-header">
                                <span>{{ $item->created_at }}</span>
                                <div class="d-flex" style="float:right">
                                <a href="{{ url('/edit/'.$item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                {{-- <a href="{{ url('/delete/'.$item->id) }}" class="btn btn-danger btn-sm">Hapus</a> --}}
                                <form action="{{ url('/delete/'.$item->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                                </div>
                            </div>
                            <div class="card-body">
                              {{-- <h5 class="card-title">Warning card title</h5> --}}
                              <p class="card-text">{{ $item->todo }}</p>
                            </div>
                          </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endsection
