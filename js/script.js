// Function to change the language
function changeLanguage() {
    var languageSelect = document.getElementById("language-select");
    var selectedLanguage = languageSelect.value;
    var languageOutput = document.getElementById("language-output");
    
    switch(selectedLanguage) {
        case "en":
            languageOutput.textContent = "Selected language: English";
            break;
        case "fr":
            languageOutput.textContent = "Selected language: French";
            break;
        case "es":
            languageOutput.textContent = "Selected language: Spanish";
            break;
        default:
            languageOutput.textContent = "Selected language: Unknown";
            break;
    }
}

// Function to change the currency
function changeCurrency() {
    var currencySelect = document.getElementById("currency-select");
    var selectedCurrency = currencySelect.value;
    var currencyOutput = document.getElementById("currency-output");
    
    currencyOutput.textContent = "Selected currency: " + selectedCurrency;
}
