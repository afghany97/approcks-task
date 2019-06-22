<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8"/>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>

    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>{{$board->name}}</title>

    <!--page reset library-->

    <link rel="stylesheet" href="{{asset('css/normalize.css')}}"/>

    <link rel="stylesheet" href="{{asset('css/all.min.css')}}"/>

    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}"/>

    <link rel="stylesheet" href="{{asset('css/style.css')}}"/>

    <link rel="stylesheet" href="{{asset('css/bulma.min.css')}}"/>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700i" rel="stylesheet">

    <!--page will be compatible with all browsers -->

    <!--[if lt IE 9]>

    <script src="{{asset('js/html5shiv.js')}}"></script>

    <![endif]-->

    <script src="{{asset('js/respond.min.js')}}"></script>

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>

        window.auth = <?= json_encode(['user' => auth()->user()]); ?>;

    </script>
</head>

<body>

<!--start of navbar -->

@include('layouts.header')

<!--end of navbar -->

<!--start of body -->

    <div class="main" id="app">

        <board inline-template>

          <div class="container-fluid">

            <div class="row">

                <!--start of left navbar -->

            @include('layouts.sidebar')

            <!--end of left navbar -->

                <!--start of main page -->

                <div class="col-md-10">

                    <div class="row">

                        <div class="col-md-4">

                            <!--project name button -->

                            <div class="dropdown">

                                <button class="btn dropdown-toggle project-name-button" type="button"

                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"

                                        ariaexpanded="false">Project Name

                                </button>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                    <a class="dropdown-item" href="#">Project 1</a>

                                    <a class="dropdown-item" href="#">Project 2</a>

                                    <a class="dropdown-item" href="#">Project 3</a>

                                </div>

                            </div>

                            <!--taged people divation-->

                            <div class="taged-people">

                                <p>People taged in this project</p>

                                <img class="rounded-circle" src="{{asset('imgs/person0.jpg')}}">

                                <img class="rounded-circle" src="{{asset('imgs/person1.png')}}">

                                <img class="rounded-circle" src="{{asset('imgs/person2.png')}}">

                                <img class="rounded-circle" src="{{asset('imgs/person3.png')}}">

                                <span>+2</span>

                            </div>

                        </div>

                        <div class="col-md-8">

                            <!--new task button -->

                            <button class="btn float-right new-task-button" @click="showNewIssueModal = true">

                                <i class="fas fa-plus"></i>

                                New Task

                            </button>

                            <new-issue @close="showNewIssueModal = false" :users="{{$users}}" :records="{{$board->records}}">

                                <template slot="header">Create Issue</template>

                            </new-issue>

                            <br/><br/><br/>

                            <!--start of filters -->

                            <div class="filters">

                                <!--sprint button -->

                                <div class="filter-item">

                                    <div class="dropdown">

                                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton"

                                                data-toggle="dropdown" aria-haspopup="true" ariaexpanded="false">Sprint

                                        </button>

                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                            <a class="dropdown-item" href="#">option 1</a>

                                            <a class="dropdown-item" href="#">option 2</a>

                                            <a class="dropdown-item" href="#">option 3</a>

                                        </div>

                                    </div>

                                </div>

                                <!--type button -->

                                <div class="filter-item">

                                    <div class="dropdown">

                                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton"

                                                data-toggle="dropdown" aria-haspopup="true" ariaexpanded="false">Type

                                        </button>

                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                            <a class="dropdown-item" href="#">option 1</a>

                                            <a class="dropdown-item" href="#">option 2</a>

                                            <a class="dropdown-item" href="#">option 3</a>

                                        </div>

                                    </div>

                                </div>

                                <!--search bar  -->

                                <div class="filter-item">

                                    <form class="form-inline search-bar">

                                        <input class="form-control" type="search" placeholder="Search . . ."

                                               aria-label="Search">

                                    </form>

                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- start of task bar -->

                    <records :records="{{$board->records}}"></records>

                    <!-- end of task bar -->

                    <!-- start of dashboard-->

                    <div class="dashboard">

                        <div class="row">

                            <lists inline-template >

                                <div style="display: inherit">

                                    @foreach($board->records as $record)

                                        <list :record="{{$record->load('issues')}}" :users="{{$users}}"></list>

                                    @endforeach

                                </div>

                            </lists>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        </board>

    </div>


<!--end of body -->

<script src="{{asset('js/script.js')}}"></script>

<script src="{{asset('js/bootstrap.js')}}"></script>

<script src="{{asset('js/all.min.js')}}"></script>

</body>

<script src="{{asset('js/app.js')}}"></script>

</html>