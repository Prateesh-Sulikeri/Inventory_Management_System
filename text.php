<div id="myDiv" style="display:block;">This is my div</div>
<button id="myButton">Toggle div</button>

<script>
const myDiv = document.getElementById("myDiv");
const myButton = document.getElementById("myButton");

myButton.addEventListener("click", function() {
  if (myDiv.style.display === "block") {
    myDiv.style.display = "none";
  } else {
    myDiv.style.display = "block";
  }
});
</script>
