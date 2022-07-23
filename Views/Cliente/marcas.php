<?php
$modelo = new MarcasModel();
$marcas = $modelo->listar();
?>

<p class="text-centrado c-subtitle">YUPA Multicorercio es distribuidor autorizado de las siguientes marcas</p>
<div class="container bg-white">
    <div class="row d-flex ">
        <?php
        foreach ($marcas as $marca) {
        ?>
            <div class="card my-3 ms-4 me-3 py-2" style="width: 150px;">
                <img src="/<?php echo $marca['img']; ?>" alt="img" style="width: 100px;">
                <div class="card-body">
                    <h5 class="card-title text-import"><?php echo $marca["nombre"] ?></h5>
                    <a href="<?php echo $marca['dirurl']; ?>" class="link">Visitar pagina</a>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>
<hr class="barra">
<div class="bg-success">
    <div class="container">
        <div class="row pt-4">
            <div class="col border-end border-white">
                <div class="card bg-success mt-3 border border-success">
                    <div class="card-body">
                        <div class="row justify-content-md-center">
                            <div class="col-md-auto">
                                <span class="material-icons" style="color: white; font-size:50px;"> local_shipping </span>
                            </div>
                            <div class="col-md-auto align-self-center">
                                <div class="row">
                                    <span class="text-white">Entrega ágil</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col border-end border-white">
                <div class="card bg-success mt-3 border border-success">
                    <div class="card-body">
                        <div class="row justify-content-md-center">
                            <div class="col-md-auto">
                                <span class="material-icons" style="color: white; font-size:50px;"> paid </span>
                            </div>
                            <div class="col-md-auto align-self-center">
                                <div class="row">
                                    <span class="text-white">Pago seguro</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col border-end border-white">
                <div class="card bg-success mt-3 border border-success">
                    <div class="card-body">
                        <div class="row justify-content-md-center">
                            <div class="col-md-auto">
                                <span class="material-icons" style="color: white; font-size:50px;"> support_agent </span>
                            </div>
                            <div class="col align-self-center">
                                <div class="row">
                                    <span class="text-white">Centro de ayuda</span>
                                    <span class="text-white">Soporte 24/7</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card bg-success mt-3 border border-success">
                    <div class="card-body">
                        <div class="row justify-content-md-center">
                            <div class="col-md-auto">
                                <span class="material-icons" style="color: white; font-size:50px;"> currency_exchange </span>
                            </div>
                            <div class="col-md-auto align-self-center">
                                <div class="row">
                                    <span class="text-white">Fácil política de retorno</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div>