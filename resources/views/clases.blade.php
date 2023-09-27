<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <x-navbar/>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Clase: Matemáticas</h2>
                        <h6 class="card-subtitle mb-2 text-muted">Profesor: Nombre del Profesor</h6>
                        <p class="card-subtitle mb-2 text-muted">Fecha de Publicación: 27 de septiembre</p>
                        <br><br>
                        <h3 class="card-subtitle mb-2 text-muted">Título: Tarea de Álgebra</h3>
                        <p class="card-text">Descripción: Realizar los ejercicios del capítulo 3.</p>
                        <p class="card-text">Archivo Adjunto: <a href="#">tarea_algebra.pdf</a></p>
                        <p class="card-text">Puntos: 100 puntos</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <form action="#" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="tarea">Subir Tarea</label>
                                <input type="file" class="form-control" id="tarea" name="tarea" required>
                            </div>
                            <p>Estado: Sin entregar</p> 
                            <button type="submit" class="btn btn-primary">Subir Tarea</button>
                        </form>
                    </div>
                </div>
                <p class="mt-3">Fecha de Entrega: 27 de septiembre</p>
            </div>
        </div>
    </div>
</body>
</html>


