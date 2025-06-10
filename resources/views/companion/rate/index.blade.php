@extends('template.layout.app')
@section('content')
<div class="row w-100 m-0">
    <main class="col-md-10 offset-md-2 px-4">
                <div class="d-flex align-items-center justify-content-between flex-wrap rates-heding">
                     <div class="d-flex align-items-center justify-content-between flex-wrap me-3 flex-grow-1">
                         <h4 class="mb-0 editprofile-heding">Rates</h4>
                        <div class="editrates-button dev">
                            <a href="{{route('rate.create')}}" class="addmore-ratebtn">Add+</a>
                        </div>
                    </div>
                </div>
                 <div class="card rates-card">
                    <div class="row mb-3">
                        @include('alertmessage')
                         <div class="table-responsive">
                            <table class="table myearning-td" >
                              <thead class="table-light">
                                <tr class="head-earningtable">
                                  <th scope="col">SNo</th>
                                  <th scope="col">Title</th>
                                  <th scope="col">Gems</th>
                                  <th scope="col">Hours</th>
                                  <th scope="col">Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                    @if($rates->isEmpty())
                                        <tr>
                                            <td colspan="5" class="text-center"><b>No Rates available</b></td>
                                        </tr>
                                    @else
                                        @foreach($rates as $index => $rate)
                                            <tr class="rate-row">
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $rate->title }}</td>
                                                <td>{{ $rate->gem }}</td>
                                                <td>{{ $rate->hours }}</td>
                                                <td>
                                                    <a href="{{ route('rate.edit', $rate->id) }}" class="ratesedit-btnn">Edit</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                          </div>
                      </div>
                </div>
       </main>
</div>
@endsection