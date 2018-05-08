@extends('layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">Subject Form</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                            <form method="POST" action="/subject/store">
                                {{ csrf_field() }}
                                <div class="form-group">

                                    <label for="subject_name" style="align-content: center">Subject Name</label>

                                    <input type="text" class="form-control" id="subject_name" name="subject_name"  value="{{old('subject_name')}}" placeholder="Subject Name" required>

                                </div>

                                <div class="form-group">

                                    <label for="full_marks">Full Marks</label>

                                    <input type="text" class="form-control" id="full_marks" name="full_marks"  value="{{old('full_marks')}}" placeholder="Full Marks" required>

                                </div>
                                <div class="form-group">

                                    <label for="pass_marks">Pass Marks</label>

                                    <input type="text" class="form-control" id="pass_marks" name="pass_marks"  value="{{old('pass_marks')}}" placeholder="Pass Marks" required>

                                </div>
                                <div class="form-group">

                                    <label for="theory_marks">Theory Marks</label>

                                    <input type="text" class="form-control" id="theory_marks" name="theory_marks"  value="{{old('theory_marks')}}" placeholder="Theory Marks" required>

                                </div>
                                <div class="form-group">

                                    <label for="practical_marks">Practical Marks</label>

                                    <input type="text" class="form-control" id="practical_marks" name="practical_marks"  value="{{old('practical_marks')}}" placeholder="Practical Marks" required>

                                </div>

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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
