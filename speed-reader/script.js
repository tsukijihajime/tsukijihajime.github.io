document.addEventListener('DOMContentLoaded', () => {
    const inputView = document.getElementById('input-view');
    const readerView = document.getElementById('reader-view');
    const textInput = document.getElementById('text-input');
    const startBtn = document.getElementById('start-btn');
    const stopBtn = document.getElementById('stop-btn');
    const wordDisplay = document.getElementById('word-display');
    const progressIndicator = document.getElementById('progress-indicator');

    let words = [];
    let currentWordIndex = 0;
    let timerId = null;
    const wpm = 300;
    const msPerWord = 1000 / (wpm / 60); // 200 ms

    // Switch between views
    const setView = (viewName) => {
        if (viewName === 'input') {
            readerView.classList.remove('active');
            inputView.classList.add('active');
            textInput.focus();
        } else if (viewName === 'reader') {
            inputView.classList.remove('active');
            readerView.classList.add('active');
        }
    };

    // Start reading process
    const startReading = () => {
        const text = textInput.value.trim();
        if (!text) {
            alert('テキストを入力してください。');
            return;
        }

        // Split by whitespace
        words = text.split(/\s+/).filter(word => word.length > 0);
        
        if (words.length === 0) {
            return;
        }

        currentWordIndex = 0;
        progressIndicator.style.width = '0%';
        setView('reader');
        
        // Brief countdown before starting
        wordDisplay.textContent = '3...';
        wordDisplay.classList.remove('word-animate');
        
        setTimeout(() => { wordDisplay.textContent = '2...'; }, 600);
        setTimeout(() => { wordDisplay.textContent = '1...'; }, 1200);
        setTimeout(() => { 
            runReader(); 
        }, 1800);
    };

    // The RSVP loop
    const runReader = () => {
        if (currentWordIndex < words.length) {
            displayWord(words[currentWordIndex]);
            updateProgress();
            currentWordIndex++;
            timerId = setTimeout(runReader, msPerWord);
        } else {
            finishReading();
        }
    };

    const displayWord = (word) => {
        wordDisplay.textContent = word;
        // Trigger reflow to restart CSS animation
        wordDisplay.classList.remove('word-animate');
        void wordDisplay.offsetWidth; // Reflow
        wordDisplay.classList.add('word-animate');
    };

    const updateProgress = () => {
        const percentage = (currentWordIndex / words.length) * 100;
        progressIndicator.style.width = `${percentage}%`;
    };

    // Stop and return to input
    const stopReading = () => {
        if (timerId) {
            clearTimeout(timerId);
            timerId = null;
        }
        setView('input');
    };

    // Action when finished
    const finishReading = () => {
        wordDisplay.textContent = '読了！';
        wordDisplay.classList.remove('word-animate');
        progressIndicator.style.width = '100%';
        
        timerId = setTimeout(() => {
            stopReading();
        }, 1500); // 1.5 seconds pause at the end
    };

    // Event Listeners
    startBtn.addEventListener('click', startReading);
    stopBtn.addEventListener('click', stopReading);

    // Initial State
    setView('input');
});
