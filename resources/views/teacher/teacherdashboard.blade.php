@extends('layouts.user')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Deerwalk Sifal School Marksheet Generator</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                    </div>

                <div class="col-md-12">
                    <button class="text-right btn-outline-info">Welcome {{$teacher->teacher_name}}</button>
                    <div class="table">

                    <table class="table table-bordered table-striped table-hover ">
                        <thead>
                        <tr>
                            <td>S.N</td>
                            <td>Class</td>
                            <td>Subject</td>
                            <td>View</td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $count = 1?>
                            <tr>
                                <td>{{$count++}}</td>
                                <td>

                                        @foreach($teacher->grades as $aa)
                                            <?php $class = $aa->class_no;
                                            $grade_id = $aa->id;
                                            ?>
                                        @endforeach
                                        @foreach($teacher->subjects as $bb)
                                            <?php $subject = $bb->subject_name;
                                                $subject_id = $bb->id;
                                            ?>
                                        @endforeach

                                            {{$class}}
                                </td>
                                <td>{{$subject}}</td>
                                <td><a href="/view/grade/{{$grade_id}}/{{$subject_id}}">View Students</a></td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection