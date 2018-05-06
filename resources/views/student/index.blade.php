@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header">
                        <div class="text-right"> <a href="{{route('student.create')}}" class="btn btn-primary text-right">Add New Student</a></div>
                    </div>


                    <div class="table">
                        <table class="table table-bordered table-striped table-hover ">
                            <thead>
                            <tr>
                                <th>S.N.</th>
                                <th>Student Name</th>
                                <th>Roll No</th>
                                <th>Class</th>
                                <th>Edit</th>
                                <th>Delete</th>


                            </tr>
                            </thead>
                            <tbody>
                            @foreach($students as $student)
                                <tr>

                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->roll_no }}</td>
                                    <td>
                                        @foreach($student->grades as $ss)
                                            {{$ss->class_no}}
                                        @endforeach
                                    </td>
                                    <td><a href="{{action('StudentController@edit', $student->id)}}" class="btn btn-warning">Edit</a></td>
                                    <td>
                                        <form action="{{action('StudentController@destroy', $student->id)}}" method="post">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button class="btn btn-danger" onclick="return confirm('Are you Sure?')" type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection