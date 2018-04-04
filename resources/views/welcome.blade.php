<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token raktas-->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--.-->

    <title>{{ config('app.name', 'Home') }}</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">

    <!-- Stiliai -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/master.css') }}" rel="stylesheet">
    <!--.-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- <script src="cartajax.js" type="text/javascript"> </script> -->

</head>

<body>

    <div id="app">
        <div class="fixed-top">

        @component('components/navigacija')
        @endcomponent

        </div>

        @component('components/carousel')
        @endcomponent
        
        @component('components/kategorijos')
        @endcomponent

        @component('components/komanda')
        @endcomponent
        

        <div class="row justify-content-center">
                <div class="col-md-12 bg-dark kategorija">
                    <h3>KONTAKTAI</h3>
                </div>    
        </div>
        <div class="row justify-content-center">
                 <div class="col-md-6 bg-dark card-deck">
                    <div class="card">
                         <div class="card-body">
                            <h5 class="card-title card-header">Susisiekime</h5>
                                <p><strong>Salono adresas:</strong></p>
                                <p>
                                    Vokiečių g. 2, Vilnius
                                    Tel.: +370 5 247 40 58
                                </p>

                                 <p><strong>Darbo laikas:</strong></p>
                                 <p>I-III 11.00 - 23.00
                                     IV-V 11.00 - 24.00
                                    VI 11.00 - 24.00
                                    VII 12.00 - 22.00</p>

                                <p><strong>Administracija:</strong></p>
                                 <p>Tel. / Faks. +370 5 275 9319 info@diena.lt</p>

                                  <p><strong>Įmonės duomenys:</strong></p>
                                 <p>UAB „Autorida“</p>
                                    <p>Įmonės kodas: 126367855</p>
                                     <p>PVM mokėtojo kodas: LT10000172078</p>
                                 <p>Vokiečių g. 2, 01103 Vilnius</p>
                                    <p>A/S LT517044060007836597</p>
                        </div>
                        <div class="card-footer">
                            -
                        </div>    
                        
                    </div>
                </div> 
                <div class="col-md-6 bg-dark card-deck">
                    <div class="card">
                         <div class="card-body">
                            <h5 class="card-title card-header">Mus rasite</h5>
                            <div class="">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d969.8867516160126!2d25.285020243025834!3d54.67808133988866!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46dd94156b3d0d97%3A0x69330a3519176797!2sVokie%C4%8Di%C5%B3+g.+2%2C+Vilnius+01130!5e0!3m2!1slt!2slt!4v1520336352967" width="100%" height="400" frameborder="0" style="border:0;margin:0 auto;" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="card-footer">
                            -
                        </div>    
                </div>
        </div>


        <main class="py-4">
            @yield('content')
        </main>
    </div>
 <footer>
    <div class="bg-dark fixed-bottom custom"><p>Autorida 2018<p/></div>
</footer>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>



</body>
</html>

















