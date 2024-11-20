@extends('app')

@section('content')

    <div class="d-flex justify-content-between align-items-center">
        <h1>Subjects</h1>
        <a href="{{route('subjects.create')}}" class="btn btn-primary">Add New Subject</a>
    </div>

    <table class="table table-boardered mt-3">
        <thead>
            <tr>
                <td>Subject Name</td>
                <td>Credit Hours</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($subjects as $subject )
                <tr>
                    <td>{{$subject->sub_name}}</td>
                    <td>{{$subject->credit_hours}}</td>
                </tr>

                    <td>
                        <a href="{{route('subjects.edit',$subject->sub_id)}}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{route('subjects.destroy',$subject->sub_id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>


            @endforeach
        </tbody>
    </table>





@endsection