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
        <button onclick="topFunction()" id="toTop" title="Go to top"><i class="fa fa-arrow-up"aria-hidden="true"></i></button>

        <div class="header">
            <div class="imgWrapper">
                <img class="img-header" src="{{ asset('images/hero.jpg') }}" alt="">
            </div>
        </div>
        <div  class="content">
            <h1>Obtenir de l'aide. Gagner du bonheur.</h1>
            <p>Profitez d'une solution rapide et fiable lorsque vous en avez le plus besoin grâce à nos services à la demande.</p>
            <div class="sh">
                <form action="{{ route('search-services') }}" method="post">
                    @csrf
                <input name="nom" type="text" placeholder="j'ai besoin d'aide avec...">
                <button  type="submit" class="getHelpButton">Obtenez de l'aide aujourd'hui </button>
                </form>

            </div>
            <div class="dettail">
                @foreach ($trservices as $item)
                    <a class="button" href="{{ route('Travail', $item->id) }}">{{ $item->nom }} </a>
                @endforeach
                <a href="{{ route('services.index') }}"><span>voir plus</span></a>
                
            </div>
        </div>

        <div class="container--wide">
            <section>
                <div class="reviews">
                    <h1>Découvrez des conseils, des visites à domicile et des histoires de Tâcheurs.</h1>
                </div>
                <div class="app-store-links">
                    <a href="#">
                        <img alt="Download app from Apple Store" src="{{ asset('images/store.svg') }}">
                    </a>
                    <a href="#">
                        <img alt="Download app from Apple Store" src="{{ asset('images/play.svg') }}">
                    </a>
                </div>
            </section>
        </div>

        <div class="popular-projects u-hidden--md u-hidden--sm">
            <section>
                <div class="container">
                    <div class="row row--thin">
                        <h2>Services populaires dans votre région</h2>
                        <div class="popular-projects-cards">
                            <ul>
                                @foreach ($srservices as $item)
                                    <li>
                                        <div class="popular-projects-link" data-event-name="popular_projects_clicked">
                                            <a href="{{ route('Travail', $item->id) }}">
                                                <div data-aos="zoom-in" data-aos-duration="1000" class="popular-projects-card">
                                                    <figure class="popular-projects-content">
                                                        <div class="popular-projects-img-wrap">
                                                        <div class="popular-projects-task-template-img"
     style="background-image: url({{ $item->images ? Storage::url($item->images->path) : 'default-image-url.jpg' }}); background-size: cover;">
</div>

                                                        </div>
                                                        <div  class="popular-projects-card-text">
                                                            <figcaption>{{ $item->nom }}</figcaption>
                                                            {{-- <figcaption>{{ $item->description }}</figcaption> --}}

                                                            <span>
                                                                <span class="ss-price-tag-lined"></span>
                                                                Avg. Project: $52&nbsp;–&nbsp;$118
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

        <div  data-aos="fade-right" data-aos-duration="1500" class="scope-value-prop scope-first-value-prop-desktop u-hidden--md u-hidden--sm">
            <section>
                <div class="value-prop-container">
                    <div class="text-container">
                        <h2>La vie quotidienne est devenue plus facile</h2>
                        <div class="description">Lorsque la vie est occupée, vous n'avez pas à y faire face seul. Gagnez du temps pour ce que vous aimez sans vous ruiner.</div>
                        <ul>
                            <li aria-label="">Choisissez votre Tâcheur par avis, compétences et prix</li>
                            <li aria-label="">Schedule when it works for you — as early as today</li>
                            <li aria-label="">Chat, pay, tip, and review all through one platform</li>
                        </ul>
                    </div>
                    <figure>
                        <img src="{{ asset('images/i.jpg') }}">
                    </figure>
                </div>
            </section>
        </div>

        <div  data-aos="fade-right"  data-aos-duration="1500" class="scope-value-prop scope-first-value-prop-desktop u-hidden--md u-hidden--sm">
            <section>
                <div class="value-prop-container">
                    <figure>
                        <img src="{{ asset('images/mec.jpg') }}">
                    </figure>
                    <div class="text-container">
                        <h2>Planifiez quand cela fonctionne pour vous dès aujourd'hui</h2>
                        <div class="description">Il est maintenant temps de trouver un horaire qui correspond à votre style de vie! Commencez dès aujourd'hui et assurez-vous de rester sur la bonne voie.</div>
                        <h1 class="works">Regarde comment ça marche</h1>
                    </div>

                </div>
            </section>
        </div>

        <div class="scope-homepage-ready-to-start-desktop">
            <section>
                <div>
                    <h2>Prêt à commencer?</h2>
                    <div class="ready-to-start-container">
                        <div data-aos="fade-right" data-aos-duration="2000" class="col left-container-border">
                            <div class="left-container">
                                <img alt="A hand holding a smart phone." height="200"
                                    src="https://assets.taskrabbit.com/v3/assets/homepage/client-sign-up-img.png"
                                    width="238">
                                <p class="sign-up-text">Écoute ça? Le doux soupir de soulagement. Commencez à en faire plus.</p>
                                <a class="btn btn-success cta" href="{{ route('createClient') }}">S'inscrire</a>
                            </div>
                        </div>
                        <div data-aos="fade-left" data-aos-duration="2000" class="col">
                            <div class="right-container">
                                <img alt="A hand holding a paint roller and another hand holding a spray bottle." height="200"
                                    src="https://assets.taskrabbit.com/v3/assets/homepage/become-a-tasker-img.png"
                                    width="238">
                                <p class="become-a-tasker-text">Développez votre propre entreprise tout en économisant la journée pour les personnes occupées
                                    voisins.</p>
                                <a class="btn btn-success cta" href="{{ route('createtacheur') }}">Devenez un Tâcheur</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <div  class="get-help-today">
            <section>
                <div class="get-help">
                    <h2>Obtenez de l'aide aujourd'hui</h2>
                    <ul>
                        @foreach ($services as $item)
                            <li data-aos="fade"  data-aos-duration="2000">
                                @if (auth()->check() && auth()->user()->role == 'Client')
                                    <a class="btn btn-secondary cta" href="{{ route('Travail', $item->id) }}">{{$item->nom}}</a>
                                @else
                                    <a class="btn btn-secondary cta" href="{{ route('createClient') }}" href="#">{{$item->nom}}</a>
                                @endif
                            </li>
                        @endforeach
                    </ul>


                    {{-- <ul>
                        @foreach ($services as $item)
                            <li>
                                <a class="btn btn-secondary cta" href="{{ route('Travail', $item->id) }}">{{$item->nom}}</a>
                            </li>
                        @endforeach
                    </ul> --}}
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
