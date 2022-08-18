@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Welcome User</div>

                <div class="card-body">
                    <form method="POST" action="{{route('create')}}">
                        @csrf

                        <div class="row mb-3">
                            <label for="start_time" class="col-md-4 col-form-label text-md-end">Start Time : </label>

                            <div class="col-md-6">
                                <input type="time" class="form-control" name="start_time" step="2">

                                @if ($errors->has('start_time'))
                                    <span class="text-danger">{{ $errors->first('start_time') }}</span>
                                @endif
                            </div>
                        </div>

                         <div class="row mb-3">
                            <label for="end_time" class="col-md-4 col-form-label text-md-end">End Time : </label>

                            <div class="col-md-6">
                                <input type="time" class="form-control" name="end_time" step="2">
                                  @if ($errors->has('end_time'))
                                    <span class="text-danger">{{ $errors->first('end_time') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                    @if(!empty($magical_number)>0)
                        <label for="end_time" class="col-md-4 col-form-label text-md-end">List of Magical Time :</label><br>
                        <label></label>
                        @foreach($magical_number as $key => $number)
                         {{++$key}} - {{$number}}<br>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
