<?php
// generate.php - processa POST e exibe CV

function calc_idade($data_nasc){
  if(empty($data_nasc)) return '';
  $n = new DateTime($data_nasc);
  $h = new DateTime();
  $d = $h->diff($n);
  return $d->y;
}




// sanitize helper
function s($v){
  return htmlspecialchars($v ?? '', ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

$nome = s($_POST['nome'] ?? '');
$sobrenome = s($_POST['sobrenome'] ?? '');
$idade = calc_idade($_POST['data_nasc'] ?? '');
$cargo = s($_POST['cargo'] ?? '');
$descricao = nl2br(s($_POST['descricao'] ?? ''));
$endereco = s($_POST['endereco'] ?? '');
$telefone = s($_POST['telefone'] ?? '');
$email = s($_POST['email'] ?? '');
$habilidades = isset($_POST["habilidades"]) ? explode(",", $_POST["habilidades"]) : [];

// Formações e experiências são arrays multidimensionais
$formacoes = $_POST['formacao'] ?? [];
$cursos = $_POST['curso'] ?? [];
$experiencias = $_POST['experiencia'] ?? [];
?>
<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Currículo de <?= $nome ?> <?= $sobrenome ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/styles.css">
  <style>
    @media print{ .no-print{display:none} }
  </style>
</head>
<body class="container my-4">
  <div class="d-flex justify-content-between align-items-center">
    <div>
      <h2><?= $nome ?> <?= $sobrenome ?></h2>
      <p><?= $cargo ?> • <?= $idade ? $idade . ' anos' : '' ?></p>
    </div>
    <div class="text-end">
      <p><?= $email ?><br><?= $telefone ?></p>
    </div>
  </div>

  <hr>

  <section>
    <h5>Resumo</h5>
    <p><?= $descricao ?></p>
  </section>

  <section>
    <h5>Formação</h5>
    <?php foreach($formacoes as $f): ?>
      <div class="mb-2">
        <strong><?= s($f['curso'] ?? '') ?></strong><br>
        <small><?= s($f['local'] ?? '') ?> • <?= s($f['inicio'] ?? '') ?> — <?= s($f['fim'] ?? '') ?></small>
      </div>
    <?php endforeach; ?>
  </section>

  <section>
    <h5>Experiência</h5>
    <?php foreach($experiencias as $e): ?>
      <div class="mb-2">
        <strong><?= s($e['cargo'] ?? '') ?> — <?= s($e['empresa'] ?? '') ?></strong>
        <div><small><?= s($e['inicio'] ?? '') ?> — <?= s($e['fim'] ?? '') ?></small></div>
        <p><?= nl2br(s($e['descricao'] ?? '')) ?></p>
      </div>
    <?php endforeach; ?>
  </section>

  <section>
    <h5>Cursos</h5>
    <ul>
      <?php foreach($cursos as $c) echo '<li>'.s($c['nome'] ?? '').' • '.s($c['data'] ?? '').'</li>'; ?>
    </ul>
  </section>

<?php if (!empty($habilidades)): ?>
  <h4>Habilidades</h4>
  <ul>
    <?php foreach ($habilidades as $hab): ?>
      <li><?php echo htmlspecialchars($hab); ?></li>
    <?php endforeach; ?>
  </ul>
<?php endif; ?>

  <div class="no-print mt-4">
    <button onclick="window.print()" class="btn btn-primary">Imprimir / Salvar PDF</button>
    <a href="index.php" class="btn btn-secondary">Voltar</a>
  </div>
</body>
</html>
