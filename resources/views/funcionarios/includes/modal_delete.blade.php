<div class="modal fade" id="modalDeleta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Deletar Funcionário</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="formDelete" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="row">
                        <p>Deseja excluir o(a) funcionário(a) <span id="funcName"></span></p>
                    </div>
                    <button class="btn btn-danger">Excluir</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
