@extends('layouts.master')

@section('title')
    Thêm mới danh mục
@endsection

@section('content')
    @if (!empty($_SESSION['errors']))
        <div class="alert alert-warning">
            <ul>
                @foreach ($_SESSION['errors'] as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @phps
            unset($_SESSION['errors']);
        @endphp
    @endif

    <form action="{{ url('admin/categories/store') }}" method="POST">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3 mt-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
                </div>
        </div>
        
        <button type="submit" class="btn btn-primary mt-5">Submit</button>
    </form>
@endsection