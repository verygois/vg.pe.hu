const random = [
    "http://reijisaito.com/Top_files/neck%20b%202.png",
    "http://reijisaito.com/Top_files/DSC05934%20%20HP.jpg",
    "http://reijisaito.com/Top_files/DSC06045%20-%20%202.jpg"
  ];
  
  function randomImg(randomArray) {
    var random =
    randomArray[Math.floor(Math.random() * randomArray.length)];
    console.log(random);
    return random;
  }
  function sentenceGenerator() {
    var sentence = `<img src="${randomImg(random)}">`;
    document.querySelector(".random").innerHTML = sentence;
  }
  window.setInterval(function() {
    sentenceGenerator();
  }, 2000);
  sentenceGenerator();
  