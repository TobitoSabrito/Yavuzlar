function goToHomePage() {
    window.location.href = "index.php";
}

function Nextquestion() {
    window.location.reload();
}

// Puanı sayfada güncellemek ve saklamak için
document.addEventListener('DOMContentLoaded', () => {
    let score = localStorage.getItem('score') !== null ? parseInt(localStorage.getItem('score')) : 0;
    document.getElementById('score').innerText = score;
});

function checkAnswer(button, selectedAnswer, correctAnswer, diffid) {
    let score = localStorage.getItem('score') !== null ? parseInt(localStorage.getItem('score')) : 0;

    if (selectedAnswer === correctAnswer) {
        button.classList.add('correct');
        score += diffid * 10; 
    } else {
        button.classList.add('incorrect');
    }

    // Güncellenmiş puanı sakla
    localStorage.setItem('score', score);
    document.getElementById('score').innerText = score;

    // Diğer butonları devre dışı bırak
    document.querySelectorAll('.answer-button').forEach(btn => btn.disabled = true);
}

// Puanı sıfırlama fonksiyonu
function resetScore() {
    if (confirm('Puanı sıfırlamak istediğinize emin misiniz?')) {
        localStorage.removeItem('score');
        document.getElementById('score').innerText = '0';
        alert('Puan sıfırlandı.');
    }
}