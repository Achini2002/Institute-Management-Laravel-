@extends('app')

@section('content')
<h1>Edit Student</h1>

<form action="{{route('students.store')}}" method="POST">

        @csrf
        <div class="mb-3">
            <lable for="first_name" class="form-lable">First Name</lable>
            <input type="text" name="first_name" id="first_name" class="form-control" value="{{old('first_name',$student->first_name)}}" required>
        </div>

        <div class="mb-3">
            <lable for="last_name" class="form-lable">Last Name</lable>
            <input type="text" name="last_name" id="last_name" class="form-control" value="{{old('last_name',$student->last_name)}}" required>
        </div>

        <div class="mb-3">
            <lable for="dob" class="form-lable">Date of Birth</lable>
            <input type="date" name="dob" id="dob" class="form-control" value="{{old('dob',$student->dob)}}" required>
        </div>

        <div class="mb-3">
            <lable for="gender" class="form-lable">Gender</lable>
            <select type="gender"  id="gender" class="form-select"  required>
                <option value="Male"{{old('gender',$student->gender)=='Male' ? 'selected' : ''}}>Male</option>
                <option value="Female"{{old('gender',$student->gender)=='Female' ? 'selected' : ''}}>Female</option>
                <option value="Other"{{old('gender',$student->gender)=='Other' ? 'selected' : ''}}>Other</option>
            </select>
        </div>

        <div class="mb-3">
            <lable for="contact_number" class="form-lable">Contact Number</lable>
            <input type="text" name="contact_number" id="contact_number" class="form-control" value="{{old('contact_number',$student->contact_number)}}" required>
        </div>


        <div class="mb-3">
            <lable for="email" class="form-lable">Email</lable>
            <input type="text" name="email" id="email" class="form-control" value="{{old('email',$student->email)}}" required>
        </div>

        <div class="mb-3">
            <lable for="addresss" class="form-lable">Address</lable>
            <input type="text" name="addresss" id="addresss" class="form-control" value="{{old('addresss',$student->address)}}" required>
        </div>

        <button type="submit" class="btn btn-success">Save</button>


    </form>

@endsection