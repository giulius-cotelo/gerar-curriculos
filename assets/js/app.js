function calcIdade(dateString){
  if(!dateString) return '';
  const hoje = new Date();
  const nasc = new Date(dateString);
  let idade = hoje.getFullYear() - nasc.getFullYear();
  const m = hoje.getMonth() - nasc.getMonth();
  if (m < 0 || (m === 0 && hoje.getDate() < nasc.getDate())) idade--;
  return idade;
}

document.getElementById('data_nasc').addEventListener('change', function(){
  document.getElementById('idade').value = calcIdade(this.value);
});

function addFormacao(data = {}){
  const idx = Date.now() + Math.floor(Math.random()*1000);
  const container = document.createElement('div');
  container.className = 'formacao-item border p-3 mb-2';
  container.innerHTML = `
    <div class="row g-2">
      <div class="col-md-4"><input name="formacao[${idx}][curso]" placeholder="Curso" class="form-control" value="${data.curso||''}"></div>
      <div class="col-md-4"><input name="formacao[${idx}][local]" placeholder="Local" class="form-control" value="${data.local||''}"></div>
      <div class="col-md-2"><input type="month" name="formacao[${idx}][inicio]" class="form-control" value="${data.inicio||''}"></div>
      <div class="col-md-2"><input type="month" name="formacao[${idx}][fim]" class="form-control" value="${data.fim||''}"></div>
      <div class="col-12 text-end mt-2"><button type="button" class="btn btn-sm btn-danger remove-item">Remover</button></div>
    </div>
  `;
  container.querySelector('.remove-item').addEventListener('click', ()=> container.remove());
  document.getElementById('formacoes').appendChild(container);
}

function addCurso() {
  const container = document.getElementById('cursos-list');
  const item = document.createElement('div');
  item.classList.add('curso-item');
  item.innerHTML = `
    <input type="text" placeholder="Nome do curso ou live" required>
    <input type="number" min="1" placeholder="Horas" style="width: 100px;">
    <button type="button" onclick="this.parentNode.remove()">Remover</button>
  `;
  container.appendChild(item);
}


function addExperiencia(data = {}){
  const idx = Date.now() + Math.floor(Math.random()*1000);
  const container = document.createElement('div');
  container.className = 'exp-item border p-3 mb-2';
  container.innerHTML = `
    <div class="row g-2">
      <div class="col-md-4"><input name="experiencia[${idx}][cargo]" placeholder="Cargo" class="form-control" value="${data.cargo||''}"></div>
      <div class="col-md-4"><input name="experiencia[${idx}][empresa]" placeholder="Empresa" class="form-control" value="${data.empresa||''}"></div>
      <div class="col-md-2"><input type="month" name="experiencia[${idx}][inicio]" class="form-control" value="${data.inicio||''}"></div>
      <div class="col-md-2"><input type="month" name="experiencia[${idx}][fim]" class="form-control" value="${data.fim||''}"></div>
      <div class="col-12 mt-2"><textarea name="experiencia[${idx}][descricao]" placeholder="Descrição" class="form-control">${data.descricao||''}</textarea></div>
      <div class="col-12 text-end mt-2"><button type="button" class="btn btn-sm btn-danger remove-item">Remover</button></div>
    </div>
  `;
  container.querySelector('.remove-item').addEventListener('click', ()=> container.remove());
  document.getElementById('experiencias').appendChild(container);
}

document.addEventListener("DOMContentLoaded", function () {
  const skillsList = document.getElementById("skills-list");
  const addSkillBtn = document.getElementById("add-skill");
  const customSkillInput = document.getElementById("custom-skill");
  const hiddenSkillsInput = document.getElementById("hidden-skills");

  let skills = [];

  function renderSkills() {
    skillsList.innerHTML = "";
    skills.forEach((skill, index) => {
      const badge = document.createElement("span");
      badge.className = "badge bg-primary p-2";
      badge.textContent = skill;
      badge.style.cursor = "pointer";
      badge.title = "Clique para remover";
      badge.addEventListener("click", () => {
        skills.splice(index, 1);
        renderSkills();
      });
      skillsList.appendChild(badge);
    });
    hiddenSkillsInput.value = skills.join(",");
  }

  // Adiciona habilidade personalizada
  addSkillBtn.addEventListener("click", () => {
    const skill = customSkillInput.value.trim();
    if (skill && !skills.includes(skill)) {
      skills.push(skill);
      customSkillInput.value = "";
      renderSkills();
    }
  });

  // Adiciona habilidade sugerida
  document.querySelectorAll(".skill-btn").forEach((btn) => {
    btn.addEventListener("click", () => {
      const skill = btn.textContent.trim();
      if (!skills.includes(skill)) {
        skills.push(skill);
        renderSkills();
      }
    });
  });
});



document.getElementById('add-formacao').addEventListener('click', ()=> addFormacao());
document.getElementById('add-curso').addEventListener('click', ()=> addCurso());
document.getElementById('add-experiencia').addEventListener('click', ()=> addExperiencia());

addFormacao();
addCurso();
addExperiencia();
