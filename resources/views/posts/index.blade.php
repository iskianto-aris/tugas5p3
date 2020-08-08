@extends('adminlte.master')

@section('content')
    <div class="mt-3 ml-3">
    <div class="card">
              <div class="card-header">
                <h3 class="card-title">Posts Table</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success')}}
                        </div>
                  @endif
                <a class="btn btn-primary mb-2" href="/posts/create"> Create New Post</a>
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th> Title </th>
                      <th> Body </th>
                      <th style="width: 40px">Label</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- @foreach($posts as $key => $post)
                        <tr>
                            <td> {{ $key + 1 }}</td>
                            <td> {{ $post -> title }} </td>
                            <td> {{ $post -> body }} </td>
                            <td> actions </td>
                        </tr>
                    @endforeach -->

                    @forelse($posts as $key => $post)
                        <tr>
                            <td> {{ $key + 1 }}</td>
                            <td> {{ $post -> title }} </td>
                            <td> {{ $post -> body }} </td>
                            <td style='display:flex;'> 
                                <a href="/posts/{{$post->id}}" class="btn btn-info btn-im"> Show </a>
                                <a href="/posts/{{$post->id}}/edit" class="btn btn-default btn-im"> Edit </a>
                                <form action="/posts/{{$post -> id}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="delete" class="btn btn-danger btn-sm">
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" align="center"> Tidak ada data </td>
                        </tr>
                    @endforelse
                    <!-- foreach dan forelse sesungguhnya sama, 
                    tetapi kelebihan dari forelse ialah ketika data kosong, maka bisa memunculkan notif/alert  -->
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <!-- <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">«</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">»</a></li>
                </ul>
              </div> -->
            </div>
    </div>
@endsection