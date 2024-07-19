setTimeout(() => {
  const box = document.getElementById('alert');
  box.style.display = 'none';
}, 5000);
function copyVariableValue(variable) {
navigator.clipboard.writeText(variable).then(function() {
  console.log('Copied to clipboard');
}, function() {
  console.error('Failed to copy to clipboard');
});
}