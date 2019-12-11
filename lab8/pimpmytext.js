function PimpButton() {
    playInterval = setInterval(function() {
        var size;
        size = document.getElementById("input").style.fontSize;
        size = parseInt(size);
        document.getElementById("input").style.fontSize = (size + 2) + "pt";
    }, 500);
}

function ToBling() {
    var bling = document.getElementById("bling");
    if (bling.checked) {
        alert("Bling is checked!");
        document.getElementById("input").style.fontWeight = "bold";
        document.getElementById("input").style.textDecoration = "underline";
        document.getElementById("input").style.color = "green";
        document.getElementById("body").style.backgroundImage = 'URL("https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/8/hundred.jpg")';
    } else {
        document.getElementById("input").style.fontWeight = "normal";
        document.getElementById("input").style.textDecoration = "none";
        document.getElementById("input").style.color = "black";
    }
}

function SnoopButton() {
    var text = document.getElementById("input").value;
    var split = text.split(".");
    text = split.join("-izzle");
    text = text.toUpperCase();
    document.getElementById("input").value = text;
}

function PigLatin() {
    var text = document.getElementById("input").value;
    var words = text.split(" ");
    alert(words);
    var result;
    var word;
    var index;
    for (var i in words) {
        word = words[i];
        index = word.indexOf(/[aeiou]/);
        if (word.charAt(word.length - 1) === '.') {
            word = word.substring(index, word.length - 1) + word.substring(0, index) + ". ";
        } else {
            word = word.substring(index, word.length - 1) + word.substring(0, index) + " ";
        }
        result += word;
    }
    document.getElementById("input").value = result;
}