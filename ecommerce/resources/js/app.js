import 'preline';
import './bootstrap';

document.addEventListener('DOMContentLoaded', () => {
    if (window.HS?.init) {
        window.HS && window.HS.init();
    }
});

document.addEventListener('livewire:navigated', () => {
    if (window.HS?.init) {
        window.HS && window.HS.init();
    }
});

document.addEventListener('DOMContentLoaded', function () {
    const dropdown = document.getElementById('userDropdown');
  
    dropdown.addEventListener('mouseenter', () => {
      dropdown.querySelector('.hs-dropdown-menu').classList.remove('hidden');
    });
  
    dropdown.addEventListener('mouseleave', () => {
      dropdown.querySelector('.hs-dropdown-menu').classList.add('hidden');
    });
  });
  

