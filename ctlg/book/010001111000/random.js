const random = [
    "/ctlg/book/010001111000/001.jpg",
    "/ctlg/book/010001111000/002.jpg",
    "/ctlg/book/010001111000/003.jpg",
    "/ctlg/book/010001111000/004.jpg"
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
  