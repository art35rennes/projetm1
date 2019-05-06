@extends('layout')
@section('body')
    <form id="fileinfo" enctype="multipart/form-data" method="post" name="fileinfo">
        <label>File to stash:</label>
        <input type="file" name="file" required />
    </form>
    <input type="button" value="Stash the file!">
    <div id="output"></div>

    <button id="uploadBTN">Go !</button>

@endsection

@section('customJs')
    <script type="text/javascript" src="{{ URL::asset('js/poc.js') }}"></script>
@endsection