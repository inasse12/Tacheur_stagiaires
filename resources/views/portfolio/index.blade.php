@extends('layouts.auth')
@section('content')

    <main class="main-content position-relative max-height-vh-100 mt-1 border-radius-lg ">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                          <button type="button" class="btn" data-bs-toggle="modal"
                          data-bs-target="#exampleModal">
                         add portfolio
                      </button>
                        </div>
                                <!-- Button trigger modal -->
                     
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">



                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Add Portfolio</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('portfolio.store') }}" method="POST" enctype="multipart/form-data">
                                                  @csrf
                                                    <div class="form-group">
                                                        <label for="example-designation-input"
                                                            class="form-control-label">designation</label>
                                                        <input class="form-control" type="text" name="designation" 
                                                            id="example-designation-input" required>
                                                    </div>
                                                    <div class="form-group">
                                                      <label for="example-details-input"
                                                          class="form-control-label">details</label>
                                                      <input class="form-control" type="text" name="details" 
                                                          id="example-details-input" required>
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="example-date-input"
                                                        class="form-control-label">date</label>
                                                    <input class="form-control" type="date" name="date"
                                                        id="example-date-input" required>
                                                </div>
                                                {{-- <div action="/file-upload" class="form-control dropzone" id="dropzone" style="display: flex;flex-wrap: wrap"> --}}
                                                  {{-- <div class="fallback"> --}}
                                                      <input name="images[]" type="file" multiple  required/>
                                                  {{-- </div> --}}
                                              {{-- </div> --}}
                                               
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn "
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn">Add</button>
                                            </div> 
                                          </form>
                                        </div>
                                    </div>
                                </div>
                                
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                details</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                date</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                designation</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                tacheur</th>
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            @foreach ($portfolio as $item)
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div>
                                                            <img src="{{ asset('images/img/team-2.jpg') }}"
                                                                class="avatar avatar-sm me-3" alt="user1">
                                                        </div>
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">{{ $item->details }}</h6>
                                                            <p class="text-xs text-secondary mb-0">{{ $item->details }}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{ $item->date }}</p>
                                                    <p class="text-xs text-secondary mb-0">{{ $item->date }}</p>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span
                                                        class="badge badge-sm bg-gradient-success">{{ $item->designation }}</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span
                                                        class="text-secondary text-xs font-weight-bold">{{ $item->tacheur->user->nom }}</span>
                                                </td>
                                                <td class="align-middle">
                                                    <a type="button" class="text-secondary font-weight-bold text-xs"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#exampleModaledit{{ $item->id }}">
                                                        Show
                                                    </a>

                                                </td>
                                                <td class="align-middle">
                                                  <a type="button" class="text-secondary font-weight-bold text-xs"
                                                      data-bs-toggle="modal"
                                                      data-bs-target="#exampleModaledit{{ $item->id }}"  onclick="confirmDelete()">
                                                      delete
                                                  </a>

                                                  <form action="{{ route('portfolio.destroy', $item->id ) }}"
                                                    method="POST" id="delete-form" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>

                                              </td>
                                        </tr>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModaledit{{ $item->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModaleditTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">

                                                    {{-- <div class="modal-body"> --}}
                                                    {{-- <div class="row"> --}}
                                                    {{-- <div class="col-md-8 mx-auto"> --}}
                                                    <div id="carouselExampleIndicators{{ $item->id }}" class="carousel slide"
                                                        data-bs-ride="carousel">
                                                        <div class="carousel-indicators">
                                                          @php
                                                          $k=0;
                                                      @endphp
                                                          @foreach ($item->images as $img)

                                                            <button type="button"
                                                                data-bs-target="#carouselExampleIndicators{{ $item->id }}"
                                                                data-bs-slide-to="{{$k}}" class="active" aria-current="true"
                                                                aria-label="Slide {{$k}}"></button>
                                                          @endforeach
                                                          @php
                                                          $k++;
                                                      @endphp
                                                            {{-- <button type="button"
                                                                data-bs-target="#carouselExampleIndicators"
                                                                data-bs-slide-to="1" aria-label="Slide 2"></button>
                                                            <button type="button"
                                                                data-bs-target="#carouselExampleIndicators"
                                                                data-bs-slide-to="2" aria-label="Slide 3"></button> --}}
                                                        </div>
                                                        <div class="carousel-inner">
                                                          @php
                                                              $active="active"
                                                          @endphp
                                                         
                                                          @foreach ($item->images as $img)
                                                              <div class="carousel-item {{$active}}">
                                                                <img src="{{ Storage::url($img->path) }} "
                                                                    class="d-block w-100" alt="...">
                                                            </div>
                                                            @php
                                                            $active=""
                                                        @endphp  
                                                          @endforeach
                                                            
                                                            {{-- <div class="carousel-item">
                                                                <img src="https://images.unsplash.com/photo-1543269865-cbf427effbad?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1920&q=80"
                                                                    class="d-block w-100" alt="...">
                                                            </div>
                                                            <div class="carousel-item">
                                                                <img src="https://images.unsplash.com/photo-1552793494-111afe03d0ca?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1920&q=80"
                                                                    class="d-block w-100" alt="...">
                                                            </div> --}}
                                                        </div>
                                                        <button class="carousel-control-prev" type="button"
                                                            data-bs-target="#carouselExampleIndicators{{ $item->id }}"
                                                            data-bs-slide="prev">
                                                            <span class="carousel-control-prev-icon"
                                                                aria-hidden="true"></span>
                                                            <span class="visually-hidden">Previous</span>
                                                        </button>
                                                        <button class="carousel-control-next" type="button"
                                                            data-bs-target="#carouselExampleIndicators{{ $item->id }}"
                                                            data-bs-slide="next">
                                                            <span class="carousel-control-next-icon"
                                                                aria-hidden="true"></span>
                                                            <span class="visually-hidden">Next</span>
                                                        </button>
                                                    </div>
                                                    {{-- </div> --}}
                                                    {{-- </div> --}}
                                                    {{-- </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
          function confirmDelete() {
              event.preventDefault();
              if (confirm('Are you sure you want to delete this user?')) {
                  document.getElementById('delete-form').submit();
              }
          }
      </script>
    </main>
@endsection
