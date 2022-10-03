<h3 class="text-dark mb-4">Ticket</h3>
<div class="row mb-3">
    <div class="col-11 col-xl-12 col-xxl-11 offset-xl-0">
        <div class="row">
            <div class="col-xl-12 col-xxl-12">
                <div class="card shadow mb-3">
                    <div class="card-header py-3">
                        <div class="row d-flex">
                            <div class="w-100"></div>
                            <div class="col d-xxl-flex align-items-xxl-center">
                                <p class="fs-5 text-primary m-0 fw-bold">Informações do chamado</p>
                            </div>
                            <div class="col text-end">
                                <a class="btn btn-primary" role="button" onclick="validaTicket('cadOrdemServico.php?idTicket=<?=$idTicket?>')" style="margin-right: 10px;">Ordem de Serviço</a>
                                <a class="btn btn-primary" role="button" onclick="validaTicket('listaTramites.php?idTicket=<?=$idTicket?>')">Trâmites</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="padding-top: 0px;">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
