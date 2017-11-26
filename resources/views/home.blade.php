@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Consumption of this month</div>

                <div class="panel-body">


                    <table width="100%" border="1px">
                        <tr>
                            <td>Date</td>
                            <td>Consumption</td>
                        </tr>
                        @foreach($success as $data)
                            <tr>
                                <td>{{$data->date}}</td>
                                <td>{{$data->unit}}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
