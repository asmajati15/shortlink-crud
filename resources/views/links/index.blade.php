@extends('layouts.app')

@section('title', 'General Dashboard')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Dashboard</h1>
            </div>
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>How To Create CRUD Operation In Laravel 10 - Leravio</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-success" href="{{ route('links.create') }}"> Create New Link</a>
                    </div>
                </div>
            </div>
           
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
           
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>URL/Tautan</th>
                    <th>Icon</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($links as $item)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->url }}</td>
                    <td>
                        @if ($item->icon)
                            <img class="img-thumbnail" width="100px" src="{{ $item->icon }}" alt="">
                        @else
                           Belum ada icon 
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('links.destroy',$item->id) }}" method="POST">
           
                            <a class="btn btn-info" href="{{ route('links.show',$item->id) }}">Show</a>
            
                            <a class="btn btn-primary" href="{{ route('links.edit',$item->id) }}">Edit</a>
           
                            @csrf
                            @method('DELETE')
              
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
          
            {!! $links->links() !!}
              
        </section>
    </div>
@endsection