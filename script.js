// DARK MODE TOGGLE
document.addEventListener('DOMContentLoaded', () => {
    const toggleBtn = document.getElementById('darkModeToggle');
    toggleBtn.addEventListener('click', () => {
        document.body.classList.toggle('dark-mode');
    });
});


// COMPARE FEATURE
const compareList = new Set();
document.querySelectorAll('.compareBtn').forEach(button => {
    button.addEventListener('click', () => {
        const model = button.parentElement.getAttribute('data-model');
        if (compareList.has(model)) {
            compareList.delete(model);
            button.textContent = 'Compare';
        } else {
            compareList.add(model);
            button.textContent = 'Remove from Compare';
        }
        updateCompareList();
    });
});

function updateCompareList() {
    const container = document.getElementById('compareList');
    container.innerHTML = '';
    compareList.forEach(model => {
        const div = document.createElement('div');
        div.textContent = model;
        container.appendChild(div);
    });
}

// VOICE SEARCH
// Check if SpeechRecognition is supported
const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
if (SpeechRecognition) {
    const recognition = new SpeechRecognition();
    recognition.lang = 'en-US'; // Language can be changed based on your requirement
    recognition.continuous = false; // Stop after first recognition
    recognition.interimResults = false; // No need to show interim results

    // Voice Search Button Click Event
    document.getElementById("voiceSearchBtn").addEventListener("click", () => {
        recognition.start(); // Start listening
        console.log("Voice search started...");
    });

    // On recognition result (when the user speaks)
    recognition.onresult = (event) => {
        const transcript = event.results[0][0].transcript; // Get the recognized speech
        console.log("You said: " + transcript);

        // Set the value of the search input to the transcript (if you want to show it)
        document.getElementById("voiceSearchInput").value = transcript;

        // Perform the car search using the transcript (you can use this to filter car models)
        searchCarByVoice(transcript);
    };

    // Handle recognition error
    recognition.onerror = (event) => {
        console.error("Speech Recognition Error: ", event.error);
        alert("There was an error with the voice recognition. Please try again.");
    };
} else {
    alert("Your browser does not support Speech Recognition.");
}

// Function to perform car search by voice
function searchCarByVoice(query) {
    const carAds = document.querySelectorAll(".car-ad");
    let found = false;

    carAds.forEach(ad => {
        const model = ad.getAttribute("data-model").toLowerCase();
        if (model.includes(query.toLowerCase())) {
            ad.style.display = "block";
            found = true;
        } else {
            ad.style.display = "none";
        }
    });

    const resultsDiv = document.getElementById("searchResults");
    if (found) {
        resultsDiv.innerHTML = `Showing results for: <strong>${query}</strong>`;
    } else {
        resultsDiv.innerHTML = "No cars found matching your voice search.";
    }
}


