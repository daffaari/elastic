@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Results Data</div>
               <a href="{{ route('article') }}" class="">
                <button type="button" class="btn btn-success float-end mt-2 ">Back</button>
               </a>
                <div class="card-body">
                   {{-- <b>{{ count($data) }}</b> data has been filtered --}}

                   <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Type</th>
                        <th scope="col">Content</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($data['hits']['hits'] as $hit)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $hit['_source']['title'] }}</td>
                            <td>{{ $hit['_source']['type'] }}</td>
                            <td>{{ $hit['_source']['content'] }}</td>
                        </tr>
                    @endforeach

                    </tbody>
                  </table>

                </div>
                {{-- {{ $data->links() }} --}}
            </div>
        </div>
    </div>
</div>
@endsection
