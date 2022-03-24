@extends('layouts.main')

@section('title', 'Update Todo')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <a href="{{ url('/home') }}" class="btn btn-danger btn-sm">Back</a>
                </div>

                <div class="card-body">
                    <form action="{{ url('/update/'.$todo->id) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="todo" class="form-label">My Todo :</label>
                            <textarea class="form-control @error('todo') is-invalid @enderror" id="todo" name="todo" rows="3">{{ $todo->todo }}</textarea>
                            @error('todo')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                          </div>
                          <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        @endsection
