<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear Clase</title>
</head>
<body>
    <x-navbar/>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h1 class="mb-0">Clase</h1>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="/crear-clase">
                            @csrf
                            <div class="form-group">
                                <label for="titulo">Título:</label>
                                <input type="text" class="form-control" id="titulo" name="titulo">
                                @error('titulo')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="descripcion">Materia:</label>
                                <input type="text" class="form-control" id="materia" name="materia">
                                @error('materia')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
    
                            <div class="form-group">
                                <label for="descripcion">Seccion:</label>
                                <input type="text" class="form-control" id="seccion" name="seccion">
                                @error('seccion')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Crear Clase</button>
                            <br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>