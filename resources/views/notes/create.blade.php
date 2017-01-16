@extends('layouts.base')


@section('content')

    <h1>Create Note</h1>
    
    <div class="container">
        <form action="{{ route('notes.store')}}" method="post">
           {{ csrf_field() }}

           <!--title part-->
            <div class="form-group">
                <label for="title">Note Title</label>
                <input type="text" class="form-control" name="title">
            </div>

             <!--body part-->
            <div class="form-group">
                <label for="body">Note Body</label>
                <input type="text" class="form-control" name="body">
            </div>

            <input type="submit" class="btn btn-primary" value="Done">
        </form>
    </div>
@endsection      