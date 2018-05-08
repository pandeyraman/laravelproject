@extends('layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Student Form</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="post" action="{{action('TeacherController@update', $id)}}}">
                            {{csrf_field()}}
                            <input name="_method" type="hidden" value="PATCH">
                            <div class="form-group">

                                <label for="teacher_name">Teacher Name</label>

                                <input type="text" class="form-control" id="teacher_name" name="teacher_name"  value="{{$teacher->teacher_name}}" placeholder="Teacher Name" required>

                            </div>

                            <div class="form-group">

                                <label for="address">Address</label>

                                <input type="text" class="form-control" id="address" name="address"  value="{{$teacher->address}}" placeholder="Addresss" required>

                            </div>

                            <div class="form-group">

                                <label for="email">Email</label>

                                <input type="email" class="form-control" id="email" name="email"  value="{{$teacher->email}}" placeholder="Email Address" required>

                            </div>
                            <div class="form-group">

                                <label for="contact">Contact Number</label>

                                <input type="text" class="form-control" id="contact" name="contact"  value="{{$teacher->contact}}" placeholder="Contact Number" required>

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
