@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Consumption of this month</div>

                <div class="panel-body">


                    <table width="100%" border="1px">
                        <thead>
                        <td>Date</td>
                        <td>Peak current</td>
                        <td>Peak Voltage</td>
                        <td>Peak Power</td>
                        <td>Unit</td>

                        </thead>
                        @foreach($consumptions as $consumption)
                            <tr>
                                <td>{{date('Y-m-d', strtotime($consumption->created_at))}}</td>
                                <td>{{$consumption->current_high}}</td>
                                <td>{{$consumption->voltage_high}}</td>
                                <td>{{$consumption->power_high}}</td>
                                <td>{{$consumption->unit}}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
