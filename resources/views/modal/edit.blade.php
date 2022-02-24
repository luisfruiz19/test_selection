<div class="modal fade" id="editProduct_{{$product->id}}" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="POST" action="{{route('articles.update',$product->id)}}">
            @method('PUT')
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Producto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title">Titulo</label>
                                <input type="text" class="form-control rounded-0" id="title" name="title"
                                       value="{{$product->title}}"
                                       aria-describedby="title">
                            </div>
                            <div class="form-group">
                                <label for="author">Author</label>
                                <select name="user_id" id="author" class="form-control rounded-0">
                                    @foreach($authors as $author)
                                        <option
                                            value="{{$author->id}}" {{$author->id === $product->user_id ? 'selected' : ''}} >{{$author->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="state">Estado</label>
                                <select name="state" id="state" class="form-control rounded-0">
                                    <option value="1" {{ ( $product->state == 1) ? 'selected' : '' }}>ACTIVO</option>
                                    <option value="0" {{ ( $product->state == 0) ? 'selected' : '' }}>INACTIVO</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="description">Descripcion</label>
                                <textarea class="form-control" name="description" id="description">
                                    {{$product->description}}
                                </textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-success">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>
