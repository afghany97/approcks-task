<!DOCTYPE html>

<html>

    <head>

        <meta charset="utf-8"/>

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>

        <title>Create Board</title>

        <!--page reset library-->

        <link rel="stylesheet" href="{{asset('css/normalize.css')}}"/>

        <link rel="stylesheet" href="{{asset('css/all.min.css')}}"/>

        <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}"/>

        <link rel="stylesheet" href="{{asset('css/create-page-style.css')}}"/>

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700i" rel="stylesheet">

        <!--page will be compatible with all browsers -->

        <!--[if lt IE 9]>

        <script src="{{asset('js/html5shiv.js')}}"></script>

        <![endif]-->

        <script src="{{asset('js/respond.min.js')}}"></script>

    </head>

    <body>

        <!--start of navbar -->

        @include('layouts.header')

        <!--end of navbar -->

        <!--start of body -->

        <div class="main">

            <div class="container-fluid">

                <div class="row">

                    <!--start of left navbar -->

                    @include('layouts.sidebar')

                    <!--end of left navbar -->

                    <!--start of main page -->

                    <div class="col-md-10">

                        <div class="row">

                            <h3 class="mx-auto">Create Board</h3>

                        </div>

                        <div class="row">

                            <form method="POST" action="{{route('boards.store')}}" class="create-form mx-auto">

                                {{csrf_field()}}

                                <div class="form-group">

                                    <label for="name">Name</label>

                                    <input type="text" class="form-control" id="name" name="name" required>

                                </div>

                                <button type="submit" class="btn btn-primary">Create</button>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!--end of body -->

        <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>

        <script src="{{asset('js/script.js')}}"></script>

        <script src="{{asset('js/bootstrap.js')}}"></script>

        <script src="{{asset('js/all.min.js')}}"></script>

    </body>

</html>