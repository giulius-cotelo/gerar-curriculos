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