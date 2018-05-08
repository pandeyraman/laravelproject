@extends('layouts.master')
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
                                <th>View Marks</th>
                                <th>Edit</th>
                                <th>Delete</th>


                            </tr>
                            </thead>
                            <tbody>
                            <?php $count = 1; ?>
                            @if(!empty($students))
                            @foreach($students as $student)
                                <tr>
                                    <td>{{$count++}}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->roll_no }}</td>
                                    <td>
                                        @foreach($student->grades as $ss)
                                            {{$ss->class_no}}
                                        @endforeach
                                    </td>
                                    <td><a href="/students/marks/{{$student->id}}">View Marks</a></td>
                                    <td><a href="{{action('StudentController@edit', $student->id)}}" class="btn btn-warning"><i class="far fa-edit"></i></a></td>
                                    <td>
                                        <form action="{{action('StudentController@destroy', $student->id)}}" method="post">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button class="btn btn-danger" onclick="return confirm('Are you Sure?')" type="submit"><i class="far fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection