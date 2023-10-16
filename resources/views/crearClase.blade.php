<x-app-layout>
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
                                <label for="titulo" class="dark:text-white">Título:</label>
                                <input type="text" class="form-control" id="titulo" name="titulo">
                                @error('titulo')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="descripcion" class="dark:text-white">Materia:</label>
                                <input type="text" class="form-control" id="materia" name="materia">
                                @error('materia')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
    
                            <div class="form-group">
                                <label for="descripcion" class="dark:text-white">Seccion:</label>
                                <input type="text" class="form-control" id="seccion" name="seccion">
                                @error('seccion')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary dark:text-white" class="">Crear Clase</button>
                            <br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
