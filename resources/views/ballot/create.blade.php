@extends('layouts.master')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h5>投票</h5>
        </div>
        <div class="panel-body">
            <form action="{{ route('ballot.store').'?id='.$ballot->id }}" method="post">
                {{ csrf_field() }}
                <div class="hidden">
                    <input type="text" name="token" value="{{ $ballot->token }}" hidden>
                </div>
                <div class="form-group">
                    <label for="college">投票给</label>
                    <select name="college" id="college">
                        @foreach($colleges as $college)
                            <option value=" {{$college->id}} ">{{ $college->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">投票</button>
            </form>
        </div>
    </div>
@endsection