@extends('layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">Student Form</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                            <form method="post" action="{{action('StudentController@update',$id)}}}">
                                {{csrf_field()}}
                                <input name="_method" type="hidden" value="PATCH">
                            <div class="form-group">

                                <label for="name" style="align-content: center">Student Name</label>

                                <input type="text" class="form-control" id="name" name="name"  value="{{$student->name}}" placeholder="Student Name" required>

                            </div>

                            <div class="form-group">

                                <label for="roll_no">Roll No</label>

                                <input type="text" class="form-control" id="roll_no" name="roll_no"  value="{{$student->roll_no}}" placeholder="Roll No" required>

                            </div>

                                <div class="form-group">
                                    <label for="name">Class No</label>
                                    <select class="form-control" id="class_no_id"
                                            name="grades_id"  noSelection="['':'--Select Class--']" >
                                        @foreach($allgrades as $grade)
                                            <option value="{{$grade->id}}">{{$grade->class_no}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-lg text-center">Update</button>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
