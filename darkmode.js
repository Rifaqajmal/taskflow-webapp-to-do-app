const btn  = document.getElementById('darkToggle');
const icon = document.getElementById('darkIcon');
const label= document.getElementById('darkLabel');

function applyDark(on) {
    document.body.classList.toggle('dark-mode', on);
    if (on) {
        icon.className  = 'bi bi-sun-fill';
        label.textContent = 'Light Mode';
    } else {
        icon.className  = 'bi bi-moon-stars-fill';
        label.textContent = 'Dark Mode';
    }
}

if (localStorage.getItem('darkMode') === 'enabled') applyDark(true);

btn.addEventListener('click', () => {
    const isDark = document.body.classList.contains('dark-mode');
    applyDark(!isDark);
    localStorage.setItem('darkMode', !isDark ? 'enabled' : 'disabled');
});