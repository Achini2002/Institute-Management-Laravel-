@extenda('app')

@section('content')
    <div class="container mt-5">
        <h2> Manage Results for Exam: {{ $exam->exam_name }}</h2>

        <form action="{{route('exam_results.store')}}" method="POST">
            @csrf

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Student Name</th>
                        @foreach($subjects as $subject)
                            <th>{{ $subject->subject_name }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <td>{{ $student->first_name }} {{ $student->last_name}}</td>

                            @foreach ($subjects as $subject)
                                @php 

                                $result = $results->firstWhere('stu_id', $student->stu_id)
                                ?->firstWhere('sub_id', $subject->sub_id);

                                @endphp

                                <td>
                                    <input type="number" name="results[{{$student->stu_id}}][{{ $subject->sub_id }}]" 
                                    class="form-control" value="{{$result->mark_obtained ?? '' }}" placeholder="Enter marks" min="0" max="100">

                                </td>


                            
                            @endforeach

                        </tr>
                    
                    @endforeach
                </tbody>
            </table>
        
                <button type="submit" class="btn btn-success mt-3"> Saved Results</button>
        </form>
    </div>

@endsection