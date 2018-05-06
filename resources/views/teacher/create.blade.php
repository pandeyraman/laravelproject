@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Teacher Form</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                            @if(!empty($allgrades))
                                <form action="/teacher/fetchsubject" method="post">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="name">Class No</label>
                                        <select class="form-control" id="grades_id"
                                                name="grades_id" >
                                            @foreach($allgrades as $grade)
                                                <option value="{{$grade->id}}">{{$grade->class_no}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary btn-lg text-center">Add</button>
                                    </div>
                                </form>
                            @else
                            <form method="POST" action="/teacher/store">
                                {{ csrf_field() }}
                                <input type="hidden" name="grades_id" value="{{$grades->id}}">
                                <div class="form-group">

                                    <label for="teacher_name">Teacher Name</label>

                                    <input type="text" class="form-control" id="teacher_name" name="teacher_name"  value="{{old('teacher_name')}}" placeholder="Teacher Name" required>

                                </div>

                                <div class="form-group">

                                    <label for="address">Address</label>

                                    <input type="text" class="form-control" id="address" name="address"  value="{{old('address')}}" placeholder="Addresss" required>

                                </div>

                                <div class="form-group">

                                    <label for="email">Email</label>

                                    <input type="email" class="form-control" id="email" name="email"  value="{{old('email')}}" placeholder="Email Address" required>

                                </div>
                                <div class="form-group">

                                    <label for="contact">Contact Number</label>

                                    <input type="text" class="form-control" id="contact" name="contact"  value="{{old('contact')}}" placeholder="Contact Number" required>

                                </div>
                                <div class="form-group">
                                    <label for="name">Class No</label>
                                    <select class="form-control" id="subjects_id"
                                            name="subjects_id" >
                                        @foreach($grades->subjects as $grade)
                                            <option value="{{$grade->id}}">{{$grade->subject_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary text-center">Add</button>
                                </div>
                            </form>
                           @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
