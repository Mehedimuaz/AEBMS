<h3>User Electricity Consumption</h3>
<table>
    <thead>
        <td>Peak current</td>
        <td>Peak Voltage</td>
        <td>Peak Power</td>
        <td>Unit</td>

    </thead>
    @foreach($consumptions as $consumption)
        <tr>
            <td>{{$consumption->current_high}}</td>
            <td>{{$consumption->voltage_high}}</td>
            <td>{{$consumption->power_high}}</td>
            <td>{{$consumption->unit}}</td>
        </tr>
    @endforeach
</table>