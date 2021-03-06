<?php
if (!defined('R4F5CC')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}
?>

<div class="content p-1 head-cor">
    <div class="list-group-item">
        
            <div class="d-flex">
                <div class="mr-auto p-2">
                    <h2 class="display-4 title">Listagem - Níveis de Acesso</h2>
                </div>
                <div class="p-2">
                    <a href="<?php echo URLADM; ?>add-access-level/index" class="btn btn-outline-success btn-sm">Cadastrar</a>
                </div>
            </div>
            <hr class="hr-title">
            <?php

                if(isset($_SESSION['msg'])){
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }        
             ?>

            <div class="table-responsive">
                <table class="table table-striped table-light table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="d-none d-sm-table-cell">ID</th>
                            <th>Nome</th>
                            <th>Nível de Acesso</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $qnt_linhas_exe = 1;
                            //Read the record array, returned from the database.
                            foreach ($this->data['listAccessLevels'] as $alevel) {
                                //The extract function is used to extract the array and print using the key name.
                                extract($alevel);
                        ?>
                        <tr>
                            <td class="d-none d-sm-table-cell"><?php echo $id; ?></td>
                            <td><?php echo $name; ?></td>
                            <td><?php echo $order_levels; ?></td>

                            <td class="text-center">
                                <span class="d-none d-lg-block">
                                    <?php
                                        if ($qnt_linhas_exe <= 2 AND ($this->data['pag'] == 1)) {
                                            echo "<a href='" . URLADM . "order-access-level/index/$id?pag=" . $this->data['pag'] . "' class='btn btn-outline-secondary btn-sm disabled'><i class='fas fa-angle-double-up'></i></a>";
                                        }else{
                                            echo "<a href='" . URLADM . "order-access-level/index/$id?pag=" . $this->data['pag'] . "' class='btn btn-outline-secondary btn-sm'><i class='fas fa-angle-double-up'></i></a>";
                                        }
                                        $qnt_linhas_exe++;
                                    ?>

                                    <a href="<?php echo URLADM . 'view-access-level/index/' . $id; ?>" class="btn btn-outline-primary btn-sm">Visualizar</a>
                                    <a href="<?php echo URLADM . 'edit-access-level/index/' . $id; ?>" class="btn btn-outline-warning btn-sm">Editar</a>
                                    <a href="<?php echo URLADM . 'delete-access-level/index/' . $id; ?>" class="btn btn-outline-danger btn-sm" data-confirm="Excluir">Apagar</a> 
                                </span>
                                <div class="dropdown d-block d-lg-none">
                                    <button class="btn btn-outline-primary btn-sm dropdown-toggle" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Ações
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                                        <a class="dropdown-item" href="<?php echo URLADM . 'order-access-level/index/' . $id . '?pag=' . $this->data['pag']; ?>">Ordem</a>
                                        <a class="dropdown-item" href="<?php echo URLADM . 'view-access-level/index/' . $id; ?>">Visualizar</a>
                                        <a class="dropdown-item" href="<?php echo URLADM . 'edit-access-level/index//' . $id; ?>">Editar</a>
                                        <a class="dropdown-item" href="<?php echo URLADM . 'delete-access-level/index/' . $id; ?>" data-confirm="Excluir">Apagar</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
                <nav aria-label="pagination">
                    <?php echo $this->data['pagination']; ?>             
                </nav>
            </div>
       
    </div>
</div>