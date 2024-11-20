@extends('app')

@section('content')
<h1>Edit Student</h1>

<form action="{{ route('students.update',$student->stu_id) }}" method="post">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="first_name" class="form-lable">First Name</label>
        <input type="text" name="first_name" id="first_name" class="form-control"
            value="{{ old('first_name', $student->first_name) }}" required>
    </div>
    <div class="mb-3">
        <label for="last_name" class="form-lable">Last Name</label>
        <input type="text" name="last_name" id="last_name" class="form-control"
            value="{{ old('last_name', $student->last_name) }}" required>
    </div>
    <div class="mb-3">
        <label for="dob" class="form-lable">Date of Birth</label>
        <input type="date" name="dob" id="dob" class="form-control" value="{{ old('dob', $student->dob) }}" required>
    </div>
    <div class="mb-3">
        <label for="gender" class="form-lable">Gender</label>
        <select name="gender" id="gender" class="form-select" required>
            <option value="Male" {{ old('gender', $student->gender) == 'Male' ? 'selected' : '' }}>Male</option>
            <option value="Female" {{ old('gender', $student->gender) == 'Female' ? 'selected' : '' }}>Female</option>
            <option value="Other" {{ old('gender', $student->gender) == 'Other' ? 'selected' : '' }}>Other</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="contact_number" class="form-lable">Contact Number</label>
        <input type="text" name="contact_number" id="contact_number" class="form-control"
            value="{{ old('contact_number',$student->contact_number) }}" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-lable">Email</label>
        <input type="text" name="email" id="email" class="form-control" value="{{ old('email', $student->email) }}"
            required>
    </div>
    <div class="mb-3">
        <label for="address" class="form-lable">Address</label>
        <input type="text" name="address" id="address" class="form-control"
            value="{{ old('address', $student->address) }}" required>
    </div>

    <button type="submit" class="btn btn-success">Update</button>
</form>

@endsection