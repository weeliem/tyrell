@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="pb-3 font-weight-bold">Suggestions to improve the query in order to improve its performance:</div>

        <div class="card w-100 mb-2">
            <div class="card-body">
                Make sure that the fields in your WHERE statements and ON conditions have indexes; primary keys are indexed by default, but you can create indexes manually if necessary.
            </div>
        </div>

        <div class="card w-100 mb-2">
            <div class="card-body">
                Suggest to use INNER JOINs instead of LEFT JOINs, this is to reduce the record when there is no match on the right table.
            </div>
        </div>

        <div class="card w-100 mb-2">
            <div class="card-body">
                You might also want to think about using caching applications like memcached to reduce database load.
            </div>
        </div>

        <div class="card w-100 mb-2">
            <div class="card-body">
                Instead of using LIKE clause, you could use FULLTEXT, which is the index of type FULLTEXT(char, varchar or text) to speed up the load.
            </div>
        </div>
    </div>
@endsection