const apiKey = '252db1c828fce08e56c4f921'; // replace with your API key
const form = document.getElementById('currency-form');
const amountInput = document.getElementById('amount');
const fromCurrencySelect = document.getElementById('from-currency');
const toCurrencySelect = document.getElementById('to-currency');
const resultDiv = document.getElementById('result');

// fetch the latest exchange rates from the API
async function fetchExchangeRates() {
  const response = await fetch(`https://app.exchangerate-api.com//api/latest.json?app_id=${apiKey}`);
  const data = await response.json();
  return data.rates;
}

// perform the currency conversion
function convertCurrency() {
  fetchExchangeRates().then(exchangeRates => {
    const amount = parseFloat(amountInput.value);
    const fromCurrency = fromCurrencySelect.value;
    const toCurrency = toCurrencySelect.value;
    const conversionRate = exchangeRates[toCurrency] / exchangeRates[fromCurrency];
    const result = (amount * conversionRate).toFixed(2);
    resultDiv.textContent = `Result: ${result} ${toCurrency}`;
  });
}

// handle form submission
form.addEventListener('submit', function(event) {
  event.preventDefault();
  convertCurrency();
});

// initialize the currency converter
convertCurrency();