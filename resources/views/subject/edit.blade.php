@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Subject Form</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="post" action="{{action('SubjectController@update', $id)}}}">
                            {{csrf_field()}}
                            <input name="_method" type="hidden" value="PATCH">
                            <div class="form-group">

                                <label for="subject_name">Subject Name</label>

                                <input type="text" class="form-control" id="subject_name" name="subject_name"  value="{{$subject->subject_name}}" placeholder="Subject Name" required>

                            </div>


                            <div class="form-group">

                                <label for="full_marks">Full Marks</label>

                                <input type="text" class="form-control" id="full_marks" name="full_marks"  value="{{$subject->full_marks}}" placeholder="Full Marks" required>

                            </div>
                            <div class="form-group">

                                <label for="pass_marks">Pass Marks</label>

                                <input type="text" class="form-control" id="pass_marks" name="pass_marks"  value="{{$subject->pass_marks}}" placeholder="Pass Marks" required>

                            </div>
                            <div class="form-group">

                                <label for="theory_marks">Theory Marks</label>

                                <input type="text" class="form-control" id="theory_marks" name="theory_marks"  value="{{$subject->theory_marks}}" placeholder="Theory Marks" required>

                            </div>
                            <div class="form-group">

                                <label for="practical_marks">Practical Marks</label>

                                <input type="text" class="form-control" id="practical_marks" name="practical_marks"  value="{{$subject ->practical_marks}}" placeholder="Practical Marks" required>

                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary text-center">Update</button>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
