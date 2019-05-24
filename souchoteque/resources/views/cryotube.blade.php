@extends('layout')

@section('body')

    <table class="table table-bordered" id="cryotube">
        <thead>
            <th>Souche</th>
            <th>Pasteur</th>
            <th>Stock</th>
            <th></th>
            <th></th>
        </thead>
        <tbody>
        @foreach($souches as $souche)
            <tr>
                <td>
                    <h4>
                        <span class="badge @if($souche->notogm) badge-info @else badge-warning @endif font-weight-normal">{{$souche->ref}}</span>
                    </h4>
                </td>
                <td>@if($souche->pasteur){{$souche->pasteur}}@else - @endif</td>
                <td>{{$souche->stock}}</td>
                <td>
                    <i class="fas fa-minus"></i>
                </td>
                <td>
                    <i class="fas fa-plus"></i>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection