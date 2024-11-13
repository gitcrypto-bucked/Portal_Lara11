<!DOCTYPE html>
<html lang="pt_BR" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Ti team &amp; Low Cost contributors">
    <meta name="generator" content="Pedro Henrique & Washington">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Portal LowCost</title>
    <!--  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
          crossorigin="anonymous">
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('/css/dropdown.css')}}">
    <link rel="stylesheet" href="{{asset('/css/news.css')}}">
    <style>
        ::placeholder ,select, option, label{
            color: lightslategray !important;
            opacity: 1; /* Firefox */
            font-family: 'Poppins', sans-serif; !important;
            font-size: 14px !important;
        }

        input[type=file]
        {
            color: lightslategray !important;
            font-family: 'Poppins', sans-serif; !important;
            font-size: 14px !important;
        }

        ::-ms-input-placeholder { /* Edge 12 -18 */
            color: lightslategray;
            font-family: 'Poppins', sans-serif;
            font-size: 14px !important;
        }
    </style>
</head>
<body>
<!-- partial:index.partial.html -->
<div id="wrapper">
    <!--sidebar-->
    @include('components.sidebar')

    <!--sidebar-->
    <!--navbar -->
    @include('components.navwrapper')

    <!--navbar -->
    <!--content-->
    <div class="container-fluid px-4 mt-4 mobile">
        <h2 class="content-title pageName">Cadastro de Usuario</h2>
        <p class="pageText">Crie cadastro e usuarios com acesso ao portal.</p>
        <div class="row gx-2 gy-3 mt-3 ">
            <!-- News Block -->
            <div class="col-md-5">
                <form id="registerForm" method="POST"  autocomplete="off" action="{{url('/add_user')}}" class="form-floating">
                    @if(Session::has('error'))
                        <div class="alert alert-success bg-danger text-white" id="error">
                            {{ Session::get('error')}}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success text-white bg-success" id="sucess">
                            {{ session('success') }}
                        </div>
                    @endif
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="name" name="name" required >
                        <label for="name">Nome</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="email" name="email" required >
                        <label for="email">E-mail</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="confirm_email" name="confirm_email" required >
                        <label for="email">Confirmação de email</label>
                    </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="empresa" name="empresa"  >
                            <label for="empresa">Empresa</label>
                        </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="centrocusto" name="centrocusto"  >
                        <label for="centrocusto">Centro de Custo</label>
                    </div>
                    <div class="form-floating mb-5">
                        <select class="form-select" id="level" name="level"  required>
                            <option value="admin" >admin</option>
                            <option selected value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                        </select>
                        <label for="level">Selecione o nivel permissão</label>
                    </div>

                    <div class="mb-3 form-group">
                        <button type="submit" class="btn btn-primary mb-2"  >Cadastrar</button>
                        <button type="reset" class="btn btn-danger btn-lg-danger bg-danger mb-2" >Cancelar</button>
                    </div>
                </form>
            </div>
            <!-- News block -->
        </div>
    </div>
    <!--content-->


</div>
<!-- partial -->
<script  src="{{asset('/js/script.js')}}"></script>
<script  src="{{asset('/js/main.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous">

</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script>

</script>
</body>
</html>
