function addThousand(inputValue) {
  const resultValue = inputValue * 1000;
  return `P${resultValue.toFixed(2)}`;
}

function addThousand(inputValue2) {
  const resultValue = inputValue2 * 1000;
  return `P${resultValue.toFixed(2)}`;
}
function addThousands(num) {
  // convert the input to a number if it's a string
  num = Number(num);

  // add 1000 to the input number
  num += 1000;

  // format the result as a string with a "P" prefix
  return "P" + num.toFixed(2);
}

const inputElement = document.getElementById("input");
inputElement.addEventListener("input", () => {
  const inputValue = parseInt(inputElement.value);
  const resultElement = document.getElementById("result");
  resultElement.innerText = addThousand(inputValue);
});

function updateResult1() {
  // get the input value
  var inputVal = document.getElementById("input2").value;

  // add 1000 to the input value
  var resultVal = addThousand(inputVal);

  // update the result element with the formatted string
  document.getElementById("result2").innerHTML = resultVal;
}

function updateResult() {
  // Get the values of the input fields
  var result = parseInt(document.getElementById("input").value) * 1000;
  var result2 = parseInt(document.getElementById("input2").value) * 1000;

  // Calculate the subtotal
  var subtotal = result + result2;

  // Update the subtotal display
  document.getElementById("subtotal").textContent = subtotal;
}
