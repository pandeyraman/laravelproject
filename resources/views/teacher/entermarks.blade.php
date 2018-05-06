@extends('layouts.app')

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
                        <p>Welcome {{Auth::user()->name}}</p>
                    </div>

                Please enter marks for Subject : {{$subject->subject_name}}

                    <form action="/submit/marks" method="post">
                        @csrf
                        <input type="hidden" name="subject_id" value="{{$subject->id}}">
                    <table class="table">
                        <tr><td>
                                Roll No:
                            </td>
                            <td>
                                Name
                            </td>
                            <td>
                                Please Enter Marks
                            </td>
                        </tr>
                        <?php $count = 0; ?>
                        @foreach($grade->students as $g)
                        <tr>
                            <td>
                                {{$g->roll_no}}
                            </td>
                            <td>
                                {{$g->name}}
                            </td>
                            <td>
                                <input type="hidden" name="alldata[{{$count}}][students_id]" value="{{$g->id}}">
                                <input type="number" name="alldata[{{$count}}][marks]">
                            </td>
                        </tr>
                            <?php $count++ ?>
                        @endforeach
                    </table>
                        <div class="text-right"><button type="submit" class="btn-secondary">Submit Marks</button></div>

                    </form>

            </div>
        </div>
    </div>
@endsection