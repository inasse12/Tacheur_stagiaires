@extends('layouts.app')

@section('link-css')
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/fontawesome.min.css"
        integrity="sha512-cHxvm20nkjOUySu7jdwiUxgGy11vuVPE9YeK89geLMLMMEOcKFyS2i+8wo0FOwyQO/bL8Bvq1KMsqK4bbOsPnA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

<div>
    {{-- @include('layouts.sidebar') --}}
    @section('content')
        <button onclick="topFunction()" id="toTop" title="Go to top"><i
                class="fa fa-arrow-up"aria-hidden="true"></i></button>

        <div class="header">
            <div class="imgWrapper">
                <img class="img-header" src="{{ asset('images/hero.jpg') }}" alt="">
            </div>
        </div>

        <div class="popular-projects u-hidden--md u-hidden--sm">
            <section>
                <div class="container">
                    <div class="row row--thin">
                        <div class="inline-flex" style="justify-content: space-between;">
                            <h2>Services</h2>
                            @can('Admin')
                                <button type="button"
                                    class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 rounded-lg text-sm px-4 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                                    style="height: 45px !important;" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">Ajouter Service</button>


                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Ajouter
                                                    Service</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('services.store') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="example-nom-input" class="form-control-label">Nom
                                                            Service</label>
                                                        <input class="form-control" type="text" name="nom"
                                                            id="example-nom-input" required>
                                                    </div><br>

                                                    <div class="form-group">
                                                        <label for="example-description-input"
                                                            class="form-control-label">Description</label>
                                                        <input class="form-control" type="text" name="description"
                                                            id="example-description-input" required>
                                                    </div><br>

                                                    <input name="path" type="file" />
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn " data-bs-dismiss="modal">Close</button>
                                                <button type="submit"
                                                    class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 rounded-lg text-sm px-4 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Ajouter</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endcan
                        </div>
                        <div class="popular-projects-cards">
                            <ul>
                                @foreach ($services as $item)
                                    <li>
                                        <div class="popular-projects-link" data-event-name="popular_projects_clicked">
                                            <a href="{{ route('Travail', $item->id) }}">
                                                <div class="popular-projects-card">
                                                    <figure class="popular-projects-content">
                                                        <div class="popular-projects-img-wrap">
                                                        <div class="popular-projects-task-template-img"
     style="background-image: url({{ $item->path ? Storage::url($item->path) : 'default-image-url.jpg' }}); background-size: cover;">
</div>

                                                        </div>
                                                        <div class="popular-projects-card-text">
                                                            <figcaption>
                                                                @php
                                                                    echo preg_replace("/($letter)/i", "<b style='font-weight: bold;color: #FF5733;'>$1</b>", $item->nom);
                                                                @endphp
                                                            </figcaption>
                                                            <span>
                                                                <span class="ss-price-tag-lined"></span>
                                                                Avg. Project: $57&nbsp;–&nbsp;$114
                                                            </span>
                                                        </div>
                                                    </figure>
                                                   
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <style>
            #toTop {
                display: none;
                position: fixed;
                bottom: 20px;
                right: 30px;
                z-index: 99;
                font-size: 15px;
                outline: none;
                background-color: lightblue;
                /* color: white; */
                cursor: pointer;
                padding: 15px;
                border-radius: 50px;
            }

            #toTop:hover {
                background-color: #555;
                color: white;
            }
        </style>

        <script>
            // Get the button
            let mybutton = document.getElementById("toTop");

            // When the user scrolls down 20px from the top of the document, show the button
            window.onscroll = function() {
                scrollFunction()
            };

            function scrollFunction() {
                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                    mybutton.style.display = "block";
                } else {
                    mybutton.style.display = "none";
                }
            }

            // When the user clicks on the button, scroll to the top of the document
            function topFunction() {
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            }
        </script>
    @endsection
</div>
