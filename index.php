<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Calculadora de Pisos e Azulejos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="container my-5">
    <h1>Calculadora de Pisos e Azulejos</h1>
    <form id="form-calculo" class="row g-3">
        <div class="col-md-6">
            <label for="largura_comodo" class="form-label">Largura do Cômodo (m)</label>
            <input type="number" id="largura_comodo" class="form-control" required>
        </div>
        <div class="col-md-6">
            <label for="comprimento_comodo" class="form-label">Comprimento do Cômodo (m)</label>
            <input type="number" id="comprimento_comodo" class="form-control" required>
        </div>
        <div class="col-md-6">
            <label for="largura_piso" class="form-label">Largura do Piso/Azulejo (m)</label>
            <input type="number" id="largura_piso" class="form-control" required>
        </div>
        <div class="col-md-6">
            <label for="comprimento_piso" class="form-label">Comprimento do Piso/Azulejo (m)</label>
            <input type="number" id="comprimento_piso" class="form-control" required>
        </div>
        <div class="col-md-12">
            <label for="margem_extra" class="form-label">Margem Extra (%)</label>
            <input type="number" id="margem_extra" class="form-control" placeholder="Opcional">
        </div>
        <div class="col-12">
            <button type="button" id="calcular" class="btn btn-primary">Calcular</button>
        </div>
    </form>
    <div id="resultado" class="mt-4"></div>

    <script>
        $(document).ready(function() {
            $('#calcular').click(function() {
                const larguraComodo = parseFloat($('#largura_comodo').val());
                const comprimentoComodo = parseFloat($('#comprimento_comodo').val());
                const larguraPiso = parseFloat($('#largura_piso').val());
                const comprimentoPiso = parseFloat($('#comprimento_piso').val());
                const margemExtra = parseFloat($('#margem_extra').val()) || 0;

                $.ajax({
                    url: 'calcular_area_comodo.php',
                    method: 'POST',
                    data: { larguraComodo, comprimentoComodo },
                    success: function(areaComodo) {
                        $.ajax({
                            url: 'calcular_area_piso.php',
                            method: 'POST',
                            data: { larguraPiso, comprimentoPiso },
                            success: function(areaPiso) {
                                $.ajax({
                                    url: 'calcular_quantidade_pisos.php',
                                    method: 'POST',
                                    data: { areaComodo, areaPiso },
                                    success: function(quantidadePisos) {
                                        $.ajax({
                                            url: 'calcular_quantidade_total.php',
                                            method: 'POST',
                                            data: { quantidadePisos, margemExtra },
                                            success: function(quantidadeTotal) {
                                                $('#resultado').html(`
                                                    <h2>Resultado</h2>
                                                    <p>Quantidade Total de Pisos Necessária: <strong>${quantidadeTotal}</strong></p>
                                                `);
                                            }
                                        });
                                    }
                                });
                            }
                        });
                    }
                });
            });
        });
    </script>
</body>
</html>