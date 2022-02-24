<div class="modal fade" id="destroyProduct_{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="POST" action="{{route('articles.destroy',$product->id)}}">
            @csrf
            @method('DELETE')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Esta acción es irreversible.</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <h5 class="text-center">¿Estás seguro de que quieres eliminar el producto
                            {{$product->title}} ?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-outline-danger">Si, Eliminar Articulo</button>
                </div>
            </div>
        </form>
    </div>
</div>
