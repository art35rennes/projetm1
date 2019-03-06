@extends('layout')
@section('customCss')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
@endsection

@section('body')
    <div class="container">
        <table id="example" class="display" style="width:100%">
            <thead>
            <tr>
                <th></th>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Salary</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th></th>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Salary</th>
            </tr>
            </tfoot>
        </table>
    </div>

@endsection

@section('customJs')
    <script type="text/javascript" src="{{ URL::asset('js/poc.js') }}"></script>

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

@endsection