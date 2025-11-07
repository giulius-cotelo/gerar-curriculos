<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Gerador de Curriculo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<body>
    
  <main class="container my-4">
    <h1>Gerador de Currículos</h1>
    <form id="cv-form" action="generate.php" method="post" target="_blank">
      <div class="row g-3">
        <div class="col-md-6">
          <label class="form-label">Nome</label>
          <input name="nome" class="form-control" required>
        </div>
        <div class="col-md-6">
          <label class="form-label">Sobrenome</label>
          <input name="sobrenome" class="form-control" required>
        </div>

        <div class="col-md-4">
          <label class="form-label">Data de nascimento</label>
          <input type="date" id="data_nasc" name="data_nasc" class="form-control" required>
        </div>
        <div class="col-md-2">
          <label class="form-label">Idade</label>
          <input id="idade" class="form-control" readonly>
        </div>

        <div class="col-md-6">
          <label class="form-label">Cargo</label>
          <input name="cargo" class="form-control">
        </div>

        <div class="col-12">
          <label class="form-label">Resumo sobre você</label>
          <textarea name="descricao" class="form-control" rows="3"></textarea>
        </div>

        <h3>Informações de Contato</h3>

        <div class="col-md-6">
          <label class="form-label">Endereço</label>
          <input name="endereco" class="form-control">
        </div>
        <div class="col-md-3">
          <label class="form-label">Telefone</label>
          <input name="telefone" class="form-control">
        </div>
        <div class="col-md-3">
          <label class="form-label">E-mail</label>
          <input type="email" name="email" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label"><h5>Habilidades</h5></label>
                
            <div class="mb-2">
            <div class="d-flex flex-wrap gap-2 mt-2">
            <button type="button" class="btn btn-sm btn-secondary skill-btn">Comunicação</button>
            <button type="button" class="btn btn-sm btn-secondary skill-btn">Trabalho em equipe</button>
            <button type="button" class="btn btn-sm btn-secondary skill-btn">Liderança</button>
            <button type="button" class="btn btn-sm btn-secondary skill-btn">Gestão de tempo</button>
            <button type="button" class="btn btn-sm btn-secondary skill-btn">Solução de problemas</button>
            <button type="button" class="btn btn-sm btn-secondary skill-btn">Facilidade de aprendizado</button>
            <button type="button" class="btn btn-sm btn-secondary skill-btn">Tomada de decisões</button>
            <button type="button" class="btn btn-sm btn-secondary skill-btn">Proatividades</button>
            <button type="button" class="btn btn-sm btn-secondary skill-btn">Ingles Técnico</button>
            </div><br>
            

            <input type="text" id="custom-skill" class="form-control mb-2" placeholder="Adicione uma habilidade personalizada">
            <button type="button" id="add-skill" class="btn btn-outline-primary mb-3">Adicionar</button>
            <br>
            <div id="skills-list" class="mb-2 d-flex flex-wrap gap-2"></div>

        </div>

        <!-- Campo oculto para enviar habilidades -->
        <input type="hidden" name="habilidades" id="hidden-skills">
        </div>  

        <div class="col-12">
          <h4>Formação acadêmica</h4>
          <div id="formacoes"></div>
          <button id="add-formacao" type="button" class="btn btn-sm btn-outline-primary mt-2">+ Formação</button>
        </div>

        <div class="col-12 mt-3">
          <h4>Cursos livres</h4>
          <div id="cursos"></div>
          <button id="add-curso" type="button" class="btn btn-sm btn-outline-secondary mt-2">+ Curso</button>
        </div>

        <div class="col-12 mt-3">
          <h4>Experiência profissional</h4>
          <div id="experiencias"></div>
          <button id="add-experiencia" type="button" class="btn btn-sm btn-outline-success mt-2">+ Experiência</button>
        </div>

        <div class="col-12 mt-4">
          <button class="btn btn-primary" type="submit">Finalizar</button>
        </div>
      </div>
    </form>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/app.js"></script>

</body>
</html>