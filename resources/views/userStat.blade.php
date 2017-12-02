<html>
<body>
<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#"><b><font color="white">Electricity&nbsp&nbsp&nbsp Monitoring System</font></b></a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="#"><b><font color="white">Home</font></b></a></li>
            <li><a href="#"><b><font color="white">Bill Generation</font></b></a></li>
            <li><a href="#"><b><font color="white">Send SMS</font></b></a></li>
            <li><a href="#"><b><font color="white">Monitor</font></b></a></li>
            <li><a href="#"><b><font color="white">Consumers</font></b></a></li>
        </ul>
        <form class="navbar-form navbar-left">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="                       Search by area">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
</nav>

<div class="row">
    <div class="col-sm-11 col-sm-offset-2">
        <form class="form-inline">
            <div class="form-group">
                <label for="email">Division:</label>
                <select class="form-control">
                    <option>Chittagong</option>
                </select>
            </div>&nbsp&nbsp&nbsp&nbsp&nbsp
            <div class="form-group">
                <label for="email">District:</label>
                <select class="form-control">
                    <option>Comilla</option>
                </select>
            </div>&nbsp&nbsp&nbsp&nbsp&nbsp
            <div class="form-group">
                <label for="email">Thana/Area:</label>
                <select class="form-control">
                    <option>Daudkandi</option>
                </select>
            </div>&nbsp&nbsp&nbsp&nbsp&nbsp
            <div class="form-group">
                <label for="email">Name of Consumer:</label>
                <input type="email" class="form-control" id="email">
            </div>&nbsp&nbsp&nbsp&nbsp&nbsp
            <button type="submit" class="btn btn-success blue">Search</button>
        </form>
    </div>
</div>

<div class="container">
    <h2>Electricity Consumption of Daudkandi for <br> Last 24 Hours</h2>
    <table width="100%" class="table table-striped">
        <thead>
        <tr>
            <th>Name of Consumer</th>
            <th>Units (kwh)</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Mahbubul Alam</td>
            <td>0.49</td>
            <td><button class="btn btn-primary">Billing Status</button></td>
        </tr>
        <tr>
            <td>Rafiqul Islam</td>
            <td>1.04</td>
            <td><button class="btn btn-primary">Billing Status</button></td>
        </tr>
        <tr>
            <td>Shahnaz Khan</td>
            <td>0.04</td>
            <td><button class="btn btn-primary">Billing Status</button></td>
        </tr>
        <tr>
            <td>Shujit Pal</td>
            <td>0.87</td>
            <td><button class="btn btn-primary">Billing Status</button></td>
        </tr>
        <tr>
            <td>Abdur Rashid</td>
            <td>0.08</td>
            <td><button class="btn btn-primary">Billing Status</button></td>
        </tr>
        <tr>
            <td>Minhaz Majumder</td>
            <td>0.37</td>
            <td><button class="btn btn-primary">Billing Status</button></td>
        </tr>
        <tr>
            <td>Shamsul Hoque</td>
            <td>0.20</td>
            <td><button class="btn btn-primary">Billing Status</button></td>
        </tr>
        <tr>
            <td>Tanvir Ahmed</td>
            <td>0.45</td>
            <td><button class="btn btn-primary">Billing Status</button></td>
        </tr>
        </tbody>
    </table>
</div>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
</body>

</html>